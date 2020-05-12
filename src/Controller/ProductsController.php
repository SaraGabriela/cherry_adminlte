<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method

     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories'],
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories'],
        ]);

        $this->set('product', $product);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   

        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            
            if(!$product->getErrors){
                $image = $this->request->getData('image_file');

                $name  = $image->getClientFilename();

                if( !is_dir(WWW_ROOT.'img'.DS.'product-img') )
                mkdir(WWW_ROOT.'img'.DS.'product-img',0775);
                
                $targetPath = WWW_ROOT.'img'.DS.'product-img'.DS.$name;

                if($name)
                $image->moveTo($targetPath);
                
                $product->image = 'product-img/'.$name;
            }


            if ($this->Products->save($product)) {
                $this->Flash->success(__('The {0} has been saved.', 'Product'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Product'));
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The {0} has been saved.', 'Product'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Product'));
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Product'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Product'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
