<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TransferWarehouseProducts Controller
 *
 * @property \App\Model\Table\TransferWarehouseProductsTable $TransferWarehouseProducts
 *
 * @method \App\Model\Entity\TransferWarehouseProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransferWarehouseProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['WarehouseProducts', 'Transfers'],
        ];
        $transferWarehouseProducts = $this->paginate($this->TransferWarehouseProducts);

        $this->set(compact('transferWarehouseProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Transfer Warehouse Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transferWarehouseProduct = $this->TransferWarehouseProducts->get($id, [
            'contain' => ['WarehouseProducts', 'Transfers'],
        ]);

        $this->set('transferWarehouseProduct', $transferWarehouseProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transferWarehouseProduct = $this->TransferWarehouseProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $transferWarehouseProduct = $this->TransferWarehouseProducts->patchEntity($transferWarehouseProduct, $this->request->getData());
            if ($this->TransferWarehouseProducts->save($transferWarehouseProduct)) {
                $this->Flash->success(__('The transfer warehouse product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer warehouse product could not be saved. Please, try again.'));
        }
        $warehouseProducts = $this->TransferWarehouseProducts->WarehouseProducts->find('list', ['limit' => 200]);
        $transfers = $this->TransferWarehouseProducts->Transfers->find('list', ['limit' => 200]);
        $this->set(compact('transferWarehouseProduct', 'warehouseProducts', 'transfers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transfer Warehouse Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transferWarehouseProduct = $this->TransferWarehouseProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transferWarehouseProduct = $this->TransferWarehouseProducts->patchEntity($transferWarehouseProduct, $this->request->getData());
            if ($this->TransferWarehouseProducts->save($transferWarehouseProduct)) {
                $this->Flash->success(__('The transfer warehouse product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer warehouse product could not be saved. Please, try again.'));
        }
        $warehouseProducts = $this->TransferWarehouseProducts->WarehouseProducts->find('list', ['limit' => 200]);
        $transfers = $this->TransferWarehouseProducts->Transfers->find('list', ['limit' => 200]);
        $this->set(compact('transferWarehouseProduct', 'warehouseProducts', 'transfers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transfer Warehouse Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transferWarehouseProduct = $this->TransferWarehouseProducts->get($id);
        if ($this->TransferWarehouseProducts->delete($transferWarehouseProduct)) {
            $this->Flash->success(__('The transfer warehouse product has been deleted.'));
        } else {
            $this->Flash->error(__('The transfer warehouse product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
