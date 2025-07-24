<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Participations Controller
 *
 * @property \App\Model\Table\ParticipationsTable $Participations
 */
class ParticipationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Participations->find()->where(['Participations.deleted' => 0])
            ->contain(['Services']);
        $participations = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('participations'));
    }

    /**
     * View method
     *
     * @param string|null $id Participation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participation = $this->Participations->get($id, contain: ['Services']);
        $this->set(compact('participation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $participation = $this->Participations->newEmptyEntity();
        if ($this->request->is('post')) {
            $participation = $this->Participations->patchEntity($participation, $this->request->getData());

            $participation->createdby = $session->read('Auth.Username');
            $participation->modifiedby = $session->read('Auth.Username');
            $participation->deleted = 0;

            if ($this->Participations->save($participation)) {
                $this->Flash->success(__('The participation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The participation could not be saved. Please, try again.'));
        }
        $services = $this->Participations->Services->find('list', limit: 200)->all();
        $this->set(compact('participation', 'services'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Participation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $participation = $this->Participations->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participation = $this->Participations->patchEntity($participation, $this->request->getData());

            $participation->modifiedby = $session->read('Auth.Username');

            if ($this->Participations->save($participation)) {
                $this->Flash->success(__('The participation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The participation could not be saved. Please, try again.'));
        }
        $services = $this->Participations->Services->find('list', limit: 200)->all();
        $this->set(compact('participation', 'services'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Participation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $participation = $this->Participations->get($id);

        $participation->modifiedby = $session->read('Auth.Username');
        $participation->deleted = 1;

        if ($this->Participations->save($participation)) {
            $this->Flash->success(__('The participation has been deleted.'));
        } else {
            $this->Flash->error(__('The participation could not be deleted. Please, try again.'));
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
        $participation = $this->Participations->newEmptyEntity();
        if ($this->request->is('post')) {
            $participation = $this->Participations->patchEntity($participation, $this->request->getData());

            $participation->createdby = $session->read('Auth.Username');
            $participation->modifiedby = $session->read('Auth.Username');
            $participation->deleted = 0;

            try{
                if ($this->Participations->save($participation)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $participation->toArray()
                    ];
                }else {
                    $errors = $participation->getErrors();
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
