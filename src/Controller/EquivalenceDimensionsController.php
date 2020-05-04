<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EquivalenceDimensions Controller
 *
 * @property \App\Model\Table\EquivalenceDimensionsTable $EquivalenceDimensions
 *
 * @method \App\Model\Entity\EquivalenceDimension[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EquivalenceDimensionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Equivalences', 'Dimensions'],
        ];
        $equivalenceDimensions = $this->paginate($this->EquivalenceDimensions);

        $this->set(compact('equivalenceDimensions'));
    }

    /**
     * View method
     *
     * @param string|null $id Equivalence Dimension id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equivalenceDimension = $this->EquivalenceDimensions->get($id, [
            'contain' => ['Equivalences', 'Dimensions'],
        ]);

        $this->set('equivalenceDimension', $equivalenceDimension);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equivalenceDimension = $this->EquivalenceDimensions->newEmptyEntity();
        if ($this->request->is('post')) {
            $equivalenceDimension = $this->EquivalenceDimensions->patchEntity($equivalenceDimension, $this->request->getData());
            if ($this->EquivalenceDimensions->save($equivalenceDimension)) {
                $this->Flash->success(__('The equivalence dimension has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equivalence dimension could not be saved. Please, try again.'));
        }
        $equivalences = $this->EquivalenceDimensions->Equivalences->find('list', ['limit' => 200]);
        $dimensions = $this->EquivalenceDimensions->Dimensions->find('list', ['limit' => 200]);
        $this->set(compact('equivalenceDimension', 'equivalences', 'dimensions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Equivalence Dimension id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equivalenceDimension = $this->EquivalenceDimensions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equivalenceDimension = $this->EquivalenceDimensions->patchEntity($equivalenceDimension, $this->request->getData());
            if ($this->EquivalenceDimensions->save($equivalenceDimension)) {
                $this->Flash->success(__('The equivalence dimension has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equivalence dimension could not be saved. Please, try again.'));
        }
        $equivalences = $this->EquivalenceDimensions->Equivalences->find('list', ['limit' => 200]);
        $dimensions = $this->EquivalenceDimensions->Dimensions->find('list', ['limit' => 200]);
        $this->set(compact('equivalenceDimension', 'equivalences', 'dimensions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Equivalence Dimension id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equivalenceDimension = $this->EquivalenceDimensions->get($id);
        if ($this->EquivalenceDimensions->delete($equivalenceDimension)) {
            $this->Flash->success(__('The equivalence dimension has been deleted.'));
        } else {
            $this->Flash->error(__('The equivalence dimension could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
