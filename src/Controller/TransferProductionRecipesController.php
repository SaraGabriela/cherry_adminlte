<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TransferProductionRecipes Controller
 *
 * @property \App\Model\Table\TransferProductionRecipesTable $TransferProductionRecipes
 *
 * @method \App\Model\Entity\TransferProductionRecipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransferProductionRecipesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Transfers', 'ProdrecipeDetails'],
        ];
        $transferProductionRecipes = $this->paginate($this->TransferProductionRecipes);

        $this->set(compact('transferProductionRecipes'));
    }

    /**
     * View method
     *
     * @param string|null $id Transfer Production Recipe id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transferProductionRecipe = $this->TransferProductionRecipes->get($id, [
            'contain' => ['Transfers', 'ProdrecipeDetails'],
        ]);

        $this->set('transferProductionRecipe', $transferProductionRecipe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transferProductionRecipe = $this->TransferProductionRecipes->newEmptyEntity();
        if ($this->request->is('post')) {
            $transferProductionRecipe = $this->TransferProductionRecipes->patchEntity($transferProductionRecipe, $this->request->getData());
            if ($this->TransferProductionRecipes->save($transferProductionRecipe)) {
                $this->Flash->success(__('The transfer production recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer production recipe could not be saved. Please, try again.'));
        }
        $transfers = $this->TransferProductionRecipes->Transfers->find('list', ['limit' => 200]);
        $prodrecipeDetails = $this->TransferProductionRecipes->ProdrecipeDetails->find('list', ['limit' => 200]);
        $this->set(compact('transferProductionRecipe', 'transfers', 'prodrecipeDetails'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transfer Production Recipe id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transferProductionRecipe = $this->TransferProductionRecipes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transferProductionRecipe = $this->TransferProductionRecipes->patchEntity($transferProductionRecipe, $this->request->getData());
            if ($this->TransferProductionRecipes->save($transferProductionRecipe)) {
                $this->Flash->success(__('The transfer production recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer production recipe could not be saved. Please, try again.'));
        }
        $transfers = $this->TransferProductionRecipes->Transfers->find('list', ['limit' => 200]);
        $prodrecipeDetails = $this->TransferProductionRecipes->ProdrecipeDetails->find('list', ['limit' => 200]);
        $this->set(compact('transferProductionRecipe', 'transfers', 'prodrecipeDetails'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transfer Production Recipe id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transferProductionRecipe = $this->TransferProductionRecipes->get($id);
        if ($this->TransferProductionRecipes->delete($transferProductionRecipe)) {
            $this->Flash->success(__('The transfer production recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The transfer production recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
