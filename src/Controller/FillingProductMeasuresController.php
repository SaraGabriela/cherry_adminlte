<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FillingProductMeasures Controller
 *
 * @property \App\Model\Table\FillingProductMeasuresTable $FillingProductMeasures
 *
 * @method \App\Model\Entity\FillingProductMeasure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FillingProductMeasuresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FillingProducts', 'FillingDimensions'],
        ];
        $fillingProductMeasures = $this->paginate($this->FillingProductMeasures);

        $this->set(compact('fillingProductMeasures'));
    }

    /**
     * View method
     *
     * @param string|null $id Filling Product Measure id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fillingProductMeasure = $this->FillingProductMeasures->get($id, [
            'contain' => ['FillingProducts', 'FillingDimensions'],
        ]);

        $this->set('fillingProductMeasure', $fillingProductMeasure);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fillingProductMeasure = $this->FillingProductMeasures->newEmptyEntity();
        if ($this->request->is('post')) {
            $fillingProductMeasure = $this->FillingProductMeasures->patchEntity($fillingProductMeasure, $this->request->getData());
            if ($this->FillingProductMeasures->save($fillingProductMeasure)) {
                $this->Flash->success(__('The filling product measure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filling product measure could not be saved. Please, try again.'));
        }
        $fillingProducts = $this->FillingProductMeasures->FillingProducts->find('list', ['limit' => 200]);
        $fillingDimensions = $this->FillingProductMeasures->FillingDimensions->find('list', ['limit' => 200]);
        $this->set(compact('fillingProductMeasure', 'fillingProducts', 'fillingDimensions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Filling Product Measure id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fillingProductMeasure = $this->FillingProductMeasures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fillingProductMeasure = $this->FillingProductMeasures->patchEntity($fillingProductMeasure, $this->request->getData());
            if ($this->FillingProductMeasures->save($fillingProductMeasure)) {
                $this->Flash->success(__('The filling product measure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filling product measure could not be saved. Please, try again.'));
        }
        $fillingProducts = $this->FillingProductMeasures->FillingProducts->find('list', ['limit' => 200]);
        $fillingDimensions = $this->FillingProductMeasures->FillingDimensions->find('list', ['limit' => 200]);
        $this->set(compact('fillingProductMeasure', 'fillingProducts', 'fillingDimensions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Filling Product Measure id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fillingProductMeasure = $this->FillingProductMeasures->get($id);
        if ($this->FillingProductMeasures->delete($fillingProductMeasure)) {
            $this->Flash->success(__('The filling product measure has been deleted.'));
        } else {
            $this->Flash->error(__('The filling product measure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
