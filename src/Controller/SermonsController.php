<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Sermons Controller
 *
 * @property \App\Model\Table\SermonsTable $Sermons
 */
class SermonsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Sermons->find()->where(['Sermons.deleted' => 0])
            ->contain(['Topics', 'Churchs']);
        $sermons = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('sermons'));
    }

    /**
     * View method
     *
     * @param string|null $id Sermon id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sermon = $this->Sermons->get($id, contain: ['Topics', 'Churchs', 'Comments', 'Likes', 'Medias', 'Verses']);
        $this->set(compact('sermon'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $sermon = $this->Sermons->newEmptyEntity();
        if ($this->request->is('post')) {
            $sermon = $this->Sermons->patchEntity($sermon, $this->request->getData());

            $sermon->createdby = $session->read('Auth.Username');
            $sermon->modifiedby = $session->read('Auth.Username');
            $sermon->deleted = 0;

            if ($this->Sermons->save($sermon)) {
                $this->Flash->success(__('The sermon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sermon could not be saved. Please, try again.'));
        }
        $topics = $this->Sermons->Topics->find('list', limit: 200)->all();
        $churchs = $this->Sermons->Churchs->find('list', limit: 200)->all();
        $this->set(compact('sermon', 'topics', 'churchs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sermon id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $sermon = $this->Sermons->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sermon = $this->Sermons->patchEntity($sermon, $this->request->getData());

            $sermon->modifiedby = $session->read('Auth.Username');

            if ($this->Sermons->save($sermon)) {
                $this->Flash->success(__('The sermon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sermon could not be saved. Please, try again.'));
        }
        $topics = $this->Sermons->Topics->find('list', limit: 200)->all();
        $churchs = $this->Sermons->Churchs->find('list', limit: 200)->all();
        $this->set(compact('sermon', 'topics', 'churchs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sermon id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $sermon = $this->Sermons->get($id);

        $sermon->modifiedby = $session->read('Auth.Username');
        $sermon->deleted = 1;

        if ($this->Sermons->save($sermon)) {
            $this->Flash->success(__('The sermon has been deleted.'));
        } else {
            $this->Flash->error(__('The sermon could not be deleted. Please, try again.'));
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
        $sermon = $this->Sermons->newEmptyEntity();
        if ($this->request->is('post')) {
            $sermon = $this->Sermons->patchEntity($sermon, $this->request->getData());

            $sermon->createdby = $session->read('Auth.Username');
            $sermon->modifiedby = $session->read('Auth.Username');
            $sermon->deleted = 0;

            try{
                if ($this->Sermons->save($sermon)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $sermon->toArray()
                    ];
                }else {
                    $errors = $sermon->getErrors();
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
