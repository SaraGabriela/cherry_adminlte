<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Purchases Controller
 *
 * @property \App\Model\Table\PurchasesTable $Purchases
 *
 * @method \App\Model\Entity\Purchase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchasesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate=[
            'contain' => ['Suppliers','PurchaseProducts'],
        ];
        $purchase = $this->paginate($this->Purchases);
        $this->set('purchase', $purchase);

    }

    /**
     * View method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchase = $this->Purchases->get($id, [
            'contain' => ['Suppliers', 'PurchaseProducts'],
        ]);

        $this->set('purchase', $purchase);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchase = $this->Purchases->newEmptyEntity();
        if ($this->request->is('post')) {
            $purchase = $this->Purchases->patchEntity($purchase, $this->request->getData());
            if ($this->Purchases->save($purchase)) {
                $this->Flash->success(__('The {0} has been saved.', 'Purchase'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Purchase'));
        }
        $suppliers = $this->Purchases->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('purchase', 'suppliers'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchase = $this->Purchases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchase = $this->Purchases->patchEntity($purchase, $this->request->getData());
            if ($this->Purchases->save($purchase)) {
                $this->Flash->success(__('The {0} has been saved.', 'Purchase'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Purchase'));
        }
        $suppliers = $this->Purchases->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('purchase', 'suppliers'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchase = $this->Purchases->get($id);
        if ($this->Purchases->delete($purchase)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Purchase'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Purchase'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
