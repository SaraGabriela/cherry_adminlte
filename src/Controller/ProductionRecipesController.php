<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProductionRecipes Controller
 *
 * @property \App\Model\Table\ProductionRecipesTable $ProductionRecipes
 *
 * @method \App\Model\Entity\ProductionRecipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductionRecipesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Productions', 'Recipes'],
        ];
        $productionRecipes = $this->paginate($this->ProductionRecipes);

        $this->set(compact('productionRecipes'));
    }

    /**
     * View method
     *
     * @param string|null $id Production Recipe id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productionRecipe = $this->ProductionRecipes->get($id, [
            'contain' => ['Productions', 'Recipes', 'FinalCakes', 'ProdrecipeDetails'],
        ]);

        $this->set('productionRecipe', $productionRecipe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productionRecipe = $this->ProductionRecipes->newEmptyEntity();
        if ($this->request->is('post')) {
            $productionRecipe = $this->ProductionRecipes->patchEntity($productionRecipe, $this->request->getData());
            if ($this->ProductionRecipes->save($productionRecipe)) {
                $this->Flash->success(__('The production recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The production recipe could not be saved. Please, try again.'));
        }
        $productions = $this->ProductionRecipes->Productions->find('list', ['limit' => 200]);
        $recipes = $this->ProductionRecipes->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('productionRecipe', 'productions', 'recipes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Production Recipe id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productionRecipe = $this->ProductionRecipes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productionRecipe = $this->ProductionRecipes->patchEntity($productionRecipe, $this->request->getData());
            if ($this->ProductionRecipes->save($productionRecipe)) {
                $this->Flash->success(__('The production recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The production recipe could not be saved. Please, try again.'));
        }
        $productions = $this->ProductionRecipes->Productions->find('list', ['limit' => 200]);
        $recipes = $this->ProductionRecipes->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('productionRecipe', 'productions', 'recipes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Production Recipe id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productionRecipe = $this->ProductionRecipes->get($id);
        if ($this->ProductionRecipes->delete($productionRecipe)) {
            $this->Flash->success(__('The production recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The production recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
