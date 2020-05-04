<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DecorationProductMeasures Controller
 *
 * @property \App\Model\Table\DecorationProductMeasuresTable $DecorationProductMeasures
 *
 * @method \App\Model\Entity\DecorationProductMeasure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DecorationProductMeasuresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DecorationDimensions', 'DecorationProducts'],
        ];
        $decorationProductMeasures = $this->paginate($this->DecorationProductMeasures);

        $this->set(compact('decorationProductMeasures'));
    }

    /**
     * View method
     *
     * @param string|null $id Decoration Product Measure id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $decorationProductMeasure = $this->DecorationProductMeasures->get($id, [
            'contain' => ['DecorationDimensions', 'DecorationProducts'],
        ]);

        $this->set('decorationProductMeasure', $decorationProductMeasure);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $decorationProductMeasure = $this->DecorationProductMeasures->newEmptyEntity();
        if ($this->request->is('post')) {
            $decorationProductMeasure = $this->DecorationProductMeasures->patchEntity($decorationProductMeasure, $this->request->getData());
            if ($this->DecorationProductMeasures->save($decorationProductMeasure)) {
                $this->Flash->success(__('The decoration product measure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The decoration product measure could not be saved. Please, try again.'));
        }
        $decorationDimensions = $this->DecorationProductMeasures->DecorationDimensions->find('list', ['limit' => 200]);
        $decorationProducts = $this->DecorationProductMeasures->DecorationProducts->find('list', ['limit' => 200]);
        $this->set(compact('decorationProductMeasure', 'decorationDimensions', 'decorationProducts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Decoration Product Measure id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $decorationProductMeasure = $this->DecorationProductMeasures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $decorationProductMeasure = $this->DecorationProductMeasures->patchEntity($decorationProductMeasure, $this->request->getData());
            if ($this->DecorationProductMeasures->save($decorationProductMeasure)) {
                $this->Flash->success(__('The decoration product measure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The decoration product measure could not be saved. Please, try again.'));
        }
        $decorationDimensions = $this->DecorationProductMeasures->DecorationDimensions->find('list', ['limit' => 200]);
        $decorationProducts = $this->DecorationProductMeasures->DecorationProducts->find('list', ['limit' => 200]);
        $this->set(compact('decorationProductMeasure', 'decorationDimensions', 'decorationProducts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Decoration Product Measure id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $decorationProductMeasure = $this->DecorationProductMeasures->get($id);
        if ($this->DecorationProductMeasures->delete($decorationProductMeasure)) {
            $this->Flash->success(__('The decoration product measure has been deleted.'));
        } else {
            $this->Flash->error(__('The decoration product measure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
