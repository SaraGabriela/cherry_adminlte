<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cakes Controller
 *
 * @property \App\Model\Table\CakesTable $Cakes
 *
 * @method \App\Model\Entity\Cake[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CakesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cakes = $this->paginate($this->Cakes);

        $this->set(compact('cakes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cake id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cake = $this->Cakes->get($id, [
            'contain' => ['CakeSales', 'FinalCakes', 'Recipes'],
        ]);

        $this->set('cake', $cake);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cake = $this->Cakes->newEmptyEntity();
        if ($this->request->is('post')) {
            $cake = $this->Cakes->patchEntity($cake, $this->request->getData());
            if ($this->Cakes->save($cake)) {
                $this->Flash->success(__('The cake has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cake could not be saved. Please, try again.'));
        }
        $this->set(compact('cake'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cake id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cake = $this->Cakes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cake = $this->Cakes->patchEntity($cake, $this->request->getData());
            if ($this->Cakes->save($cake)) {
                $this->Flash->success(__('The cake has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cake could not be saved. Please, try again.'));
        }
        $this->set(compact('cake'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cake id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cake = $this->Cakes->get($id);
        if ($this->Cakes->delete($cake)) {
            $this->Flash->success(__('The cake has been deleted.'));
        } else {
            $this->Flash->error(__('The cake could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
