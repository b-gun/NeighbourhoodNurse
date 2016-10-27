<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Refcontacts Controller
 *
 * @property \App\Model\Table\RefcontactsTable $Refcontacts
 */
class RefcontactsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Referrers']
        ];
        $refcontacts = $this->paginate($this->Refcontacts);

        $this->set(compact('refcontacts'));
        $this->set('_serialize', ['refcontacts']);
    }

    /**
     * View method
     *
     * @param string|null $id Refcontact id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refcontact = $this->Refcontacts->get($id, [
            'contain' => ['Referrers']
        ]);

        $this->set('refcontact', $refcontact);
        $this->set('_serialize', ['refcontact']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $this->viewBuilder()->layout('patients');
        $refcontact = $this->Refcontacts->newEntity();
        if ($this->request->is('post')) {
            $refcontact = $this->Refcontacts->patchEntity($refcontact, $this->request->data);
            if ($this->Refcontacts->save($refcontact)) {
                $this->Flash->success(__('The refcontact has been saved.'));

                return $this->redirect(['controller' => 'Referrers', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The refcontact could not be saved. Please, try again.'));
            }
        }
        $referrers = $this->Refcontacts->Referrers->find('list', ['limit' => 200]);
        $this->set(compact('refcontact', 'referrers'));
        $this->set('_serialize', ['refcontact']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Refcontact id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
         $this->viewBuilder()->layout('patients');
        $refcontact = $this->Refcontacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refcontact = $this->Refcontacts->patchEntity($refcontact, $this->request->data);
            if ($this->Refcontacts->save($refcontact)) {
                $this->Flash->success(__('The refcontact has been saved.'));

                return $this->redirect(['controller' => 'Referrers', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The refcontact could not be saved. Please, try again.'));
            }
        }
        $referrers = $this->Refcontacts->Referrers->find('list', ['limit' => 200]);
        $this->set(compact('refcontact', 'referrers'));
        $this->set('_serialize', ['refcontact']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Refcontact id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refcontact = $this->Refcontacts->get($id);
        if ($this->Refcontacts->delete($refcontact)) {
            $this->Flash->success(__('The refcontact has been deleted.'));
        } else {
            $this->Flash->error(__('The refcontact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
