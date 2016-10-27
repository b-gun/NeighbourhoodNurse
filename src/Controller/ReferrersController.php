<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Referrers Controller
 *
 * @property \App\Model\Table\ReferrersTable $Referrers
 */
class ReferrersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('patients');
        $referrers = $this->paginate($this->Referrers);

        $this->set(compact('referrers'));
        $this->set('_serialize', ['referrers']);
    }

    /**
     * View method
     *
     * @param string|null $id Referrer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('patients');
        $referrer = $this->Referrers->get($id, [
            'contain' => ['Patients', 'Refcontacts']
        ]);

        $this->set('referrer', $referrer);
        $this->set('_serialize', ['referrer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('patients');
        $referrer = $this->Referrers->newEntity();
        if ($this->request->is('post')) {
            $referrer = $this->Referrers->patchEntity($referrer, $this->request->data);
            $this->Referrers->save($referrer);
            return $this->redirect(['action' => 'index']);
            } 
        $this->set(compact('referrer'));
        $this->set('_serialize', ['referrer']);
    }

    // This function will add the referrer with validation messages.
    // public function add()
    // {
    //     $referrer = $this->Referrers->newEntity();
    //     if ($this->request->is('post')) {
    //         $referrer = $this->Referrers->patchEntity($referrer, $this->request->data);
    //         if ($this->Referrers->save($referrer)) {
    //             $this->Flash->success(__('The referrer has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         } else {
    //             $this->Flash->error(__('The referrer could not be saved. Please, try again.'));
    //         }
    //     }
    //     $this->set(compact('referrer'));
    //     $this->set('_serialize', ['referrer']);
    // }

    /**
     * Edit method
     *
     * @param string|null $id Referrer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('patients');
        $referrer = $this->Referrers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $referrer = $this->Referrers->patchEntity($referrer, $this->request->data);
            if ($this->Referrers->save($referrer)) {
                $this->Flash->success(__('The referrer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The referrer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('referrer'));
        $this->set('_serialize', ['referrer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Referrer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $referrer = $this->Referrers->get($id);
        if ($this->Referrers->delete($referrer)) {
            $this->Flash->success(__('The referrer has been deleted.'));
        } else {
            $this->Flash->error(__('The referrer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
