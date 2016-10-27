<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Nokrelationships Controller
 *
 * @property \App\Model\Table\NokrelationshipsTable $Nokrelationships
 */
class NokrelationshipsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('patients');
        $this->paginate = [
            'contain' => ['Patients']
        ];
        $nokrelationships = $this->paginate($this->Nokrelationships);

        $this->set(compact('nokrelationships'));
        $this->set('_serialize', ['nokrelationships']);
    }

    /**
     * View method
     *
     * @param string|null $id Nokrelationship id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('patients');
        $nokrelationship = $this->Nokrelationships->get($id, [
            'contain' => ['Patients']
        ]);
        $this->set('nokrelationship', $nokrelationship);
        $this->set('_serialize', ['nokrelationship']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
     
       $this->viewBuilder()->layout('patients');
        $nokrelationship = $this->Nokrelationships->newEntity();
        if ($this->request->is('post')) {
            $nokrelationship = $this->Nokrelationships->patchEntity($nokrelationship, $this->request->data);
            if ($this->Nokrelationships->save($nokrelationship)) {
                $this->Flash->success(__('The nokrelationship has been saved.'));
                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The nokrelationship could not be saved. Please, try again.'));
            }
        }
        $patients = $this->Nokrelationships->Patients->find('list', ['limit' => 200]);
    
        $this->set(compact('nokrelationship', 'patients'));
        $this->set('_serialize', ['nokrelationship']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nokrelationship id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('patients');
        $nokrelationship = $this->Nokrelationships->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nokrelationship = $this->Nokrelationships->patchEntity($nokrelationship, $this->request->data);
            if ($this->Nokrelationships->save($nokrelationship)) {
                $this->Flash->success(__('The nokrelationship has been saved.'));
                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The nokrelationship could not be saved. Please, try again.'));
            }
        }
        // $session = $this->request->session();
        // $patients = $session->read('Patients.id');

        $patients = $this->Nokrelationships->Patients->find('list', ['limit' => 200]);
        $this->set(compact('nokrelationship', 'patients'));
        $this->set('_serialize', ['nokrelationship']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Nokrelationship id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nokrelationship = $this->Nokrelationships->get($id);
        if ($this->Nokrelationships->delete($nokrelationship)) {
            $this->Flash->success(__('The nokrelationship has been deleted.'));
        } else {
            $this->Flash->error(__('The nokrelationship could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
    }
}
