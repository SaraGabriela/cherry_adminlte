<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DecorationProducts Controller
 *
 * @property \App\Model\Table\DecorationProductsTable $DecorationProducts
 *
 * @method \App\Model\Entity\DecorationProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DecorationProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Decorations', 'Products'],
        ];
        $decorationProducts = $this->paginate($this->DecorationProducts);

        $this->set(compact('decorationProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Decoration Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $decorationProduct = $this->DecorationProducts->get($id, [
            'contain' => ['Decorations', 'Products', 'DecorationProductMeasures'],
        ]);

        $this->set('decorationProduct', $decorationProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $decorationProduct = $this->DecorationProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $decorationProduct = $this->DecorationProducts->patchEntity($decorationProduct, $this->request->getData());
            if ($this->DecorationProducts->save($decorationProduct)) {
                $this->Flash->success(__('The decoration product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The decoration product could not be saved. Please, try again.'));
        }
        $decorations = $this->DecorationProducts->Decorations->find('list', ['limit' => 200]);
        $products = $this->DecorationProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('decorationProduct', 'decorations', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Decoration Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $decorationProduct = $this->DecorationProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $decorationProduct = $this->DecorationProducts->patchEntity($decorationProduct, $this->request->getData());
            if ($this->DecorationProducts->save($decorationProduct)) {
                $this->Flash->success(__('The decoration product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The decoration product could not be saved. Please, try again.'));
        }
        $decorations = $this->DecorationProducts->Decorations->find('list', ['limit' => 200]);
        $products = $this->DecorationProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('decorationProduct', 'decorations', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Decoration Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $decorationProduct = $this->DecorationProducts->get($id);
        if ($this->DecorationProducts->delete($decorationProduct)) {
            $this->Flash->success(__('The decoration product has been deleted.'));
        } else {
            $this->Flash->error(__('The decoration product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
