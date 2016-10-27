<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Patient;
use Cake\Event\Event;
use Cake\Database\Type;
use Cake\Error\Debugger;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 */
class PatientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('patients');
        $this->set('patients', $this->Patients->find('all', ['contain' => ['Referrers']]));
    }

    /**
     * View method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Invoices');
        $this->loadModel('Visits');
        $this->viewBuilder()->layout('patients');
        $patient = $this->Patients->get($id, [
            'contain' => ['Referrers', 'Visits','Nokrelationships', 'Diseases']
             //'contain' => ['Users', 'Referrers', 'Visits'] This displays patient details only if they have a user associated with it

        ]);
        $invoices = $this->Patients->Visits->Invoices->find('all');
        $invoices = $invoices->toArray();
        $invoiceID = [];
        foreach($invoices as $invoice){
                array_push($invoiceID, $invoice->id);
        }
        //dump($invoiceID);
        $visits = $this->Patients->Visits->find('all', ['conditions'=> ['patient_id'=>$id]]);
        $visits = $visits->toArray();
        //dump($invoices);
        //dump($visits);
        $this->set(compact('invoices', $invoices));
        $this->set(compact('visits', $visits));
        //dump($patient);
        $patientID= $this->request->session()->read('Patients.id');
        $this->set('patient', $patient);
        $this->set('_serialize', ['patient']);
    }

    public function viewConfirm($id = null, $visitsList = []) {

        $visitsList = explode(",", $visitsList);
        $this->viewBuilder()->layout('patients');
        $visit = $this->Patients->Visits->find('list', ['conditions'=>['patient_id'=>$id, 'id IN'=>$visitsList]]);
        $refcontact=$this->Patients->Referrers->find()->contain(['Refcontacts']);
        $patient = $this->Patients->get($id, [
            'contain' => ['Referrers', 'Visits','Nokrelationships']
            //'contain' => ['Users', 'Referrers', 'Visits'] This displays patient details only if they have a user associated with it
        ]);
        //dump($visit);
        $this->set(compact('visitsList', $visitsList));
        $this->set(compact('refcontact', $refcontact));
        $this->set('visit', $visit);
        $this->set('patient', $patient);
        $this->set('_serialize', ['patient', 'visit', 'visitsList']);
    }

    public function updateVisits($visitsList = []){

        $visitsList = explode(",", $visitsList);
        foreach ($visitsList as $visitID) {
            $visits = TableRegistry::get('Visits');
            $query = $visits->query();
            $query->update()
                ->set(['status' => 'Invoiced'])
                ->where(['id' => $visitID])
                ->execute();
        }
    }

    public function updateTotalPrice($visitsList = []){




    }

    public function viewPdf($id = null, $visitsList = [])
    {
       $visitsList = explode(",", $visitsList);
        unset($visitsList[0]);
       $visit = $this->Patients->Visits->find('list', ['conditions'=>['patient_id'=>$id, 'id IN'=>$visitsList]]);
        $patient = $this->Patients->get($id, [
            'contain' => ['Referrers', 'Visits','Nokrelationships']
            //'contain' => ['Users', 'Referrers', 'Visits'] This displays patient details only if they have a user associated with it
        ]);
        $this->set(compact('visitsList', $visitsList));
        $this->set('visit', $visit);
        $this->set('patient', $patient);
        $this->set('_serialize', ['patient', 'visit', 'visitsList']);
    }

//    public function search($id=null) {
//        // have to rewrite search function
//        $this->viewBuilder()->layout('patients');
//        $this->paginate = ['contain' => ['Patients'], 'order' => ['Patients.first_name' => 'asc']];
//
//        if (!isset( $this->request->data['Search']))
//        {
//            $patient = $this->Patients->get($id, ['contain' => ['Referrers', 'Visits']]);
//            $this->set('patient', $patient);
//            $this->set('_serialize', ['patients']);
//        }
//        else
//        {
//        }
//        // if (!isset($this->request->data['Search']))
//        // {
//        //     $patients = $this->paginate($this->Patients);
//        //     $this->set('patients', $this->paginate($this->Patients));
//        //     $this->set('_serialize', ['patients']);
//        // }
//        // else
//        // {
//        //     $patients = $this->Patients->find('all')->where(['first_name LIKE' => "%".$this->request->data['name']."%"])->contain(['Patients']);
//        //     $this->set('patients', $this->paginate($this->Patients));
//        //     $this->set('_serialize', ['patients']);
//        // }
//        $this->view = 'index';
//    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {

        $this->viewBuilder()->layout('patients');
        $this->viewBuilder()->layout('patients');
        $patient = $this->Patients->newEntity();
        if ($this->request->is('post')) {
            $patient = $this->Patients->patchEntity($patient, $this->request->data, ['associated'=>'Diseases']);


            if ($this->Patients->save($patient)) {
                $this->Flash->success(__('The patient has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {

                $this->Flash->error(__('The patient could not be saved. Please, try again.'));
            }
        }
        $users = $this->Patients->Users->find('list', ['limit' => 200]);
        $referrers = $this->Patients->Referrers->find('list');
        $diseases = $this->Patients->Diseases->find('list');
        $diseases = $diseases->toArray();
        $categories = $this->Patients->Diseases->Categories->find('list');
        $categories = $categories->toArray();
        $this->set(compact('patient', 'users', 'referrers', 'diseases', 'categories'));
        $this->set('_serialize', ['patient']);
        // Code to list illnesses for dropdown
        //$illness = $this->Disease->find('list');
        //$this->set(compact('illness'));
    }



    /**
     * Edit method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('patients');
        $patient = $this->Patients->get($id, [
            'contain' => ['Referrers', 'Visits', 'Diseases']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $patient = $this->Patients->patchEntity($patient, $this->request->data);
            if ($this->Patients->save($patient)) {
                $this->Flash->success(__('The patient has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The patient could not be saved. Please, try again.'));
            }
        }
        $users = $this->Patients->Users->find('list', ['limit' => 200]);
        $referrers = $this->Patients->Referrers->find('list');
        $diseases = $this->Patients->Diseases->find('list');
        $diseases = $diseases->toArray();
        $categories = $this->Patients->Diseases->Categories->find('list');
        $categories = $categories->toArray();
        $this->set(compact('patient', 'users', 'referrers', 'diseases', 'categories'));
        $this->set('_serialize', ['patient']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Patient id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patient = $this->Patients->get($id);
        if ($this->Patients->delete($patient)) {
            $this->Flash->success(__('The patient has been deleted.'));
        } else {
            $this->Flash->error(__('The patient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
