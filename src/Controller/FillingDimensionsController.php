<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FillingDimensions Controller
 *
 * @property \App\Model\Table\FillingDimensionsTable $FillingDimensions
 *
 * @method \App\Model\Entity\FillingDimension[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FillingDimensionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RawFillings', 'Dimensions'],
        ];
        $fillingDimensions = $this->paginate($this->FillingDimensions);

        $this->set(compact('fillingDimensions'));
    }

    /**
     * View method
     *
     * @param string|null $id Filling Dimension id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fillingDimension = $this->FillingDimensions->get($id, [
            'contain' => ['RawFillings', 'Dimensions', 'FillingProductMeasures'],
        ]);

        $this->set('fillingDimension', $fillingDimension);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fillingDimension = $this->FillingDimensions->newEmptyEntity();
        if ($this->request->is('post')) {
            $fillingDimension = $this->FillingDimensions->patchEntity($fillingDimension, $this->request->getData());
            if ($this->FillingDimensions->save($fillingDimension)) {
                $this->Flash->success(__('The filling dimension has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filling dimension could not be saved. Please, try again.'));
        }
        $rawFillings = $this->FillingDimensions->RawFillings->find('list', ['limit' => 200]);
        $dimensions = $this->FillingDimensions->Dimensions->find('list', ['limit' => 200]);
        $this->set(compact('fillingDimension', 'rawFillings', 'dimensions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Filling Dimension id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fillingDimension = $this->FillingDimensions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fillingDimension = $this->FillingDimensions->patchEntity($fillingDimension, $this->request->getData());
            if ($this->FillingDimensions->save($fillingDimension)) {
                $this->Flash->success(__('The filling dimension has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The filling dimension could not be saved. Please, try again.'));
        }
        $rawFillings = $this->FillingDimensions->RawFillings->find('list', ['limit' => 200]);
        $dimensions = $this->FillingDimensions->Dimensions->find('list', ['limit' => 200]);
        $this->set(compact('fillingDimension', 'rawFillings', 'dimensions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Filling Dimension id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fillingDimension = $this->FillingDimensions->get($id);
        if ($this->FillingDimensions->delete($fillingDimension)) {
            $this->Flash->success(__('The filling dimension has been deleted.'));
        } else {
            $this->Flash->error(__('The filling dimension could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
