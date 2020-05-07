<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Alliances Controller
 *
 * @property \App\Model\Table\AlliancesTable $Alliances
 *
 * @method \App\Model\Entity\Alliance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlliancesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $alliances = $this->paginate($this->Alliances);

        $this->set(compact('alliances'));
    }

    /**
     * View method
     *
     * @param string|null $id Alliance id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $alliance = $this->Alliances->get($id, [
            'contain' => ['CakeSales', 'Contracts'],
        ]);

        $this->set('alliance', $alliance);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alliance = $this->Alliances->newEmptyEntity();
        if ($this->request->is('post')) {
            $alliance = $this->Alliances->patchEntity($alliance, $this->request->getData());
            if ($this->Alliances->save($alliance)) {
                $this->Flash->success(__('The alliance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alliance could not be saved. Please, try again.'));
        }
        $this->set(compact('alliance'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Alliance id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $alliance = $this->Alliances->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $alliance = $this->Alliances->patchEntity($alliance, $this->request->getData());
            if ($this->Alliances->save($alliance)) {
                $this->Flash->success(__('The alliance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alliance could not be saved. Please, try again.'));
        }
        $this->set(compact('alliance'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Alliance id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alliance = $this->Alliances->get($id);
        if ($this->Alliances->delete($alliance)) {
            $this->Flash->success(__('The alliance has been deleted.'));
        } else {
            $this->Flash->error(__('The alliance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
