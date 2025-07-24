<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * ChurchGroups Controller
 *
 * @property \App\Model\Table\ChurchGroupsTable $ChurchGroups
 */
class ChurchGroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ChurchGroups->find()->where(['ChurchGroups.deleted' => 0]);
        $churchGroups = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('churchGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Church Group id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $churchGroup = $this->ChurchGroups->get($id, contain: ['GroupMembers']);
        $this->set(compact('churchGroup'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $churchGroup = $this->ChurchGroups->newEmptyEntity();
        if ($this->request->is('post')) {
            $churchGroup = $this->ChurchGroups->patchEntity($churchGroup, $this->request->getData());

            $churchGroup->createdby = $session->read('Auth.Username');
            $churchGroup->modifiedby = $session->read('Auth.Username');
            $churchGroup->deleted = 0;

            if ($this->ChurchGroups->save($churchGroup)) {
                $this->Flash->success(__('The church group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The church group could not be saved. Please, try again.'));
        }
        $this->set(compact('churchGroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Church Group id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $churchGroup = $this->ChurchGroups->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $churchGroup = $this->ChurchGroups->patchEntity($churchGroup, $this->request->getData());

            $churchGroup->modifiedby = $session->read('Auth.Username');

            if ($this->ChurchGroups->save($churchGroup)) {
                $this->Flash->success(__('The church group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The church group could not be saved. Please, try again.'));
        }
        $this->set(compact('churchGroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Church Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $churchGroup = $this->ChurchGroups->get($id);

        $churchGroup->modifiedby = $session->read('Auth.Username');
        $churchGroup->deleted = 1;

        if ($this->ChurchGroups->save($churchGroup)) {
            $this->Flash->success(__('The church group has been deleted.'));
        } else {
            $this->Flash->error(__('The church group could not be deleted. Please, try again.'));
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
        $churchGroup = $this->ChurchGroups->newEmptyEntity();
        if ($this->request->is('post')) {
            $churchGroup = $this->ChurchGroups->patchEntity($churchGroup, $this->request->getData());

            $churchGroup->createdby = $session->read('Auth.Username');
            $churchGroup->modifiedby = $session->read('Auth.Username');
            $churchGroup->deleted = 0;

            try{
                if ($this->ChurchGroups->save($churchGroup)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $churchGroup->toArray()
                    ];
                }else {
                    $errors = $churchGroup->getErrors();
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
