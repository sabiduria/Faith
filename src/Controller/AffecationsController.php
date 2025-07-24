<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Affecations Controller
 *
 * @property \App\Model\Table\AffecationsTable $Affecations
 */
class AffecationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Affecations->find()->where(['Affecations.deleted' => 0])
            ->contain(['Users', 'Churchs']);
        $affecations = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('affecations'));
    }

    /**
     * View method
     *
     * @param string|null $id Affecation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $affecation = $this->Affecations->get($id, contain: ['Users', 'Churchs']);
        $this->set(compact('affecation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $affecation = $this->Affecations->newEmptyEntity();
        if ($this->request->is('post')) {
            $affecation = $this->Affecations->patchEntity($affecation, $this->request->getData());

            $affecation->createdby = $session->read('Auth.Username');
            $affecation->modifiedby = $session->read('Auth.Username');
            $affecation->deleted = 0;

            if ($this->Affecations->save($affecation)) {
                $this->Flash->success(__('The affecation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The affecation could not be saved. Please, try again.'));
        }
        $users = $this->Affecations->Users->find('list', limit: 200)->all();
        $churchs = $this->Affecations->Churchs->find('list', limit: 200)->all();
        $this->set(compact('affecation', 'users', 'churchs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Affecation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $affecation = $this->Affecations->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $affecation = $this->Affecations->patchEntity($affecation, $this->request->getData());

            $affecation->modifiedby = $session->read('Auth.Username');

            if ($this->Affecations->save($affecation)) {
                $this->Flash->success(__('The affecation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The affecation could not be saved. Please, try again.'));
        }
        $users = $this->Affecations->Users->find('list', limit: 200)->all();
        $churchs = $this->Affecations->Churchs->find('list', limit: 200)->all();
        $this->set(compact('affecation', 'users', 'churchs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Affecation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $affecation = $this->Affecations->get($id);

        $affecation->modifiedby = $session->read('Auth.Username');
        $affecation->deleted = 1;

        if ($this->Affecations->save($affecation)) {
            $this->Flash->success(__('The affecation has been deleted.'));
        } else {
            $this->Flash->error(__('The affecation could not be deleted. Please, try again.'));
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
        $affecation = $this->Affecations->newEmptyEntity();
        if ($this->request->is('post')) {
            $affecation = $this->Affecations->patchEntity($affecation, $this->request->getData());

            $affecation->createdby = $session->read('Auth.Username');
            $affecation->modifiedby = $session->read('Auth.Username');
            $affecation->deleted = 0;

            try{
                if ($this->Affecations->save($affecation)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $affecation->toArray()
                    ];
                }else {
                    $errors = $affecation->getErrors();
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
