<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PreviousPreparations Controller
 *
 * @property \App\Model\Table\PreviousPreparationsTable $PreviousPreparations
 * @property \App\Model\Table\PreparationProductsTable $PreparationProducts
 * 
 *
 * @method \App\Model\Entity\PreviousPreparation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PreviousPreparationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $previousPreparations = $this->paginate($this->PreviousPreparations);

        $this->set(compact('previousPreparations'));
    }

    /**
     * View method
     *
     * @param string|null $id Previous Preparation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $previousPreparation = $this->PreviousPreparations->get($id, [
            'contain' => ['PreparationProducts'=>['Products'],],
        ]);

        $this->set('previousPreparation', $previousPreparation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $previousPreparation = $this->PreviousPreparations->newEmptyEntity();
        $this->loadModel('PreparationProducts');

        
        if (!empty($this->request->getData())) {
            $previousPreparation = $this->PreviousPreparations->patchEntity($previousPreparation, $this->request->getData(), [
                'associated' => [
                    'PreparationProducts'
                ]
            ]);
            // Use the following to avoid validation errors:
            //unset($this->PreviousPreparations->PreparationProducts->validate['company_id']);
            
            if ($this->PreviousPreparations->save($previousPreparation)) {
                $this->Flash->success(__('The previous preparation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The previous preparation could not be saved. Please, try again.'));
        }
        
        $products = $this->PreparationProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('previousPreparation','products'));
        /*
        if ($this->request->is('post')) {
            $this->request->getData();
            $previousPreparation = $this->PreviousPreparations->patchEntity($previousPreparation, $this->request->getData());
            
            
            if ($this->PreviousPreparations->save($previousPreparation)) {
                $this->Flash->success(__('The previous preparation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The previous preparation could not be saved. Please, try again.'));
        }
        $products = $this->PreparationProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('previousPreparation','preparationProduct','products'));
        */
    }


    /*public function addHeaderDetail($header,$detail){
        $this->loadModel('PreparationProducts');
        $previousPreparation = $this->PreviousPreparations->newEmptyEntity();
        $previousPreparation->name=$header->name;
        $previousPreparation->quantity_produced=$header->quantity_produced;
        $previousPreparation->description=$header->description;
        foreach($detail):

        endforeach;


    }*/

    /**
     * Edit method
     *
     * @param string|null $id Previous Preparation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $previousPreparation = $this->PreviousPreparations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $previousPreparation = $this->PreviousPreparations->patchEntity($previousPreparation, $this->request->getData());
            if ($this->PreviousPreparations->save($previousPreparation)) {
                $this->Flash->success(__('The previous preparation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The previous preparation could not be saved. Please, try again.'));
        }
        $this->set(compact('previousPreparation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Previous Preparation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $previousPreparation = $this->PreviousPreparations->get($id);
        if ($this->PreviousPreparations->delete($previousPreparation)) {
            $this->Flash->success(__('The previous preparation has been deleted.'));
        } else {
            $this->Flash->error(__('The previous preparation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
