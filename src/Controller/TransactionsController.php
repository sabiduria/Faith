<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 */
class TransactionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Transactions->find()->where(['Transactions.deleted' => 0])
            ->contain(['TransactionTypes', 'Churchs', 'Currencies']);
        $transactions = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('transactions'));
    }

    /**
     * View method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transaction = $this->Transactions->get($id, contain: ['TransactionTypes', 'Churchs', 'Currencies']);
        $this->set(compact('transaction'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $transaction = $this->Transactions->newEmptyEntity();
        if ($this->request->is('post')) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());

            $transaction->createdby = $session->read('Auth.Username');
            $transaction->modifiedby = $session->read('Auth.Username');
            $transaction->deleted = 0;

            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $transactionTypes = $this->Transactions->TransactionTypes->find('list', limit: 200)->all();
        $churchs = $this->Transactions->Churchs->find('list', limit: 200)->all();
        $currencies = $this->Transactions->Currencies->find('list', limit: 200)->all();
        $this->set(compact('transaction', 'transactionTypes', 'churchs', 'currencies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $transaction = $this->Transactions->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());

            $transaction->modifiedby = $session->read('Auth.Username');

            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
        }
        $transactionTypes = $this->Transactions->TransactionTypes->find('list', limit: 200)->all();
        $churchs = $this->Transactions->Churchs->find('list', limit: 200)->all();
        $currencies = $this->Transactions->Currencies->find('list', limit: 200)->all();
        $this->set(compact('transaction', 'transactionTypes', 'churchs', 'currencies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $transaction = $this->Transactions->get($id);

        $transaction->modifiedby = $session->read('Auth.Username');
        $transaction->deleted = 1;

        if ($this->Transactions->save($transaction)) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
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
        $transaction = $this->Transactions->newEmptyEntity();
        if ($this->request->is('post')) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());

            $transaction->createdby = $session->read('Auth.Username');
            $transaction->modifiedby = $session->read('Auth.Username');
            $transaction->deleted = 0;

            try{
                if ($this->Transactions->save($transaction)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $transaction->toArray()
                    ];
                }else {
                    $errors = $transaction->getErrors();
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
