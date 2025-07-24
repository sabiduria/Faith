<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Offerings Controller
 *
 * @property \App\Model\Table\OfferingsTable $Offerings
 */
class OfferingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Offerings->find()->where(['Offerings.deleted' => 0])
            ->contain(['Services', 'Offeringstypes', 'Currencies']);
        $offerings = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('offerings'));
    }

    /**
     * View method
     *
     * @param string|null $id Offering id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $offering = $this->Offerings->get($id, contain: ['Services', 'Offeringstypes', 'Currencies']);
        $this->set(compact('offering'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $offering = $this->Offerings->newEmptyEntity();
        if ($this->request->is('post')) {
            $offering = $this->Offerings->patchEntity($offering, $this->request->getData());

            $offering->createdby = $session->read('Auth.Username');
            $offering->modifiedby = $session->read('Auth.Username');
            $offering->deleted = 0;

            if ($this->Offerings->save($offering)) {
                $this->Flash->success(__('The offering has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offering could not be saved. Please, try again.'));
        }
        $services = $this->Offerings->Services->find('list', limit: 200)->all();
        $offeringstypes = $this->Offerings->Offeringstypes->find('list', limit: 200)->all();
        $currencies = $this->Offerings->Currencies->find('list', limit: 200)->all();
        $this->set(compact('offering', 'services', 'offeringstypes', 'currencies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Offering id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $offering = $this->Offerings->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offering = $this->Offerings->patchEntity($offering, $this->request->getData());

            $offering->modifiedby = $session->read('Auth.Username');

            if ($this->Offerings->save($offering)) {
                $this->Flash->success(__('The offering has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offering could not be saved. Please, try again.'));
        }
        $services = $this->Offerings->Services->find('list', limit: 200)->all();
        $offeringstypes = $this->Offerings->Offeringstypes->find('list', limit: 200)->all();
        $currencies = $this->Offerings->Currencies->find('list', limit: 200)->all();
        $this->set(compact('offering', 'services', 'offeringstypes', 'currencies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Offering id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $offering = $this->Offerings->get($id);

        $offering->modifiedby = $session->read('Auth.Username');
        $offering->deleted = 1;

        if ($this->Offerings->save($offering)) {
            $this->Flash->success(__('The offering has been deleted.'));
        } else {
            $this->Flash->error(__('The offering could not be deleted. Please, try again.'));
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
        $offering = $this->Offerings->newEmptyEntity();
        if ($this->request->is('post')) {
            $offering = $this->Offerings->patchEntity($offering, $this->request->getData());

            $offering->createdby = $session->read('Auth.Username');
            $offering->modifiedby = $session->read('Auth.Username');
            $offering->deleted = 0;

            try{
                if ($this->Offerings->save($offering)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $offering->toArray()
                    ];
                }else {
                    $errors = $offering->getErrors();
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
