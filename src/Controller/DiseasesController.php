<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Diseases Controller
 *
 * @property \App\Model\Table\DiseasesTable $Diseases
 */
class DiseasesController extends AppController
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
            'contain' => ['Categories']
        ];
        $diseases = $this->paginate($this->Diseases);

        $this->set(compact('diseases'));
        $this->set('_serialize', ['diseases']);
    }

    /**
     * View method
     *
     * @param string|null $id Disease id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('patients');
        $disease = $this->Diseases->get($id, [
            'contain' => ['Categories', 'Patients']
        ]);

        $this->set('disease', $disease);
        $this->set('_serialize', ['disease']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('patients');
        $disease = $this->Diseases->newEntity();
        if ($this->request->is('post')) {
            $disease = $this->Diseases->patchEntity($disease, $this->request->data);
            if ($this->Diseases->save($disease)) {
                $this->Flash->success(__('The disease has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The disease could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Diseases->Categories->find('list', ['limit' => 200]);
        $patients = $this->Diseases->Patients->find('list', ['limit' => 200]);
        $this->set(compact('disease', 'categories', 'patients'));
        $this->set('_serialize', ['disease']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Disease id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('patients');
        $disease = $this->Diseases->get($id, [
            'contain' => ['Patients']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disease = $this->Diseases->patchEntity($disease, $this->request->data);
            if ($this->Diseases->save($disease)) {
                $this->Flash->success(__('The disease has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The disease could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Diseases->Categories->find('list', ['limit' => 200]);
        $patients = $this->Diseases->Patients->find('list', ['limit' => 200]);
        $this->set(compact('disease', 'categories', 'patients'));
        $this->set('_serialize', ['disease']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Disease id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disease = $this->Diseases->get($id);
        if ($this->Diseases->delete($disease)) {
            $this->Flash->success(__('The disease has been deleted.'));
        } else {
            $this->Flash->error(__('The disease could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
