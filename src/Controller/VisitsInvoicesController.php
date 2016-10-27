<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisitsInvoices Controller
 *
 * @property \App\Model\Table\VisitsInvoicesTable $VisitsInvoices
 */
class VisitsInvoicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Visits', 'Invoices']
        ];
        $visitsInvoices = $this->paginate($this->VisitsInvoices);

        $this->set(compact('visitsInvoices'));
        $this->set('_serialize', ['visitsInvoices']);
    }

    /**
     * View method
     *
     * @param string|null $id Visits Invoice id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visitsInvoice = $this->VisitsInvoices->get($id, [
            'contain' => ['Visits', 'Invoices']
        ]);

        $this->set('visitsInvoice', $visitsInvoice);
        $this->set('_serialize', ['visitsInvoice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visitsInvoice = $this->VisitsInvoices->newEntity();
        if ($this->request->is('post')) {
            $visitsInvoice = $this->VisitsInvoices->patchEntity($visitsInvoice, $this->request->data);
            if ($this->VisitsInvoices->save($visitsInvoice)) {
                $this->Flash->success(__('The visits invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visits invoice could not be saved. Please, try again.'));
            }
        }
        $visits = $this->VisitsInvoices->Visits->find('list', ['limit' => 200]);
        $invoices = $this->VisitsInvoices->Invoices->find('list', ['limit' => 200]);
        $this->set(compact('visitsInvoice', 'visits', 'invoices'));
        $this->set('_serialize', ['visitsInvoice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visits Invoice id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visitsInvoice = $this->VisitsInvoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visitsInvoice = $this->VisitsInvoices->patchEntity($visitsInvoice, $this->request->data);
            if ($this->VisitsInvoices->save($visitsInvoice)) {
                $this->Flash->success(__('The visits invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visits invoice could not be saved. Please, try again.'));
            }
        }
        $visits = $this->VisitsInvoices->Visits->find('list', ['limit' => 200]);
        $invoices = $this->VisitsInvoices->Invoices->find('list', ['limit' => 200]);
        $this->set(compact('visitsInvoice', 'visits', 'invoices'));
        $this->set('_serialize', ['visitsInvoice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visits Invoice id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visitsInvoice = $this->VisitsInvoices->get($id);
        if ($this->VisitsInvoices->delete($visitsInvoice)) {
            $this->Flash->success(__('The visits invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The visits invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
