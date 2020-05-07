<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Transformations Controller
 *
 * @property \App\Model\Table\TransformationsTable $Transformations
 *
 * @method \App\Model\Entity\Transformation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransformationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FinalCakes', 'ProdrecipeDetails'],
        ];
        $transformations = $this->paginate($this->Transformations);

        $this->set(compact('transformations'));
    }

    /**
     * View method
     *
     * @param string|null $id Transformation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transformation = $this->Transformations->get($id, [
            'contain' => ['FinalCakes', 'ProdrecipeDetails'],
        ]);

        $this->set('transformation', $transformation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transformation = $this->Transformations->newEmptyEntity();
        if ($this->request->is('post')) {
            $transformation = $this->Transformations->patchEntity($transformation, $this->request->getData());
            if ($this->Transformations->save($transformation)) {
                $this->Flash->success(__('The transformation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transformation could not be saved. Please, try again.'));
        }
        $finalCakes = $this->Transformations->FinalCakes->find('list', ['limit' => 200]);
        $prodrecipeDetails = $this->Transformations->ProdrecipeDetails->find('list', ['limit' => 200]);
        $this->set(compact('transformation', 'finalCakes', 'prodrecipeDetails'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transformation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transformation = $this->Transformations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transformation = $this->Transformations->patchEntity($transformation, $this->request->getData());
            if ($this->Transformations->save($transformation)) {
                $this->Flash->success(__('The transformation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transformation could not be saved. Please, try again.'));
        }
        $finalCakes = $this->Transformations->FinalCakes->find('list', ['limit' => 200]);
        $prodrecipeDetails = $this->Transformations->ProdrecipeDetails->find('list', ['limit' => 200]);
        $this->set(compact('transformation', 'finalCakes', 'prodrecipeDetails'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transformation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transformation = $this->Transformations->get($id);
        if ($this->Transformations->delete($transformation)) {
            $this->Flash->success(__('The transformation has been deleted.'));
        } else {
            $this->Flash->error(__('The transformation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
