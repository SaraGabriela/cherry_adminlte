<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Decorations Controller
 *
 * @property \App\Model\Table\DecorationsTable $Decorations
 *
 * @method \App\Model\Entity\Decoration[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DecorationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $decorations = $this->paginate($this->Decorations);

        $this->set(compact('decorations'));
    }

    /**
     * View method
     *
     * @param string|null $id Decoration id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $decoration = $this->Decorations->get($id, [
            'contain' => ['DecorationDimensions', 'DecorationProducts', 'Recipes'],
        ]);

        $this->set('decoration', $decoration);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $decoration = $this->Decorations->newEmptyEntity();
        if ($this->request->is('post')) {
            $decoration = $this->Decorations->patchEntity($decoration, $this->request->getData());
            if ($this->Decorations->save($decoration)) {
                $this->Flash->success(__('The decoration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The decoration could not be saved. Please, try again.'));
        }
        $this->set(compact('decoration'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Decoration id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $decoration = $this->Decorations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $decoration = $this->Decorations->patchEntity($decoration, $this->request->getData());
            if ($this->Decorations->save($decoration)) {
                $this->Flash->success(__('The decoration has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The decoration could not be saved. Please, try again.'));
        }
        $this->set(compact('decoration'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Decoration id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $decoration = $this->Decorations->get($id);
        if ($this->Decorations->delete($decoration)) {
            $this->Flash->success(__('The decoration has been deleted.'));
        } else {
            $this->Flash->error(__('The decoration could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
