<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Churchs Controller
 *
 * @property \App\Model\Table\ChurchsTable $Churchs
 */
class ChurchsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Churchs->find()->where(['Churchs.deleted' => 0])
            ->contain(['Denominations']);
        $churchs = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('churchs'));
    }

    /**
     * View method
     *
     * @param string|null $id Church id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $church = $this->Churchs->get($id, contain: ['Denominations', 'Affecations', 'Equipments', 'GroupMembers', 'Members', 'Sermons', 'Services', 'Transactions']);
        $this->set(compact('church'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $church = $this->Churchs->newEmptyEntity();
        if ($this->request->is('post')) {
            $church = $this->Churchs->patchEntity($church, $this->request->getData());

            $church->createdby = $session->read('Auth.Username');
            $church->modifiedby = $session->read('Auth.Username');
            $church->deleted = 0;

            if ($this->Churchs->save($church)) {
                $this->Flash->success(__('The church has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The church could not be saved. Please, try again.'));
        }
        $denominations = $this->Churchs->Denominations->find('list', limit: 200)->all();
        $this->set(compact('church', 'denominations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Church id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $church = $this->Churchs->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $church = $this->Churchs->patchEntity($church, $this->request->getData());

            $church->modifiedby = $session->read('Auth.Username');

            if ($this->Churchs->save($church)) {
                $this->Flash->success(__('The church has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The church could not be saved. Please, try again.'));
        }
        $denominations = $this->Churchs->Denominations->find('list', limit: 200)->all();
        $this->set(compact('church', 'denominations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Church id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $church = $this->Churchs->get($id);

        $church->modifiedby = $session->read('Auth.Username');
        $church->deleted = 1;

        if ($this->Churchs->save($church)) {
            $this->Flash->success(__('The church has been deleted.'));
        } else {
            $this->Flash->error(__('The church could not be deleted. Please, try again.'));
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
        $church = $this->Churchs->newEmptyEntity();
        if ($this->request->is('post')) {
            $church = $this->Churchs->patchEntity($church, $this->request->getData());

            $church->createdby = $session->read('Auth.Username');
            $church->modifiedby = $session->read('Auth.Username');
            $church->deleted = 0;

            try{
                if ($this->Churchs->save($church)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $church->toArray()
                    ];
                }else {
                    $errors = $church->getErrors();
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
