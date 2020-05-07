<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CakeSales Controller
 *
 * @property \App\Model\Table\CakeSalesTable $CakeSales
 *
 * @method \App\Model\Entity\CakeSale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CakeSalesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cakes', 'Alliances'],
        ];
        $cakeSales = $this->paginate($this->CakeSales);

        $this->set(compact('cakeSales'));
    }

    /**
     * View method
     *
     * @param string|null $id Cake Sale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cakeSale = $this->CakeSales->get($id, [
            'contain' => ['Cakes', 'Alliances'],
        ]);

        $this->set('cakeSale', $cakeSale);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cakeSale = $this->CakeSales->newEmptyEntity();
        if ($this->request->is('post')) {
            $cakeSale = $this->CakeSales->patchEntity($cakeSale, $this->request->getData());
            if ($this->CakeSales->save($cakeSale)) {
                $this->Flash->success(__('The cake sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cake sale could not be saved. Please, try again.'));
        }
        $cakes = $this->CakeSales->Cakes->find('list', ['limit' => 200]);
        $alliances = $this->CakeSales->Alliances->find('list', ['limit' => 200]);
        $this->set(compact('cakeSale', 'cakes', 'alliances'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cake Sale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cakeSale = $this->CakeSales->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cakeSale = $this->CakeSales->patchEntity($cakeSale, $this->request->getData());
            if ($this->CakeSales->save($cakeSale)) {
                $this->Flash->success(__('The cake sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cake sale could not be saved. Please, try again.'));
        }
        $cakes = $this->CakeSales->Cakes->find('list', ['limit' => 200]);
        $alliances = $this->CakeSales->Alliances->find('list', ['limit' => 200]);
        $this->set(compact('cakeSale', 'cakes', 'alliances'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cake Sale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cakeSale = $this->CakeSales->get($id);
        if ($this->CakeSales->delete($cakeSale)) {
            $this->Flash->success(__('The cake sale has been deleted.'));
        } else {
            $this->Flash->error(__('The cake sale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
