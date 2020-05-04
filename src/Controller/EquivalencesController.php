<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Equivalences Controller
 *
 * @property \App\Model\Table\EquivalencesTable $Equivalences
 *
 * @method \App\Model\Entity\Equivalence[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EquivalencesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $equivalences = $this->paginate($this->Equivalences);

        $this->set(compact('equivalences'));
    }

    /**
     * View method
     *
     * @param string|null $id Equivalence id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equivalence = $this->Equivalences->get($id, [
            'contain' => ['EquivalenceDimensions', 'Raws'],
        ]);

        $this->set('equivalence', $equivalence);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equivalence = $this->Equivalences->newEmptyEntity();
        if ($this->request->is('post')) {
            $equivalence = $this->Equivalences->patchEntity($equivalence, $this->request->getData());
            if ($this->Equivalences->save($equivalence)) {
                $this->Flash->success(__('The equivalence has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equivalence could not be saved. Please, try again.'));
        }
        $this->set(compact('equivalence'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Equivalence id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equivalence = $this->Equivalences->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equivalence = $this->Equivalences->patchEntity($equivalence, $this->request->getData());
            if ($this->Equivalences->save($equivalence)) {
                $this->Flash->success(__('The equivalence has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equivalence could not be saved. Please, try again.'));
        }
        $this->set(compact('equivalence'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Equivalence id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equivalence = $this->Equivalences->get($id);
        if ($this->Equivalences->delete($equivalence)) {
            $this->Flash->success(__('The equivalence has been deleted.'));
        } else {
            $this->Flash->error(__('The equivalence could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
