<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TransferFinalCake Controller
 *
 * @property \App\Model\Table\TransferFinalCakeTable $TransferFinalCake
 *
 * @method \App\Model\Entity\TransferFinalCake[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransferFinalCakeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Transfers', 'FinalCakes'],
        ];
        $transferFinalCake = $this->paginate($this->TransferFinalCake);

        $this->set(compact('transferFinalCake'));
    }

    /**
     * View method
     *
     * @param string|null $id Transfer Final Cake id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transferFinalCake = $this->TransferFinalCake->get($id, [
            'contain' => ['Transfers', 'FinalCakes'],
        ]);

        $this->set('transferFinalCake', $transferFinalCake);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transferFinalCake = $this->TransferFinalCake->newEmptyEntity();
        if ($this->request->is('post')) {
            $transferFinalCake = $this->TransferFinalCake->patchEntity($transferFinalCake, $this->request->getData());
            if ($this->TransferFinalCake->save($transferFinalCake)) {
                $this->Flash->success(__('The transfer final cake has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer final cake could not be saved. Please, try again.'));
        }
        $transfers = $this->TransferFinalCake->Transfers->find('list', ['limit' => 200]);
        $finalCakes = $this->TransferFinalCake->FinalCakes->find('list', ['limit' => 200]);
        $this->set(compact('transferFinalCake', 'transfers', 'finalCakes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transfer Final Cake id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transferFinalCake = $this->TransferFinalCake->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transferFinalCake = $this->TransferFinalCake->patchEntity($transferFinalCake, $this->request->getData());
            if ($this->TransferFinalCake->save($transferFinalCake)) {
                $this->Flash->success(__('The transfer final cake has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer final cake could not be saved. Please, try again.'));
        }
        $transfers = $this->TransferFinalCake->Transfers->find('list', ['limit' => 200]);
        $finalCakes = $this->TransferFinalCake->FinalCakes->find('list', ['limit' => 200]);
        $this->set(compact('transferFinalCake', 'transfers', 'finalCakes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transfer Final Cake id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transferFinalCake = $this->TransferFinalCake->get($id);
        if ($this->TransferFinalCake->delete($transferFinalCake)) {
            $this->Flash->success(__('The transfer final cake has been deleted.'));
        } else {
            $this->Flash->error(__('The transfer final cake could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
