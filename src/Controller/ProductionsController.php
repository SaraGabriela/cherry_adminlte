<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Recipe;

/**
 * Productions Controller
 *
 * @property \App\Model\Table\ProductionsTable $Productions
 *
 * @method \App\Model\Entity\Production[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index(){
        $this->paginate =([
            'limit' => 4,
            'order' => ['Productions.id' => 'DESC'],
            'contain' => ['ProductionRecipes'=>['ProdrecipeDetails'=>['Branches'],'RecipeDimensions'=>['Recipes','Dimensions'],],],
        ]);
        $productions = $this->paginate($this->Productions);
        $this->set(compact('productions'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function validatePhase(&$productions, string $phase){
        $cantProductions = 0;
        foreach($productions as $production){
            $cantRecipes = 0;
            foreach($production->production_recipes as $production_recipe){
                $cantDetails = 0;
                foreach($production_recipe->prodrecipe_details as $prodrecipe_detail){
                    if($prodrecipe_detail->phase == $phase){
                        $prodrecipe_detail->val = "yes";
                        $cantDetails ++;
                    }
                }
                if($cantDetails > 0){
                    $production_recipe->val = "yes";
                    $cantRecipes ++;
                }
            }
            if($cantRecipes > 0){
                $production->val = "yes"; 
                $cantProductions ++;
            }
        }
        if($cantProductions > 0){
            $productions->val = "yes";
        }else{ 
            $productions->val = "no";
        }
    }
    public function setPhase($id = null){
        return $this->redirect(['action' => '../ProdrecipeDetails/setPhase', $id]);
    }

    public function crudo($id = null){
        //_____________________________/-__________________________________________
        $this->paginate =([
            'contain' => ['ProductionRecipes'=>['ProdrecipeDetails'=>['Branches'],'RecipeDimensions'=>['Recipes','Dimensions'],],],
        ]);
        $productions = $this->paginate($this->Productions);
        $this->validatePhase($productions, "crudo");
        $this->set(compact('productions'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    
    public function crudoRelleno(){
        $this->paginate =([
            'contain' => ['ProductionRecipes'=>['ProdrecipeDetails'=>['Branches'],'RecipeDimensions'=>['Recipes','Dimensions'],],],
        ]);
        $productions = $this->paginate($this->Productions);
        $this->validatePhase($productions, "crudo-relleno");
        $this->set(compact('productions'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function decorado(){
        $this->paginate =([
            'contain' => ['ProductionRecipes'=>['ProdrecipeDetails'=>['Branches'],'RecipeDimensions'=>['Recipes','Dimensions'],],],
        ]);
        $productions = $this->paginate($this->Productions);
        $this->validatePhase($productions, "decorado");
        $this->set(compact('productions'));
    }
    /**
     * View method 
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null){
        $production = $this->Productions->get($id, [
            'contain' => ['ProductionRecipes'=>['ProdrecipeDetails'=>['Branches'],'RecipeDimensions'=>['Recipes','Dimensions'],],],
        ]);

        $this->set(compact('production'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $production = $this->Productions->newEmptyEntity();
        $this->loadModel('ProductionRecipes');
        $this->loadModel('ProdrecipeDetails');
        $this->loadModel('RecipeDimensions');
        $this->loadModel('Branches');
        if ($this->request->is('post')) { 
            $production = $this->Productions->patchEntity($production, $this->request->getData(), [
                'associated' => [
                    'ProductionRecipes'=>['associated' => ['ProdrecipeDetails']]
                    //'ProductionRecipes'
                ]
            ]);
            if ($result= $this->Productions->save($production)) {
                $this->Flash->success(__('The production has been saved.'));

                return $this->redirect(['action' =>'index']);
            }
            $this->Flash->error(__('The production could not be saved. Please, try again.'));
        }
        //$recipeDimensions = $this->RecipeDimensions->find('list', ['limit' => 200]);

        $this->paginate =([
            'contain' => ['Recipes','Dimensions'],
        ]);
        $recipeDimensions = $this->paginate($this->ProductionRecipes->RecipeDimensions->find('all'));
        $branches = $this->Branches->find('list', ['limit' => 200]);
        $this->set(compact('production','recipeDimensions','branches'));
    }
    /**
     * Edit method  
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null){
        $this->loadModel('ProductionRecipes');
        $this->loadModel('ProdrecipeDetails');
        $this->loadModel('RecipeDimensions');
        $this->loadModel('Branches');
        $this->loadModel('Dimensions');
        $this->loadModel('Recipes');
        $production = $this->Productions->get($id, [
            //'contain' => ['ProductionRecipes'=>['RecipeDimensions','ProdrecipeDetails']],
            'contain' => ['ProductionRecipes'=>['ProdrecipeDetails'=>['Branches'],'RecipeDimensions'=>['Recipes','Dimensions'],],],
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $production = $this->Productions->patchEntity($production, $this->request->getData(), [
                'associated' => [
                    'ProductionRecipes' => [
                        'associated' => [
                            'ProdrecipeDetails',
                        ]
                    ]
                ]
            ]);
            if($this->Productions->save($production)){
                $this->Flash->success(__('La producción ha sido Actualizada'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se puede'));
        }
        //$recipeDimensions = $this->ProductionRecipes->RecipeDimensions->find('list');

        $branches = $this->Branches->find('all');
        $prodrecipeDetails = $this->ProdrecipeDetails->find('all');

        $this->paginate =([
            'contain' => ['Recipes','Dimensions'],
        ]);
        $recipeDimensions = $this->paginate($this->ProductionRecipes->RecipeDimensions->find('all'));

        $this->set(compact('production','recipeDimensions', 'branches', 'prodrecipeDetails'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){
        $production = $this->Productions->get($id);
        if ($this->Productions->delete($production)){
            $this->Flash->success(__('La producción ha sido eliminada'));
            return $this->redirect(['action' => 'index']);
        }
    }
}

