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
        $this->paginate=[
            'contain' => ['FillingProducts'=>['Products','FillingProductMeasures'=>['FillingDimensions'=>['Dimensions']]],'FillingDimensions'=>['Dimensions']]
        ];
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
        $this->loadModel('FillingDimensions');
        $this->loadModel('FillingProducts');
        $this->loadModel('Recipes');
        $this->loadModel('Dimensions');
        if ($this->request->is('post')) {
            $rawFilling = $this->RawFillings->patchEntity($rawFilling, $this->request->getData(), [
                'associated' => [
                    'FillingProducts',
                    'FillingDimensions'
                ]
            ]);
            if ($result= $this->RawFillings->save($rawFilling)) {
                $this->Flash->success(__('The raw filling has been saved.'));

                return $this->redirect(['action' =>'edit', $result->id]);
            }
            $this->Flash->error(__('The raw filling could not be saved. Please, try again.'));
            
        }
        $dimensions = $this->FillingDimensions->Dimensions->find('list', ['limit' => 200]);
        $products = $this->FillingProducts->Products->find('list', ['limit' => 200]);
        $this->set(compact('rawFilling','dimensions','products'));
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
        $this->loadModel('FillingDimensions');
        $this->loadModel('FillingProducts');
        $this->loadModel('FillingProductMeasures');
        $this->loadModel('Products');
        $rawFilling = $this->RawFillings->get($id, [
            'contain' => ['FillingDimensions'=>['FillingProductMeasures'=>'FillingProducts'], 'FillingProducts'=>['Products','FillingProductMeasures'],],
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rawFilling = $this->RawFillings->patchEntity($rawFilling, $this->request->getData(),[
                'associated' => [
                    'FillingDimensions'=>['associated' => ['FillingProductMeasures'=>['associated' => ['FillingProducts']],]],
                ]
            ]);
            if (  $this->RawFillings->save($rawFilling)) {
                $this->Flash->success(__('The raw filling has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw filling could not be saved. Please, try again.'));
        }
        $this->set(compact('rawFilling'));
        $dimensions = $this->FillingDimensions->Dimensions->find('list', ['limit' => 200]);
        $pro = $this->FillingProducts->find('list')->where(['raw_filling_id =' => $id]);;
        $products =$this->FillingProducts->Products->find('list')
        ->where(['id in' => $pro]);

        $this->set(compact('rawFilling','dimensions','products','pro'));
    }

/*
    public function edit($id = null) {
        $this->Master->id = $id;
        if (!$this->Master->exists()) {
            throw new NotFoundException(__('Invalid master'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            // dapatkan record detail yang lama
            $oldDetail=$this->Master->Detail->find('list', array('fields'=>array('Detail.id','Detail.id'), 'conditions'=>"Detail.master_id IN ('$id')"));
     
            // dapatkan record detail yang masih ada 
            $existRecord=array();
            foreach ($this->request->data['Detail'] as $v){
                if (isset($v['id']) and !empty($v['id'])) $existRecord[]=$v['id'];
            }
     
            // dapatkan record yang dihapus melalui cara perbandingan antara oldDetail dengan existRecord
            $deleteRecord=array_diff($oldDetail, $existRecord);
     
            if ($this->Master->saveAll($this->request->data)) {
                if (!empty($deleteRecord)) {
                    if ($this->Master->Detail->deleteAll("Detail.id IN ('".implode("','",$deleteRecord)."')")) {
                        $this->Session->setFlash(__('The master has been saved'));
                    }
                    else $this->Session->setFlash(__('The detail that not used could not be deleted')); 
                }
                else $this->Session->setFlash(__('The master has been saved'));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->Session->setFlash(__('The master could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Master->read(null, $id);
        }
    }*/
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
