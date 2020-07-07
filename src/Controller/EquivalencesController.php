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
        $this->paginate=[
            'contain' => ['Raws','EquivalenceDimensions'=>['Dimensions']],
        ];
        $equivalences = $this->paginate($this->Equivalences);

        $this->set(compact('equivalences',$equivalences));
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
            'contain' => ['EquivalenceDimensions'=>['Dimensions'], 'Raws'],
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
        $this->loadModel('Dimensions');
        $this->loadModel('Raws');
        $this->loadModel('EquivalenceDimensions');
        if ($this->request->is('post')) {
            $equivalence = $this->Equivalences->patchEntity($equivalence, $this->request->getData(), [
                'associated' => [
                    'Raws',
                    'EquivalenceDimensions'
                ]
            ]);
            if ($this->Equivalences->save($equivalence)) {
                $this->Flash->success(__('The equivalence has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equivalence could not be saved. Please, try again.'));
        }
        $raws = $this->Raws->find('all');
        $dimensions = $this->EquivalenceDimensions->Dimensions->find('list', ['limit' => 200]);
        $this->set(compact('equivalence','dimensions','raws'));
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
