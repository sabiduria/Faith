<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Likes Controller
 *
 * @property \App\Model\Table\LikesTable $Likes
 */
class LikesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Likes->find()->where(['Likes.deleted' => 0])
            ->contain(['Sermons', 'Members']);
        $likes = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('likes'));
    }

    /**
     * View method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $like = $this->Likes->get($id, contain: ['Sermons', 'Members']);
        $this->set(compact('like'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $like = $this->Likes->newEmptyEntity();
        if ($this->request->is('post')) {
            $like = $this->Likes->patchEntity($like, $this->request->getData());

            $like->createdby = $session->read('Auth.Username');
            $like->modifiedby = $session->read('Auth.Username');
            $like->deleted = 0;

            if ($this->Likes->save($like)) {
                $this->Flash->success(__('The like has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The like could not be saved. Please, try again.'));
        }
        $sermons = $this->Likes->Sermons->find('list', limit: 200)->all();
        $members = $this->Likes->Members->find('list', limit: 200)->all();
        $this->set(compact('like', 'sermons', 'members'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $like = $this->Likes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $like = $this->Likes->patchEntity($like, $this->request->getData());

            $like->modifiedby = $session->read('Auth.Username');

            if ($this->Likes->save($like)) {
                $this->Flash->success(__('The like has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The like could not be saved. Please, try again.'));
        }
        $sermons = $this->Likes->Sermons->find('list', limit: 200)->all();
        $members = $this->Likes->Members->find('list', limit: 200)->all();
        $this->set(compact('like', 'sermons', 'members'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $like = $this->Likes->get($id);

        $like->modifiedby = $session->read('Auth.Username');
        $like->deleted = 1;

        if ($this->Likes->save($like)) {
            $this->Flash->success(__('The like has been deleted.'));
        } else {
            $this->Flash->error(__('The like could not be deleted. Please, try again.'));
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
        $like = $this->Likes->newEmptyEntity();
        if ($this->request->is('post')) {
            $like = $this->Likes->patchEntity($like, $this->request->getData());

            $like->createdby = $session->read('Auth.Username');
            $like->modifiedby = $session->read('Auth.Username');
            $like->deleted = 0;

            try{
                if ($this->Likes->save($like)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $like->toArray()
                    ];
                }else {
                    $errors = $like->getErrors();
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
