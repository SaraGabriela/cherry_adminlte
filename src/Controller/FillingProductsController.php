<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FillingProducts Controller
 *
 * @property \App\Model\Table\FillingProductsTable $FillingProducts
 *
 * @method \App\Model\Entity\FillingProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FillingProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RawFillings', 'Products'],
        ];
        $fillingProducts = $this->paginate($this->FillingProducts);

        $this->set(compact('fillingProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Filling Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fillingProduct = $this->FillingProducts->get($id, [
            'contain' => ['RawFillings', 'Products', 'FillingProductMeasures'],
        ]);

        $this->set('fillingProduct', $fillingProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fillingProduct = $this->FillingProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $fillingProduct = $this->FillingProducts->patchEntity($fillingProduct, $this->request->getData());
            if ($this->FillingProducts->save($fillingProduct)) {
                $this->Flash->success(__('The filling product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filling product could not be saved. Please, try again.'));
        }
        $rawFillings = $this->FillingProducts->RawFillings->find('list', ['limit' => 200]);
        $products = $this->FillingProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('fillingProduct', 'rawFillings', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Filling Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fillingProduct = $this->FillingProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fillingProduct = $this->FillingProducts->patchEntity($fillingProduct, $this->request->getData());
            if ($this->FillingProducts->save($fillingProduct)) {
                $this->Flash->success(__('The filling product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filling product could not be saved. Please, try again.'));
        }
        $rawFillings = $this->FillingProducts->RawFillings->find('list', ['limit' => 200]);
        $products = $this->FillingProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('fillingProduct', 'rawFillings', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Filling Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fillingProduct = $this->FillingProducts->get($id);
        if ($this->FillingProducts->delete($fillingProduct)) {
            $this->Flash->success(__('The filling product has been deleted.'));
        } else {
            $this->Flash->error(__('The filling product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
