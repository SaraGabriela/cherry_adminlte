<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Recipes Controller
 *
 * @property \App\Model\Table\RecipesTable $Recipes
 *
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecipesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dimensions', 'Raws', 'RawFillings', 'Decorations', 'Cakes'],
        ];
        $recipes = $this->paginate($this->Recipes);

        $this->set(compact('recipes'));
    }

    /**
     * View method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipe = $this->Recipes->get($id, [
            'contain' => ['Dimensions', 'Raws', 'RawFillings', 'Decorations', 'Cakes'],
        ]);

        $this->set('recipe', $recipe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recipe = $this->Recipes->newEmptyEntity();
        if ($this->request->is('post')) {
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->getData());
            if ($this->Recipes->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
        $dimensions = $this->Recipes->Dimensions->find('list', ['limit' => 200]);
        $raws = $this->Recipes->Raws->find('list', ['limit' => 200]);
        $rawFillings = $this->Recipes->RawFillings->find('list', ['limit' => 200]);
        $decorations = $this->Recipes->Decorations->find('list', ['limit' => 200]);
        $cakes = $this->Recipes->Cakes->find('list', ['limit' => 200]);
        $this->set(compact('recipe', 'dimensions', 'raws', 'rawFillings', 'decorations', 'cakes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recipe = $this->Recipes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipe = $this->Recipes->patchEntity($recipe, $this->request->getData());
            if ($this->Recipes->save($recipe)) {
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
        $dimensions = $this->Recipes->Dimensions->find('list', ['limit' => 200]);
        $raws = $this->Recipes->Raws->find('list', ['limit' => 200]);
        $rawFillings = $this->Recipes->RawFillings->find('list', ['limit' => 200]);
        $decorations = $this->Recipes->Decorations->find('list', ['limit' => 200]);
        $cakes = $this->Recipes->Cakes->find('list', ['limit' => 200]);
        $this->set(compact('recipe', 'dimensions', 'raws', 'rawFillings', 'decorations', 'cakes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipe id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipe = $this->Recipes->get($id);
        if ($this->Recipes->delete($recipe)) {
            $this->Flash->success(__('The recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
