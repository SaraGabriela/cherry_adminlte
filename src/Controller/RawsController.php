<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Raws Controller
 *
 * @property \App\Model\Table\RawsTable $Raws
 *
 * @method \App\Model\Entity\Raw[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RawsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Equivalences'],
        ];
        $raws = $this->paginate($this->Raws);

        $this->set(compact('raws'));
    }

    /**
     * View method
     *
     * @param string|null $id Raw id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $raw = $this->Raws->get($id, [
            'contain' => ['Equivalences', 'RawProducts', 'Recipes'],
        ]);

        $this->set('raw', $raw);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $raw = $this->Raws->newEmptyEntity();
        if ($this->request->is('post')) {
            $raw = $this->Raws->patchEntity($raw, $this->request->getData());
            if ($this->Raws->save($raw)) {
                $this->Flash->success(__('The raw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw could not be saved. Please, try again.'));
        }
        $equivalences = $this->Raws->Equivalences->find('list', ['limit' => 200]);
        $this->set(compact('raw', 'equivalences'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Raw id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $raw = $this->Raws->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $raw = $this->Raws->patchEntity($raw, $this->request->getData());
            if ($this->Raws->save($raw)) {
                $this->Flash->success(__('The raw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw could not be saved. Please, try again.'));
        }
        $equivalences = $this->Raws->Equivalences->find('list', ['limit' => 200]);
        $this->set(compact('raw', 'equivalences'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Raw id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $raw = $this->Raws->get($id);
        if ($this->Raws->delete($raw)) {
            $this->Flash->success(__('The raw has been deleted.'));
        } else {
            $this->Flash->error(__('The raw could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
