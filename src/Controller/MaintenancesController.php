<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Maintenances Controller
 *
 * @property \App\Model\Table\MaintenancesTable $Maintenances
 */
class MaintenancesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Maintenances->find()->where(['Maintenances.deleted' => 0])
            ->contain(['Equipments']);
        $maintenances = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('maintenances'));
    }

    /**
     * View method
     *
     * @param string|null $id Maintenance id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $maintenance = $this->Maintenances->get($id, contain: ['Equipments']);
        $this->set(compact('maintenance'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $maintenance = $this->Maintenances->newEmptyEntity();
        if ($this->request->is('post')) {
            $maintenance = $this->Maintenances->patchEntity($maintenance, $this->request->getData());

            $maintenance->createdby = $session->read('Auth.Username');
            $maintenance->modifiedby = $session->read('Auth.Username');
            $maintenance->deleted = 0;

            if ($this->Maintenances->save($maintenance)) {
                $this->Flash->success(__('The maintenance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The maintenance could not be saved. Please, try again.'));
        }
        $equipments = $this->Maintenances->Equipments->find('list', limit: 200)->all();
        $this->set(compact('maintenance', 'equipments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Maintenance id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $maintenance = $this->Maintenances->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $maintenance = $this->Maintenances->patchEntity($maintenance, $this->request->getData());

            $maintenance->modifiedby = $session->read('Auth.Username');

            if ($this->Maintenances->save($maintenance)) {
                $this->Flash->success(__('The maintenance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The maintenance could not be saved. Please, try again.'));
        }
        $equipments = $this->Maintenances->Equipments->find('list', limit: 200)->all();
        $this->set(compact('maintenance', 'equipments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Maintenance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $maintenance = $this->Maintenances->get($id);

        $maintenance->modifiedby = $session->read('Auth.Username');
        $maintenance->deleted = 1;

        if ($this->Maintenances->save($maintenance)) {
            $this->Flash->success(__('The maintenance has been deleted.'));
        } else {
            $this->Flash->error(__('The maintenance could not be deleted. Please, try again.'));
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
        $maintenance = $this->Maintenances->newEmptyEntity();
        if ($this->request->is('post')) {
            $maintenance = $this->Maintenances->patchEntity($maintenance, $this->request->getData());

            $maintenance->createdby = $session->read('Auth.Username');
            $maintenance->modifiedby = $session->read('Auth.Username');
            $maintenance->deleted = 0;

            try{
                if ($this->Maintenances->save($maintenance)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $maintenance->toArray()
                    ];
                }else {
                    $errors = $maintenance->getErrors();
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
