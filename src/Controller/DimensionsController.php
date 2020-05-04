<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Dimensions Controller
 *
 * @property \App\Model\Table\DimensionsTable $Dimensions
 *
 * @method \App\Model\Entity\Dimension[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DimensionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $dimensions = $this->paginate($this->Dimensions);

        $this->set(compact('dimensions'));
    }

    /**
     * View method
     *
     * @param string|null $id Dimension id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dimension = $this->Dimensions->get($id, [
            'contain' => ['DecorationDimensions', 'EquivalenceDimensions', 'FillingDimensions', 'Recipes'],
        ]);

        $this->set('dimension', $dimension);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dimension = $this->Dimensions->newEmptyEntity();
        if ($this->request->is('post')) {
            $dimension = $this->Dimensions->patchEntity($dimension, $this->request->getData());
            if ($this->Dimensions->save($dimension)) {
                $this->Flash->success(__('The dimension has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dimension could not be saved. Please, try again.'));
        }
        $this->set(compact('dimension'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dimension id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dimension = $this->Dimensions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dimension = $this->Dimensions->patchEntity($dimension, $this->request->getData());
            if ($this->Dimensions->save($dimension)) {
                $this->Flash->success(__('The dimension has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dimension could not be saved. Please, try again.'));
        }
        $this->set(compact('dimension'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dimension id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dimension = $this->Dimensions->get($id);
        if ($this->Dimensions->delete($dimension)) {
            $this->Flash->success(__('The dimension has been deleted.'));
        } else {
            $this->Flash->error(__('The dimension could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
