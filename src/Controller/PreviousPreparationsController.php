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
    }
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
        $this->loadModel('PreparationProducts');
        if ($this->request->is(['patch', 'post', 'put'])) {
            //$previousPreparation = $this->PreviousPreparations->patchEntity($previousPreparation, $this->request->getData());
            
            $existRecord=array();
            foreach ($this->request->data['PreparationProducts'] as $v){
                if (isset($v['id']) and !empty($v['id'])) $existRecord[]=$v['id'];
            }
            if ($this->PreviousPreparations->save($previousPreparation)) {
                $this->Flash->success(__('The previous preparation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The previous preparation could not be saved. Please, try again.'));
        }
        $products = $this->PreparationProducts->Products->find('list', ['limit' => 200]);
        $preparationProduct=$this->PreviousPreparations->PreparationProducts->find('list', array('conditions'=>"PreparationProducts.previous_preparation_id IN ('$id')"));
            
        $this->set(compact('previousPreparation','products','preparationProduct'));
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
