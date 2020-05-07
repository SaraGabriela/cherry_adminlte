<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ContractRecipes Controller
 *
 * @property \App\Model\Table\ContractRecipesTable $ContractRecipes
 *
 * @method \App\Model\Entity\ContractRecipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContractRecipesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contracts', 'Recipes'],
        ];
        $contractRecipes = $this->paginate($this->ContractRecipes);

        $this->set(compact('contractRecipes'));
    }

    /**
     * View method
     *
     * @param string|null $id Contract Recipe id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contractRecipe = $this->ContractRecipes->get($id, [
            'contain' => ['Contracts', 'Recipes'],
        ]);

        $this->set('contractRecipe', $contractRecipe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contractRecipe = $this->ContractRecipes->newEmptyEntity();
        if ($this->request->is('post')) {
            $contractRecipe = $this->ContractRecipes->patchEntity($contractRecipe, $this->request->getData());
            if ($this->ContractRecipes->save($contractRecipe)) {
                $this->Flash->success(__('The contract recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contract recipe could not be saved. Please, try again.'));
        }
        $contracts = $this->ContractRecipes->Contracts->find('list', ['limit' => 200]);
        $recipes = $this->ContractRecipes->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('contractRecipe', 'contracts', 'recipes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contract Recipe id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contractRecipe = $this->ContractRecipes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contractRecipe = $this->ContractRecipes->patchEntity($contractRecipe, $this->request->getData());
            if ($this->ContractRecipes->save($contractRecipe)) {
                $this->Flash->success(__('The contract recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contract recipe could not be saved. Please, try again.'));
        }
        $contracts = $this->ContractRecipes->Contracts->find('list', ['limit' => 200]);
        $recipes = $this->ContractRecipes->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('contractRecipe', 'contracts', 'recipes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contract Recipe id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contractRecipe = $this->ContractRecipes->get($id);
        if ($this->ContractRecipes->delete($contractRecipe)) {
            $this->Flash->success(__('The contract recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The contract recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
