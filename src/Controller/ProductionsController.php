<?php
declare(strict_types=1);

namespace App\Controller;

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
    public function index()
    {
        $this->paginate =([
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
    public function crudo()
    {
        $this->paginate =([
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
    public function crudoRelleno()
    {
        $this->paginate =([
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
    public function decorado()
    {
        $this->paginate =([
            'contain' => ['ProductionRecipes'=>['ProdrecipeDetails'=>['Branches'],'RecipeDimensions'=>['Recipes','Dimensions'],],],
        ]);
        $productions = $this->paginate($this->Productions);

        $this->set(compact('productions'));
    }




    /**
     * View method
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $production = $this->Productions->get($id, [
            'contain' => ['Contracts', 'ProductionRecipes'],
        ]);

        $this->set('production', $production);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
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
        $recipe_dimensions = $this->RecipeDimensions->find('list', ['limit' => 200]);
        $branches = $this->Branches->find('list', ['limit' => 200]);
        $this->set(compact('production','recipe_dimensions','branches'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('ProductionRecipes');
        $this->loadModel('ProdrecipeDetails');
        $this->loadModel('RecipeDimensions');
        $this->loadModel('Branches');
        $production = $this->Productions->get($id, [
            'contain' => ['ProductionRecipes'=>['RecipeDimensions','ProdrecipeDetails']],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $production = $this->Productions->patchEntity($production, $this->request->getData());
            if ($this->Productions->save($production)) {
                $this->Flash->success(__('The production has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The production could not be saved. Please, try again.'));
        }
        $this->set(compact('production'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Production id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $production = $this->Productions->get($id);
        if ($this->Productions->delete($production)) {
            $this->Flash->success(__('The production has been deleted.'));
        } else {
            $this->Flash->error(__('The production could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}
