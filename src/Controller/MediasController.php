<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;

/**
 * Medias Controller
 *
 * @property \App\Model\Table\MediasTable $Medias
 */
class MediasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Medias->find()->where(['Medias.deleted' => 0])
            ->contain(['Sermons']);
        $medias = $this->paginate($query, ['limit' => 10000, 'maxLimit' => 10000]);

        $this->set(compact('medias'));
    }

    /**
     * View method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $media = $this->Medias->get($id, contain: ['Sermons']);
        $this->set(compact('media'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $media = $this->Medias->newEmptyEntity();
        if ($this->request->is('post')) {
            $media = $this->Medias->patchEntity($media, $this->request->getData());

            $media->createdby = $session->read('Auth.Username');
            $media->modifiedby = $session->read('Auth.Username');
            $media->deleted = 0;

            if ($this->Medias->save($media)) {
                $this->Flash->success(__('The media has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The media could not be saved. Please, try again.'));
        }
        $sermons = $this->Medias->Sermons->find('list', limit: 200)->all();
        $this->set(compact('media', 'sermons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $media = $this->Medias->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $media = $this->Medias->patchEntity($media, $this->request->getData());

            $media->modifiedby = $session->read('Auth.Username');

            if ($this->Medias->save($media)) {
                $this->Flash->success(__('The media has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The media could not be saved. Please, try again.'));
        }
        $sermons = $this->Medias->Sermons->find('list', limit: 200)->all();
        $this->set(compact('media', 'sermons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Media id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session = $this->request->getSession();
        $this->request->allowMethod(['post', 'delete']);
        $media = $this->Medias->get($id);

        $media->modifiedby = $session->read('Auth.Username');
        $media->deleted = 1;

        if ($this->Medias->save($media)) {
            $this->Flash->success(__('The media has been deleted.'));
        } else {
            $this->Flash->error(__('The media could not be deleted. Please, try again.'));
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
        $media = $this->Medias->newEmptyEntity();
        if ($this->request->is('post')) {
            $media = $this->Medias->patchEntity($media, $this->request->getData());

            $media->createdby = $session->read('Auth.Username');
            $media->modifiedby = $session->read('Auth.Username');
            $media->deleted = 0;

            try{
                if ($this->Medias->save($media)) {
                    $response = [
                        'message' => 'Data saved successfully!',
                        'data' => $media->toArray()
                    ];
                }else {
                    $errors = $media->getErrors();
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
