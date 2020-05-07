<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PreparationProducts Controller
 *
 * @property \App\Model\Table\PreparationProductsTable $PreparationProducts
 *
 * @method \App\Model\Entity\PreparationProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PreparationProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PreviousPreparations', 'Products'],
        ];
        $preparationProducts = $this->paginate($this->PreparationProducts);

        $this->set(compact('preparationProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Preparation Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $preparationProduct = $this->PreparationProducts->get($id, [
            'contain' => ['PreviousPreparations', 'Products'],
        ]);

        $this->set('preparationProduct', $preparationProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $preparationProduct = $this->PreparationProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $preparationProduct = $this->PreparationProducts->patchEntity($preparationProduct, $this->request->getData());
            if ($this->PreparationProducts->save($preparationProduct)) {
                $this->Flash->success(__('The preparation product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The preparation product could not be saved. Please, try again.'));
        }
        $products = $this->PreparationProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('preparationProduct', 'previousPreparations', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Preparation Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $preparationProduct = $this->PreparationProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $preparationProduct = $this->PreparationProducts->patchEntity($preparationProduct, $this->request->getData());
            if ($this->PreparationProducts->save($preparationProduct)) {
                $this->Flash->success(__('The preparation product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The preparation product could not be saved. Please, try again.'));
        }
        $previousPreparations = $this->PreparationProducts->PreviousPreparations->find('list', ['limit' => 200]);
        $products = $this->PreparationProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('preparationProduct', 'previousPreparations', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Preparation Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $preparationProduct = $this->PreparationProducts->get($id);
        if ($this->PreparationProducts->delete($preparationProduct)) {
            $this->Flash->success(__('The preparation product has been deleted.'));
        } else {
            $this->Flash->error(__('The preparation product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
