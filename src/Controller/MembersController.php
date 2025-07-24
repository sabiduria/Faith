<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 */
class MembersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Members->find()->where(['Members.deleted' => 0])
            ->contain(['Churchs', 'Roles', 'Departments', 'Memberships']);
        $members = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('members'));
    }

    /**
     * View method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $member = $this->Members->get($id, contain: ['Churchs', 'Roles', 'Departments', 'Memberships', 'Attendances', 'Followings', 'Likes']);
        $this->set(compact('member'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $member = $this->Members->newEmptyEntity();
        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->getData());

            $member->createdby = $session->read('Auth.Username');
            $member->modifiedby = $session->read('Auth.Username');
            $member->deleted = 0;

            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The member could not be saved. Please, try again.'));
        }
        $churchs = $this->Members->Churchs->find('list', limit: 200)->all();
        $roles = $this->Members->Roles->find('list', limit: 200)->all();
        $departments = $this->Members->Departments->find('list', limit: 200)->all();
        $memberships = $this->Members->Memberships->find('list', limit: 200)->all();
        $this->set(compact('member', 'churchs', 'roles', 'departments', 'memberships'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $member = $this->Members->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $member = $this->Members->patchEntity($member, $this->request->getData());

            $member->modifiedby = $session->read('Auth.Username');

            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The member could not be saved. Please, try again.'));
        }
        $churchs = $this->Members->Churchs->find('list', limit: 200)->all();
        $roles = $this->Members->Roles->find('list', limit: 200)->all();
        $departments = $this->Members->Departments->find('list', limit: 200)->all();
        $memberships = $this->Members->Memberships->find('list', limit: 200)->all();
        $this->set(compact('member', 'churchs', 'roles', 'departments', 'memberships'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $member = $this->Members->get($id);

        $member->modifiedby = $session->read('Auth.Username');
        $member->deleted = 1;

        if ($this->Members->save($member)) {
            $this->Flash->success(__('The member has been deleted.'));
        } else {
            $this->Flash->error(__('The member could not be deleted. Please, try again.'));
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
        $member = $this->Members->newEmptyEntity();
        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->getData());

            $member->createdby = $session->read('Auth.Username');
            $member->modifiedby = $session->read('Auth.Username');
            $member->deleted = 0;

            try{
                if ($this->Members->save($member)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $member->toArray()
                    ];
                }else {
                    $errors = $member->getErrors();
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
