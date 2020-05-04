<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RawProducts Controller
 *
 * @property \App\Model\Table\RawProductsTable $RawProducts
 *
 * @method \App\Model\Entity\RawProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RawProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws', 'Products'],
        ];
        $rawProducts = $this->paginate($this->RawProducts);

        $this->set(compact('rawProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Raw Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rawProduct = $this->RawProducts->get($id, [
            'contain' => ['Raws', 'Products', 'RecipeProductMeasures'],
        ]);

        $this->set('rawProduct', $rawProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rawProduct = $this->RawProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $rawProduct = $this->RawProducts->patchEntity($rawProduct, $this->request->getData());
            if ($this->RawProducts->save($rawProduct)) {
                $this->Flash->success(__('The raw product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw product could not be saved. Please, try again.'));
        }
        $raws = $this->RawProducts->Raws->find('list', ['limit' => 200]);
        $products = $this->RawProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('rawProduct', 'raws', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Raw Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rawProduct = $this->RawProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rawProduct = $this->RawProducts->patchEntity($rawProduct, $this->request->getData());
            if ($this->RawProducts->save($rawProduct)) {
                $this->Flash->success(__('The raw product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw product could not be saved. Please, try again.'));
        }
        $raws = $this->RawProducts->Raws->find('list', ['limit' => 200]);
        $products = $this->RawProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('rawProduct', 'raws', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Raw Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rawProduct = $this->RawProducts->get($id);
        if ($this->RawProducts->delete($rawProduct)) {
            $this->Flash->success(__('The raw product has been deleted.'));
        } else {
            $this->Flash->error(__('The raw product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
