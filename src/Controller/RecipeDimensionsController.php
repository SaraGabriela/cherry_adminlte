<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RecipeDimensions Controller
 *
 * @property \App\Model\Table\RecipeDimensionsTable $RecipeDimensions
 *
 * @method \App\Model\Entity\RecipeDimension[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecipeDimensionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dimensions', 'Recipes'],
        ];
        $recipeDimensions = $this->paginate($this->RecipeDimensions);

        $this->set(compact('recipeDimensions'));
    }

    /**
     * View method
     *
     * @param string|null $id Recipe Dimension id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipeDimension = $this->RecipeDimensions->get($id, [
            'contain' => ['Dimensions', 'Recipes', 'ProductionRecipes'],
        ]);

        $this->set('recipeDimension', $recipeDimension);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $recipeDimension = $this->RecipeDimensions->newEmptyEntity();
        if ($this->request->is('post')) {

            $recipeDimension = $this->RecipeDimensions->patchEntity($recipeDimension, $this->request->getData());
    
       

            if ($result= $this->RecipeDimensions->save($recipeDimension)) {
                $recipeDimension = $this->RecipeDimensions->get($result->recipe_dimensions_id, [
                    'contain' => ['Recipes', 'Dimensions'],
                ]);
                    $recipeDimension = $this->RecipeDimensions->patchEntity($recipeDimension, $this->request->getData());
                    $recipeDimension->description=$recipeDimension->recipe->comercial_name." x ".$recipeDimension->dimension->description;
                    if ($this->RecipeDimensions->save($recipeDimension)) {
                        $this->Flash->success(__('The recipe dimension has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The recipe dimension could not be saved. Please, try again.'));
                
                $this->Flash->success(__('The recipe dimension has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe dimension could not be saved. Please, try again.'));
        }
        $dimensions = $this->RecipeDimensions->Dimensions->find('list', ['limit' => 200]);
        $recipes = $this->RecipeDimensions->Recipes->find('list', ['limit' => 200]);
        print($dimensions);
        print($recipes);
        $this->set(compact('recipeDimension', 'dimensions', 'recipes'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Recipe Dimension id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recipeDimension = $this->RecipeDimensions->get($id, [
            'contain' => ['Recipes', 'Dimensions'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recipeDimension = $this->RecipeDimensions->patchEntity($recipeDimension, $this->request->getData());
            $recipeDimension->description=$recipeDimension->recipe->comercial_name." x ".$recipeDimension->dimension->description;

            if ($this->RecipeDimensions->save($recipeDimension)) {
                $this->Flash->success(__('The recipe dimension has been saved.'));
                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe dimension could not be saved. Please, try again.'));
        }
        $dimensions = $this->RecipeDimensions->Dimensions->find('list', ['limit' => 200]);
        $recipes = $this->RecipeDimensions->Recipes->find('list', ['limit' => 200]);
        $this->set(compact('recipeDimension', 'dimensions', 'recipes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recipe Dimension id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recipeDimension = $this->RecipeDimensions->get($id);
        if ($this->RecipeDimensions->delete($recipeDimension)) {
            $this->Flash->success(__('The recipe dimension has been deleted.'));
        } else {
            $this->Flash->error(__('The recipe dimension could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}