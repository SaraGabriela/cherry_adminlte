<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PurchaseProducts Controller
 *
 * @property \App\Model\Table\PurchaseProductsTable $PurchaseProducts
 *
 * @method \App\Model\Entity\PurchaseProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchaseProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Purchases', 'Warehouses'],
        ];
        $purchaseProducts = $this->paginate($this->PurchaseProducts);

        $this->set(compact('purchaseProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Purchase Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchaseProduct = $this->PurchaseProducts->get($id, [
            'contain' => ['Products', 'Purchases', 'Warehouses'],
        ]);

        $this->set('purchaseProduct', $purchaseProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchaseProduct = $this->PurchaseProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $purchaseProduct = $this->PurchaseProducts->patchEntity($purchaseProduct, $this->request->getData());
            if ($this->PurchaseProducts->save($purchaseProduct)) {
                $this->Flash->success(__('The purchase product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase product could not be saved. Please, try again.'));
        }
        $products = $this->PurchaseProducts->Products->find('list', ['limit' => 200]);
        $purchases = $this->PurchaseProducts->Purchases->find('list', ['limit' => 200]);
        $warehouses = $this->PurchaseProducts->Warehouses->find('list', ['limit' => 200]);
        $this->set(compact('purchaseProduct', 'products', 'purchases', 'warehouses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchaseProduct = $this->PurchaseProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseProduct = $this->PurchaseProducts->patchEntity($purchaseProduct, $this->request->getData());
            if ($this->PurchaseProducts->save($purchaseProduct)) {
                $this->Flash->success(__('The purchase product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase product could not be saved. Please, try again.'));
        }
        $products = $this->PurchaseProducts->Products->find('list', ['limit' => 200]);
        $purchases = $this->PurchaseProducts->Purchases->find('list', ['limit' => 200]);
        $warehouses = $this->PurchaseProducts->Warehouses->find('list', ['limit' => 200]);
        $this->set(compact('purchaseProduct', 'products', 'purchases', 'warehouses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseProduct = $this->PurchaseProducts->get($id);
        if ($this->PurchaseProducts->delete($purchaseProduct)) {
            $this->Flash->success(__('The purchase product has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
