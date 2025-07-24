<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Offeringstypes Controller
 *
 * @property \App\Model\Table\OfferingstypesTable $Offeringstypes
 */
class OfferingstypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Offeringstypes->find()->where(['Offeringstypes.deleted' => 0]);
        $offeringstypes = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('offeringstypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Offeringstype id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $offeringstype = $this->Offeringstypes->get($id, contain: ['Offerings']);
        $this->set(compact('offeringstype'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $offeringstype = $this->Offeringstypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $offeringstype = $this->Offeringstypes->patchEntity($offeringstype, $this->request->getData());

            $offeringstype->createdby = $session->read('Auth.Username');
            $offeringstype->modifiedby = $session->read('Auth.Username');
            $offeringstype->deleted = 0;

            if ($this->Offeringstypes->save($offeringstype)) {
                $this->Flash->success(__('The offeringstype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offeringstype could not be saved. Please, try again.'));
        }
        $this->set(compact('offeringstype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Offeringstype id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $offeringstype = $this->Offeringstypes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offeringstype = $this->Offeringstypes->patchEntity($offeringstype, $this->request->getData());

            $offeringstype->modifiedby = $session->read('Auth.Username');

            if ($this->Offeringstypes->save($offeringstype)) {
                $this->Flash->success(__('The offeringstype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offeringstype could not be saved. Please, try again.'));
        }
        $this->set(compact('offeringstype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Offeringstype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $offeringstype = $this->Offeringstypes->get($id);

        $offeringstype->modifiedby = $session->read('Auth.Username');
        $offeringstype->deleted = 1;

        if ($this->Offeringstypes->save($offeringstype)) {
            $this->Flash->success(__('The offeringstype has been deleted.'));
        } else {
            $this->Flash->error(__('The offeringstype could not be deleted. Please, try again.'));
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
        $offeringstype = $this->Offeringstypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $offeringstype = $this->Offeringstypes->patchEntity($offeringstype, $this->request->getData());

            $offeringstype->createdby = $session->read('Auth.Username');
            $offeringstype->modifiedby = $session->read('Auth.Username');
            $offeringstype->deleted = 0;

            try{
                if ($this->Offeringstypes->save($offeringstype)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $offeringstype->toArray()
                    ];
                }else {
                    $errors = $offeringstype->getErrors();
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
