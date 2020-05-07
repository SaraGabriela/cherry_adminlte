<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProdrecipeDetails Controller
 *
 * @property \App\Model\Table\ProdrecipeDetailsTable $ProdrecipeDetails
 *
 * @method \App\Model\Entity\ProdrecipeDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdrecipeDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ProductionRecipes', 'BranchWarehouses'],
        ];
        $prodrecipeDetails = $this->paginate($this->ProdrecipeDetails);

        $this->set(compact('prodrecipeDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Prodrecipe Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prodrecipeDetail = $this->ProdrecipeDetails->get($id, [
            'contain' => ['ProductionRecipes', 'BranchWarehouses', 'Transformations'],
        ]);

        $this->set('prodrecipeDetail', $prodrecipeDetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prodrecipeDetail = $this->ProdrecipeDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $prodrecipeDetail = $this->ProdrecipeDetails->patchEntity($prodrecipeDetail, $this->request->getData());
            if ($this->ProdrecipeDetails->save($prodrecipeDetail)) {
                $this->Flash->success(__('The prodrecipe detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prodrecipe detail could not be saved. Please, try again.'));
        }
        $productionRecipes = $this->ProdrecipeDetails->ProductionRecipes->find('list', ['limit' => 200]);
        $branchWarehouses = $this->ProdrecipeDetails->BranchWarehouses->find('list', ['limit' => 200]);
        $this->set(compact('prodrecipeDetail', 'productionRecipes', 'branchWarehouses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prodrecipe Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prodrecipeDetail = $this->ProdrecipeDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prodrecipeDetail = $this->ProdrecipeDetails->patchEntity($prodrecipeDetail, $this->request->getData());
            if ($this->ProdrecipeDetails->save($prodrecipeDetail)) {
                $this->Flash->success(__('The prodrecipe detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prodrecipe detail could not be saved. Please, try again.'));
        }
        $productionRecipes = $this->ProdrecipeDetails->ProductionRecipes->find('list', ['limit' => 200]);
        $branchWarehouses = $this->ProdrecipeDetails->BranchWarehouses->find('list', ['limit' => 200]);
        $this->set(compact('prodrecipeDetail', 'productionRecipes', 'branchWarehouses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prodrecipe Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prodrecipeDetail = $this->ProdrecipeDetails->get($id);
        if ($this->ProdrecipeDetails->delete($prodrecipeDetail)) {
            $this->Flash->success(__('The prodrecipe detail has been deleted.'));
        } else {
            $this->Flash->error(__('The prodrecipe detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
