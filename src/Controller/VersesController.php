<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Verses Controller
 *
 * @property \App\Model\Table\VersesTable $Verses
 */
class VersesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Verses->find()->where(['Verses.deleted' => 0])
            ->contain(['Sermons']);
        $verses = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('verses'));
    }

    /**
     * View method
     *
     * @param string|null $id Verse id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $verse = $this->Verses->get($id, contain: ['Sermons']);
        $this->set(compact('verse'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $verse = $this->Verses->newEmptyEntity();
        if ($this->request->is('post')) {
            $verse = $this->Verses->patchEntity($verse, $this->request->getData());

            $verse->createdby = $session->read('Auth.Username');
            $verse->modifiedby = $session->read('Auth.Username');
            $verse->deleted = 0;

            if ($this->Verses->save($verse)) {
                $this->Flash->success(__('The verse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The verse could not be saved. Please, try again.'));
        }
        $sermons = $this->Verses->Sermons->find('list', limit: 200)->all();
        $this->set(compact('verse', 'sermons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Verse id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $verse = $this->Verses->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $verse = $this->Verses->patchEntity($verse, $this->request->getData());

            $verse->modifiedby = $session->read('Auth.Username');

            if ($this->Verses->save($verse)) {
                $this->Flash->success(__('The verse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The verse could not be saved. Please, try again.'));
        }
        $sermons = $this->Verses->Sermons->find('list', limit: 200)->all();
        $this->set(compact('verse', 'sermons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Verse id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $verse = $this->Verses->get($id);

        $verse->modifiedby = $session->read('Auth.Username');
        $verse->deleted = 1;

        if ($this->Verses->save($verse)) {
            $this->Flash->success(__('The verse has been deleted.'));
        } else {
            $this->Flash->error(__('The verse could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Insert method
     */
    public function insert()
    {
        $this->request->allowMethod(['ajax', 'post']);
        $session = $this->request->getSession();
        $verse = $this->Verses->newEmptyEntity();
        if ($this->request->is('post')) {
            $verse = $this->Verses->patchEntity($verse, $this->request->getData());

            $verse->createdby = $session->read('Auth.Username');
            $verse->modifiedby = $session->read('Auth.Username');
            $verse->deleted = 0;

            try{
                if ($this->Verses->save($verse)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $verse->toArray()
                    ];
                }else {
                    $errors = $verse->getErrors();
                    $response = ['message' => 'Failed to save data.', 'errors' => $errors];
                }
            }
            catch (Exception $e) {
                $response = ['message' => 'An error occurred: ' . $e->getMessage()];
            }
            // Set the response type to JSON
            $this->response = $this->response->withType('application/json');

            // Serialize the response to JSON
            $this->set(compact('response'));
            $this->set('_serialize', ['response']); // Automatically serializes the response variable as JSON

            // Ensure the response is sent as JSON (no need for a view)
            return $this->response->withStringBody(json_encode($response));
        }
    }
}
