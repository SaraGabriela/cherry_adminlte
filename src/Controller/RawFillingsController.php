<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RawFillings Controller
 *
 * @property \App\Model\Table\RawFillingsTable $RawFillings
 *
 * @method \App\Model\Entity\RawFilling[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RawFillingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $rawFillings = $this->paginate($this->RawFillings);

        $this->set(compact('rawFillings'));
    }

    /**
     * View method
     *
     * @param string|null $id Raw Filling id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rawFilling = $this->RawFillings->get($id, [
            'contain' => ['FillingDimensions', 'FillingProducts', 'Recipes'],
        ]);

        $this->set('rawFilling', $rawFilling);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rawFilling = $this->RawFillings->newEmptyEntity();
        if ($this->request->is('post')) {
            $rawFilling = $this->RawFillings->patchEntity($rawFilling, $this->request->getData());
            if ($this->RawFillings->save($rawFilling)) {
                $this->Flash->success(__('The raw filling has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw filling could not be saved. Please, try again.'));
        }
        $this->set(compact('rawFilling'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Raw Filling id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rawFilling = $this->RawFillings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rawFilling = $this->RawFillings->patchEntity($rawFilling, $this->request->getData());
            if ($this->RawFillings->save($rawFilling)) {
                $this->Flash->success(__('The raw filling has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw filling could not be saved. Please, try again.'));
        }
        $this->set(compact('rawFilling'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Raw Filling id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rawFilling = $this->RawFillings->get($id);
        if ($this->RawFillings->delete($rawFilling)) {
            $this->Flash->success(__('The raw filling has been deleted.'));
        } else {
            $this->Flash->error(__('The raw filling could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
