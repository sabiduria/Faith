<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Denominations Controller
 *
 * @property \App\Model\Table\DenominationsTable $Denominations
 */
class DenominationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Denominations->find()->where(['Denominations.deleted' => 0]);
        $denominations = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('denominations'));
    }

    /**
     * View method
     *
     * @param string|null $id Denomination id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $denomination = $this->Denominations->get($id, contain: ['Churchs']);
        $this->set(compact('denomination'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $denomination = $this->Denominations->newEmptyEntity();
        if ($this->request->is('post')) {
            $denomination = $this->Denominations->patchEntity($denomination, $this->request->getData());

            $denomination->createdby = $session->read('Auth.Username');
            $denomination->modifiedby = $session->read('Auth.Username');
            $denomination->deleted = 0;

            if ($this->Denominations->save($denomination)) {
                $this->Flash->success(__('The denomination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The denomination could not be saved. Please, try again.'));
        }
        $this->set(compact('denomination'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Denomination id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $denomination = $this->Denominations->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $denomination = $this->Denominations->patchEntity($denomination, $this->request->getData());

            $denomination->modifiedby = $session->read('Auth.Username');

            if ($this->Denominations->save($denomination)) {
                $this->Flash->success(__('The denomination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The denomination could not be saved. Please, try again.'));
        }
        $this->set(compact('denomination'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Denomination id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $denomination = $this->Denominations->get($id);

        $denomination->modifiedby = $session->read('Auth.Username');
        $denomination->deleted = 1;

        if ($this->Denominations->save($denomination)) {
            $this->Flash->success(__('The denomination has been deleted.'));
        } else {
            $this->Flash->error(__('The denomination could not be deleted. Please, try again.'));
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
        $denomination = $this->Denominations->newEmptyEntity();
        if ($this->request->is('post')) {
            $denomination = $this->Denominations->patchEntity($denomination, $this->request->getData());

            $denomination->createdby = $session->read('Auth.Username');
            $denomination->modifiedby = $session->read('Auth.Username');
            $denomination->deleted = 0;

            try{
                if ($this->Denominations->save($denomination)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $denomination->toArray()
                    ];
                }else {
                    $errors = $denomination->getErrors();
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
