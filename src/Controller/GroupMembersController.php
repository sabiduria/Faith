<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * GroupMembers Controller
 *
 * @property \App\Model\Table\GroupMembersTable $GroupMembers
 */
class GroupMembersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->GroupMembers->find()->where(['GroupMembers.deleted' => 0])
            ->contain(['ChurchGroups', 'Churchs']);
        $groupMembers = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('groupMembers'));
    }

    /**
     * View method
     *
     * @param string|null $id Group Member id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $groupMember = $this->GroupMembers->get($id, contain: ['ChurchGroups', 'Churchs']);
        $this->set(compact('groupMember'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $groupMember = $this->GroupMembers->newEmptyEntity();
        if ($this->request->is('post')) {
            $groupMember = $this->GroupMembers->patchEntity($groupMember, $this->request->getData());

            $groupMember->createdby = $session->read('Auth.Username');
            $groupMember->modifiedby = $session->read('Auth.Username');
            $groupMember->deleted = 0;

            if ($this->GroupMembers->save($groupMember)) {
                $this->Flash->success(__('The group member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group member could not be saved. Please, try again.'));
        }
        $churchGroups = $this->GroupMembers->ChurchGroups->find('list', limit: 200)->all();
        $churchs = $this->GroupMembers->Churchs->find('list', limit: 200)->all();
        $this->set(compact('groupMember', 'churchGroups', 'churchs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Group Member id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $groupMember = $this->GroupMembers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $groupMember = $this->GroupMembers->patchEntity($groupMember, $this->request->getData());

            $groupMember->modifiedby = $session->read('Auth.Username');

            if ($this->GroupMembers->save($groupMember)) {
                $this->Flash->success(__('The group member has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group member could not be saved. Please, try again.'));
        }
        $churchGroups = $this->GroupMembers->ChurchGroups->find('list', limit: 200)->all();
        $churchs = $this->GroupMembers->Churchs->find('list', limit: 200)->all();
        $this->set(compact('groupMember', 'churchGroups', 'churchs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Group Member id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $groupMember = $this->GroupMembers->get($id);

        $groupMember->modifiedby = $session->read('Auth.Username');
        $groupMember->deleted = 1;

        if ($this->GroupMembers->save($groupMember)) {
            $this->Flash->success(__('The group member has been deleted.'));
        } else {
            $this->Flash->error(__('The group member could not be deleted. Please, try again.'));
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
        $groupMember = $this->GroupMembers->newEmptyEntity();
        if ($this->request->is('post')) {
            $groupMember = $this->GroupMembers->patchEntity($groupMember, $this->request->getData());

            $groupMember->createdby = $session->read('Auth.Username');
            $groupMember->modifiedby = $session->read('Auth.Username');
            $groupMember->deleted = 0;

            try{
                if ($this->GroupMembers->save($groupMember)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $groupMember->toArray()
                    ];
                }else {
                    $errors = $groupMember->getErrors();
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
