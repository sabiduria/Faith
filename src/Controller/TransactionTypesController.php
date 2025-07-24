<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * TransactionTypes Controller
 *
 * @property \App\Model\Table\TransactionTypesTable $TransactionTypes
 */
class TransactionTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->TransactionTypes->find()->where(['TransactionTypes.deleted' => 0]);
        $transactionTypes = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('transactionTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Transaction Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transactionType = $this->TransactionTypes->get($id, contain: ['Transactions']);
        $this->set(compact('transactionType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $transactionType = $this->TransactionTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $transactionType = $this->TransactionTypes->patchEntity($transactionType, $this->request->getData());

            $transactionType->createdby = $session->read('Auth.Username');
            $transactionType->modifiedby = $session->read('Auth.Username');
            $transactionType->deleted = 0;

            if ($this->TransactionTypes->save($transactionType)) {
                $this->Flash->success(__('The transaction type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction type could not be saved. Please, try again.'));
        }
        $this->set(compact('transactionType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $transactionType = $this->TransactionTypes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transactionType = $this->TransactionTypes->patchEntity($transactionType, $this->request->getData());

            $transactionType->modifiedby = $session->read('Auth.Username');

            if ($this->TransactionTypes->save($transactionType)) {
                $this->Flash->success(__('The transaction type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction type could not be saved. Please, try again.'));
        }
        $this->set(compact('transactionType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $transactionType = $this->TransactionTypes->get($id);

        $transactionType->modifiedby = $session->read('Auth.Username');
        $transactionType->deleted = 1;

        if ($this->TransactionTypes->save($transactionType)) {
            $this->Flash->success(__('The transaction type has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction type could not be deleted. Please, try again.'));
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
        $transactionType = $this->TransactionTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $transactionType = $this->TransactionTypes->patchEntity($transactionType, $this->request->getData());

            $transactionType->createdby = $session->read('Auth.Username');
            $transactionType->modifiedby = $session->read('Auth.Username');
            $transactionType->deleted = 0;

            try{
                if ($this->TransactionTypes->save($transactionType)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $transactionType->toArray()
                    ];
                }else {
                    $errors = $transactionType->getErrors();
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
