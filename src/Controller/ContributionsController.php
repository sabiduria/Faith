<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Contributions Controller
 *
 * @property \App\Model\Table\ContributionsTable $Contributions
 */
class ContributionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Contributions->find()->where(['Contributions.deleted' => 0])
            ->contain(['Projects']);
        $contributions = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('contributions'));
    }

    /**
     * View method
     *
     * @param string|null $id Contribution id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contribution = $this->Contributions->get($id, contain: ['Projects']);
        $this->set(compact('contribution'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $contribution = $this->Contributions->newEmptyEntity();
        if ($this->request->is('post')) {
            $contribution = $this->Contributions->patchEntity($contribution, $this->request->getData());

            $contribution->createdby = $session->read('Auth.Username');
            $contribution->modifiedby = $session->read('Auth.Username');
            $contribution->deleted = 0;

            if ($this->Contributions->save($contribution)) {
                $this->Flash->success(__('The contribution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contribution could not be saved. Please, try again.'));
        }
        $projects = $this->Contributions->Projects->find('list', limit: 200)->all();
        $this->set(compact('contribution', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contribution id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $contribution = $this->Contributions->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contribution = $this->Contributions->patchEntity($contribution, $this->request->getData());

            $contribution->modifiedby = $session->read('Auth.Username');

            if ($this->Contributions->save($contribution)) {
                $this->Flash->success(__('The contribution has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contribution could not be saved. Please, try again.'));
        }
        $projects = $this->Contributions->Projects->find('list', limit: 200)->all();
        $this->set(compact('contribution', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contribution id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $contribution = $this->Contributions->get($id);

        $contribution->modifiedby = $session->read('Auth.Username');
        $contribution->deleted = 1;

        if ($this->Contributions->save($contribution)) {
            $this->Flash->success(__('The contribution has been deleted.'));
        } else {
            $this->Flash->error(__('The contribution could not be deleted. Please, try again.'));
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
        $contribution = $this->Contributions->newEmptyEntity();
        if ($this->request->is('post')) {
            $contribution = $this->Contributions->patchEntity($contribution, $this->request->getData());

            $contribution->createdby = $session->read('Auth.Username');
            $contribution->modifiedby = $session->read('Auth.Username');
            $contribution->deleted = 0;

            try{
                if ($this->Contributions->save($contribution)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $contribution->toArray()
                    ];
                }else {
                    $errors = $contribution->getErrors();
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
