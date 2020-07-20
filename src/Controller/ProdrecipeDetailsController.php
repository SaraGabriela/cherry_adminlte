<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProdrecipeDetails Controller
 *
 * @property \App\Model\Table\ProdrecipeDetailsTable $ProdrecipeDetails
 *
 * @method \App\Model\Entity\ProdrecipeDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdrecipeDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ProductionRecipes'],
        ];
        $prodrecipeDetails = $this->paginate($this->ProdrecipeDetails);

        $this->set(compact('prodrecipeDetails'));
    }
    public function setPhase($id = null){
        $prodrecipeDetail = $this->ProdrecipeDetails->get($id);
        if($prodrecipeDetail->phase === 'crudo'){
            $prodrecipeDetail->phase = "crudo-relleno";
            $this->ProdrecipeDetails->save($prodrecipeDetail);
            return $this->redirect(['action' => '../Productions/crudo-relleno']);
        }else if($prodrecipeDetail->phase === 'crudo-relleno'){
            $prodrecipeDetail->phase = "decorado";
            $this->ProdrecipeDetails->save($prodrecipeDetail);
            return $this->redirect(['action' => '../Productions/decorado']);
        }
        $prodrecipeDetail->phase = "terminado";
        $this->ProdrecipeDetails->save($prodrecipeDetail);
        return $this->redirect(['action' => '../Productions/decorado']);
    }
    /** 
     * View method
     * 
     * @param string|null $id Prodrecipe Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prodrecipeDetail = $this->ProdrecipeDetails->get($id, [
            'contain' => ['ProductionRecipes', 'Transformations'],
        ]);

        $this->set('prodrecipeDetail', $prodrecipeDetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prodrecipeDetail = $this->ProdrecipeDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $prodrecipeDetail = $this->ProdrecipeDetails->patchEntity($prodrecipeDetail, $this->request->getData());
            if ($this->ProdrecipeDetails->save($prodrecipeDetail)) {
                $this->Flash->success(__('The prodrecipe detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prodrecipe detail could not be saved. Please, try again.'));
        }
        $productionRecipes = $this->ProdrecipeDetails->ProductionRecipes->find('list', ['limit' => 200]);
        $this->set(compact('prodrecipeDetail', 'productionRecipes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prodrecipe Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prodrecipeDetail = $this->ProdrecipeDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prodrecipeDetail = $this->ProdrecipeDetails->patchEntity($prodrecipeDetail, $this->request->getData());
            if ($this->ProdrecipeDetails->save($prodrecipeDetail)) {
                $this->Flash->success(__('The prodrecipe detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prodrecipe detail could not be saved. Please, try again.'));
        }
        $productionRecipes = $this->ProdrecipeDetails->ProductionRecipes->find('list', ['limit' => 200]);
        $this->set(compact('prodrecipeDetail', 'productionRecipes'));
    }

    /**
     * Delete method 
     *
     * @param string|null $id Prodrecipe Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prodrecipeDetail = $this->ProdrecipeDetails->get($id);
        if ($this->ProdrecipeDetails->delete($prodrecipeDetail)) {
            $this->Flash->success(__('The prodrecipe detail has been deleted.'));
        } else {
            $this->Flash->error(__('The prodrecipe detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

