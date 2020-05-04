<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * WarehouseProducts Controller
 *
 * @property \App\Model\Table\WarehouseProductsTable $WarehouseProducts
 *
 * @method \App\Model\Entity\WarehouseProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WarehouseProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BranchWarehouses', 'Products'],
        ];
        $warehouseProducts = $this->paginate($this->WarehouseProducts);

        $this->set(compact('warehouseProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Warehouse Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $warehouseProduct = $this->WarehouseProducts->get($id, [
            'contain' => ['BranchWarehouses', 'Products'],
        ]);

        $this->set('warehouseProduct', $warehouseProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $warehouseProduct = $this->WarehouseProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $warehouseProduct = $this->WarehouseProducts->patchEntity($warehouseProduct, $this->request->getData());
            if ($this->WarehouseProducts->save($warehouseProduct)) {
                $this->Flash->success(__('The warehouse product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The warehouse product could not be saved. Please, try again.'));
        }
        $branchWarehouses = $this->WarehouseProducts->BranchWarehouses->find('list', ['limit' => 200]);
        $products = $this->WarehouseProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('warehouseProduct', 'branchWarehouses', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Warehouse Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $warehouseProduct = $this->WarehouseProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $warehouseProduct = $this->WarehouseProducts->patchEntity($warehouseProduct, $this->request->getData());
            if ($this->WarehouseProducts->save($warehouseProduct)) {
                $this->Flash->success(__('The warehouse product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The warehouse product could not be saved. Please, try again.'));
        }
        $branchWarehouses = $this->WarehouseProducts->BranchWarehouses->find('list', ['limit' => 200]);
        $products = $this->WarehouseProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('warehouseProduct', 'branchWarehouses', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Warehouse Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $warehouseProduct = $this->WarehouseProducts->get($id);
        if ($this->WarehouseProducts->delete($warehouseProduct)) {
            $this->Flash->success(__('The warehouse product has been deleted.'));
        } else {
            $this->Flash->error(__('The warehouse product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
