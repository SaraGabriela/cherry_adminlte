<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RecipeProductMeasures Controller
 *
 * @property \App\Model\Table\RecipeProductMeasuresTable $RecipeProductMeasures
 *
 * @method \App\Model\Entity\RecipeProductMeasure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecipeProductMeasuresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RawProducts', 'RawRecipes'],
        ];
        $recipeProductMeasures = $this->paginate($this->RecipeProductMeasures);

        $this->set(compact('recipeProductMeasures'));
    }

    /**
     * View method
     *
     * @param string|null $id Recipe Product Measure id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipeProductMeasure = $this->RecipeProductMeasures->get($id, [
            'contain' => ['RawProducts', 'RawRecipes'],
        ]);

        $this->set('recipeProductMeasure', $recipeProductMeasure);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recipeProductMeasure = $this->RecipeProductMeasures->newEmptyEntity();
        if ($this->request->is('post')) {
            $recipeProductMeasure = $this->RecipeProductMeasures->patchEntity($recipeProductMeasure, $this->request->getData());
            if ($this->RecipeProductMeasures->save($recipeProductMeasure)) {
                $this->Flash->success(__('The recipe product measure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe product measure could not be saved. Please, try again.'));
        }
        $rawProducts = $this->RecipeProductMeasures->RawProducts->find('list', ['limit' => 200]);
        $rawRecipes = $this->RecipeProductMeasures->RawRecipes->find('list', ['limit' => 200]);
        $this->set(compact('recipeProductMeasure', 'rawProducts', 'rawRecipes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recipe Product Measure id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recipeProductMeasure = $this->RecipeProductMeasures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipeProductMeasure = $this->RecipeProductMeasures->patchEntity($recipeProductMeasure, $this->request->getData());
            if ($this->RecipeProductMeasures->save($recipeProductMeasure)) {
                $this->Flash->success(__('The recipe product measure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe product measure could not be saved. Please, try again.'));
        }
        $rawProducts = $this->RecipeProductMeasures->RawProducts->find('list', ['limit' => 200]);
        $rawRecipes = $this->RecipeProductMeasures->RawRecipes->find('list', ['limit' => 200]);
        $this->set(compact('recipeProductMeasure', 'rawProducts', 'rawRecipes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipe Product Measure id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipeProductMeasure = $this->RecipeProductMeasures->get($id);
        if ($this->RecipeProductMeasures->delete($recipeProductMeasure)) {
            $this->Flash->success(__('The recipe product measure has been deleted.'));
        } else {
            $this->Flash->error(__('The recipe product measure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
