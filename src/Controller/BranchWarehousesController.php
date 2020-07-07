<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BranchWarehouses Controller
 *
 * @property \App\Model\Table\BranchWarehousesTable $BranchWarehouses
 *
 * @method \App\Model\Entity\BranchWarehouse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BranchWarehousesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Warehouses', 'Branches'],
        ];
        $branchWarehouses = $this->paginate($this->BranchWarehouses);

        $this->set(compact('branchWarehouses'));
    }

    /**
     * View method
     *
     * @param string|null $id Branch Warehouse id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $branchWarehouse = $this->BranchWarehouses->get($id, [
            'contain' => ['Warehouses', 'Branches', 'WarehouseProducts'],
        ]);

        $this->set('branchWarehouse', $branchWarehouse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $branchWarehouse = $this->BranchWarehouses->newEmptyEntity();
        if ($this->request->is('post')) {
            $branchWarehouse = $this->BranchWarehouses->patchEntity($branchWarehouse, $this->request->getData());
            if ($this->BranchWarehouses->save($branchWarehouse)) {
                $this->Flash->success(__('The branch warehouse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The branch warehouse could not be saved. Please, try again.'));
        }
        $warehouses = $this->BranchWarehouses->Warehouses->find('list', ['limit' => 200]);
        $branches = $this->BranchWarehouses->Branches->find('list', ['limit' => 200]);
        $this->set(compact('branchWarehouse', 'warehouses', 'branches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Branch Warehouse id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $branchWarehouse = $this->BranchWarehouses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $branchWarehouse = $this->BranchWarehouses->patchEntity($branchWarehouse, $this->request->getData());
            if ($this->BranchWarehouses->save($branchWarehouse)) {
                $this->Flash->success(__('The branch warehouse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The branch warehouse could not be saved. Please, try again.'));
        }
        $warehouses = $this->BranchWarehouses->Warehouses->find('list', ['limit' => 200]);
        $branches = $this->BranchWarehouses->Branches->find('list', ['limit' => 200]);
        $this->set(compact('branchWarehouse', 'warehouses', 'branches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Branch Warehouse id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $branchWarehouse = $this->BranchWarehouses->get($id);
        if ($this->BranchWarehouses->delete($branchWarehouse)) {
            $this->Flash->success(__('The branch warehouse has been deleted.'));
        } else {
            $this->Flash->error(__('The branch warehouse could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
