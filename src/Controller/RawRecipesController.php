<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RawRecipes Controller
 *
 * @property \App\Model\Table\RawRecipesTable $RawRecipes
 *
 * @method \App\Model\Entity\RawRecipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RawRecipesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $rawRecipes = $this->paginate($this->RawRecipes);

        $this->set(compact('rawRecipes'));
    }

    /**
     * View method
     *
     * @param string|null $id Raw Recipe id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rawRecipe = $this->RawRecipes->get($id, [
            'contain' => ['RecipeProductMeasures'],
        ]);

        $this->set('rawRecipe', $rawRecipe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rawRecipe = $this->RawRecipes->newEmptyEntity();
        if ($this->request->is('post')) {
            $rawRecipe = $this->RawRecipes->patchEntity($rawRecipe, $this->request->getData());
            if ($this->RawRecipes->save($rawRecipe)) {
                $this->Flash->success(__('The raw recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw recipe could not be saved. Please, try again.'));
        }
        $this->set(compact('rawRecipe'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Raw Recipe id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rawRecipe = $this->RawRecipes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rawRecipe = $this->RawRecipes->patchEntity($rawRecipe, $this->request->getData());
            if ($this->RawRecipes->save($rawRecipe)) {
                $this->Flash->success(__('The raw recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw recipe could not be saved. Please, try again.'));
        }
        $this->set(compact('rawRecipe'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Raw Recipe id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rawRecipe = $this->RawRecipes->get($id);
        if ($this->RawRecipes->delete($rawRecipe)) {
            $this->Flash->success(__('The raw recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The raw recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
