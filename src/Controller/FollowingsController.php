<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Followings Controller
 *
 * @property \App\Model\Table\FollowingsTable $Followings
 */
class FollowingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Followings->find()->where(['Followings.deleted' => 0])
            ->contain(['Members']);
        $followings = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('followings'));
    }

    /**
     * View method
     *
     * @param string|null $id Following id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $following = $this->Followings->get($id, contain: ['Members']);
        $this->set(compact('following'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $following = $this->Followings->newEmptyEntity();
        if ($this->request->is('post')) {
            $following = $this->Followings->patchEntity($following, $this->request->getData());

            $following->createdby = $session->read('Auth.Username');
            $following->modifiedby = $session->read('Auth.Username');
            $following->deleted = 0;

            if ($this->Followings->save($following)) {
                $this->Flash->success(__('The following has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The following could not be saved. Please, try again.'));
        }
        $members = $this->Followings->Members->find('list', limit: 200)->all();
        $this->set(compact('following', 'members'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Following id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $following = $this->Followings->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $following = $this->Followings->patchEntity($following, $this->request->getData());

            $following->modifiedby = $session->read('Auth.Username');

            if ($this->Followings->save($following)) {
                $this->Flash->success(__('The following has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The following could not be saved. Please, try again.'));
        }
        $members = $this->Followings->Members->find('list', limit: 200)->all();
        $this->set(compact('following', 'members'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Following id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $following = $this->Followings->get($id);

        $following->modifiedby = $session->read('Auth.Username');
        $following->deleted = 1;

        if ($this->Followings->save($following)) {
            $this->Flash->success(__('The following has been deleted.'));
        } else {
            $this->Flash->error(__('The following could not be deleted. Please, try again.'));
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
        $following = $this->Followings->newEmptyEntity();
        if ($this->request->is('post')) {
            $following = $this->Followings->patchEntity($following, $this->request->getData());

            $following->createdby = $session->read('Auth.Username');
            $following->modifiedby = $session->read('Auth.Username');
            $following->deleted = 0;

            try{
                if ($this->Followings->save($following)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $following->toArray()
                    ];
                }else {
                    $errors = $following->getErrors();
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
