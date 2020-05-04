<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DecorationDimensions Controller
 *
 * @property \App\Model\Table\DecorationDimensionsTable $DecorationDimensions
 *
 * @method \App\Model\Entity\DecorationDimension[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DecorationDimensionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Decorations', 'Dimensions'],
        ];
        $decorationDimensions = $this->paginate($this->DecorationDimensions);

        $this->set(compact('decorationDimensions'));
    }

    /**
     * View method
     *
     * @param string|null $id Decoration Dimension id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $decorationDimension = $this->DecorationDimensions->get($id, [
            'contain' => ['Decorations', 'Dimensions', 'DecorationProductMeasures'],
        ]);

        $this->set('decorationDimension', $decorationDimension);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $decorationDimension = $this->DecorationDimensions->newEmptyEntity();
        if ($this->request->is('post')) {
            $decorationDimension = $this->DecorationDimensions->patchEntity($decorationDimension, $this->request->getData());
            if ($this->DecorationDimensions->save($decorationDimension)) {
                $this->Flash->success(__('The decoration dimension has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The decoration dimension could not be saved. Please, try again.'));
        }
        $decorations = $this->DecorationDimensions->Decorations->find('list', ['limit' => 200]);
        $dimensions = $this->DecorationDimensions->Dimensions->find('list', ['limit' => 200]);
        $this->set(compact('decorationDimension', 'decorations', 'dimensions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Decoration Dimension id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $decorationDimension = $this->DecorationDimensions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $decorationDimension = $this->DecorationDimensions->patchEntity($decorationDimension, $this->request->getData());
            if ($this->DecorationDimensions->save($decorationDimension)) {
                $this->Flash->success(__('The decoration dimension has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The decoration dimension could not be saved. Please, try again.'));
        }
        $decorations = $this->DecorationDimensions->Decorations->find('list', ['limit' => 200]);
        $dimensions = $this->DecorationDimensions->Dimensions->find('list', ['limit' => 200]);
        $this->set(compact('decorationDimension', 'decorations', 'dimensions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Decoration Dimension id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $decorationDimension = $this->DecorationDimensions->get($id);
        if ($this->DecorationDimensions->delete($decorationDimension)) {
            $this->Flash->success(__('The decoration dimension has been deleted.'));
        } else {
            $this->Flash->error(__('The decoration dimension could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
