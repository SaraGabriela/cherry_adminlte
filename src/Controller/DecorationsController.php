<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Decorations Controller
 *
 * @property \App\Model\Table\DecorationsTable $Decorations
 *
 * @method \App\Model\Entity\Decoration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DecorationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        
        $this->paginate=[
            'contain' => ['DecorationProducts'=>['Products','DecorationProductMeasures'=>['DecorationDimensions'=>['Dimensions']]],'DecorationDimensions'=>['Dimensions']]
        ];
        $decorations = $this->paginate($this->Decorations);
        $this->set(compact('decorations'));
    }

    /**
     * View method
     *
     * @param string|null $id Decoration id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $decoration = $this->Decorations->get($id, [
            'contain' => ['DecorationDimensions', 'DecorationProducts', 'Recipes'],
        ]);

        $this->set('decoration', $decoration);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $decoration = $this->Decorations->newEmptyEntity();
        $this->loadModel('DecorationDimensions');
        $this->loadModel('DecorationProducts');
        $this->loadModel('Recipes');
        $this->loadModel('Dimensions');
        if ($this->request->is('post')) {
            $decoration = $this->Decorations->patchEntity($decoration, $this->request->getData(), [
                'associated' => [
                    'DecorationProducts',
                    'DecorationDimensions'
                ]
            ]);
            if ($result= $this->Decorations->save($decoration)) {
                $this->Flash->success(__('The decoration has been saved.'));

                //return $this->redirect(['action' =>'edit', $result->id]);
                return $this->redirect(['action' =>'edit', $result->id]);
            }
            $this->Flash->error(__('The decoration filldecorationing could not be saved. Please, try again.'));
            
        }
        $dimensions = $this->DecorationDimensions->Dimensions->find('list', ['limit' => 200]);
        $products = $this->DecorationProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('decoration','dimensions','products'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Decoration id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('DecorationDimensions');
        $this->loadModel('DecorationProducts');
        $this->loadModel('DecorationProductMeasures');
        $this->loadModel('Products');
        $decoration = $this->Decorations->get($id, [
            'contain' => ['DecorationDimensions'=>['DecorationProductMeasures'=>'DecorationProducts'], 'DecorationProducts'=>['Products','DecorationProductMeasures'],],
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $decoration = $this->Decorations->patchEntity($decoration, $this->request->getData(),[
                'associated' => [
                    'DecorationDimensions'=>['associated' => ['DecorationProductMeasures'=>['associated' => ['DecorationProducts']],]],
                ]
            ]);
            if (  $this->Decorations->save($decoration)) {
                $this->Flash->success(__('The decoration filldecorationing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The decoration decoration could not be saved. Please, try again.'));
        }
        $this->set(compact('decoration'));
        $dimensions = $this->DecorationDimensions->Dimensions->find('list', ['limit' => 200]);
        $pro = $this->DecorationProducts->find('list')->where(['decoration_id =' => $id]);;
        $products =$this->DecorationProducts->Products->find('list')
        ->where(['id in' => $pro]);

        $this->set(compact('decoration','dimensions','products','pro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Decoration id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $decoration = $this->Decorations->get($id);
        if ($this->Decorations->delete($decoration)) {
            $this->Flash->success(__('The decoration has been deleted.'));
        } else {
            $this->Flash->error(__('The decoration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
