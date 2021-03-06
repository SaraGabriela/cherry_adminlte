<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Stocks Controller
 *
 * @property \App\Model\Table\StocksTable $Stocks
 *
 * @method \App\Model\Entity\Stock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StocksController extends AppController
{
    /**
     * Index method  
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Branches','RecipeDimensions'=>['Recipes','Dimensions']],
            'limit' => 5
        ];
        $stocks = $this->paginate($this->Stocks);

        $this->set(compact('stocks'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => ['RecipeDimensions'=>['Recipes','Dimensions'], 'Branches'],
        ]);

        $this->set('stock', $stock);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stock = $this->Stocks->newEmptyEntity();
        if ($this->request->is('post')) {
            $stock = $this->Stocks->patchEntity($stock, $this->request->getData());
            if($stock2 = $this->paginate($this->Stocks->find('all')->where(['recipe_dimensions_id' => $stock->recipe_dimensions_id, 'branch_id' => $stock->branch_id]))){
                if(count($stock2)){
                    foreach($stock2 as $st2){
                        $stock3 = $this->Stocks->get($st2->stock_id);
                    }
                    $stock3->quantity += $stock->quantity;
                    $this->Stocks->save($stock3);
                    return $this->redirect(['action' => 'index']);
                }
            }
            if ($this->Stocks->save($stock)) {
                $this->Flash->success(__('The stock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock could not be saved. Please, try again.'));
        }
        $recipeDimensions = $this->Stocks->RecipeDimensions->find('list', ['limit' => 200]);
        $branches = $this->Stocks->Branches->find('list', ['limit' => 200]);
        $this->set(compact('stock', 'recipeDimensions', 'branches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => ['RecipeDimensions'=>['Recipes','Dimensions'], 'Branches'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stock = $this->Stocks->patchEntity($stock, $this->request->getData());
            if ($this->Stocks->save($stock)) {
                $this->Flash->success(__('The stock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stock could not be saved. Please, try again.'));
        }
        $recipeDimensions = $this->Stocks->RecipeDimensions->find('list', ['limit' => 200]);
        $branches = $this->Stocks->Branches->find('list', ['limit' => 200]);
        $this->set(compact('stock', 'recipeDimensions', 'branches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stock = $this->Stocks->get($id);
        if ($this->Stocks->delete($stock)) {
            $this->Flash->success(__('The stock has been deleted.'));
        } else {
            $this->Flash->error(__('The stock could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

