<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Chronos\Chronos;
use Cake\I18n\Time;
use Cake\Error\Debugger;


/**
 * Visits Controller
 *
 * @property \App\Model\Table\VisitsTable $Visits
 */
class VisitsController extends AppController
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
            'contain' => ['Patients'],
            'order' => [
                'Visits.date' => 'desc',
                'Visits.start_time' => 'desc'
            ]
        ];
        $visits = $this->paginate($this->Visits);

        $this->set(compact('visits'));
        $this->set('_serialize', ['visits']);
    }

    public function receipt($id=null){
        // Have added new code (Aiden)
        //$this->render('receipt');
        $receipt = $this->Visits->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('receipt', $receipt);
        $this->set('_serialize', ['receipt']);
        $minutes = null;
        $seconds = null;
        $startTime = $receipt->start_time;
        $startTime = $startTime->i18nFormat('H:m');
        $startTime = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "$1:$2:00", $startTime);
        sscanf($startTime, "%d:%d:%d", $hours, $minutes, $seconds);
        $startInMinutes = $hours * 60 + $minutes;
        $endTime = $receipt->end_time;
        $endTime = $endTime->i18nFormat('H:m');
        $endTime = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "$1:$2:00", $endTime);
        sscanf($endTime, "%d:%d:%d", $hours, $minutes, $seconds);
        $endInMinutes = $hours * 60 + $minutes;

        //echo $startInMinutes;
        //echo $endInMinutes;
        //echo $startTime;
        //echo $endTime;
        $difference = $endInMinutes-$startInMinutes;

        $this->set('difference', $difference);


    }

    /**
     * View method
     *
     * @param string|null $id Visit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $this->viewBuilder()->layout('patients'); //Change name of 'patients'
        $visit = $this->Visits->get($id, [
            'contain' => ['Patients']
        ]);
        $minutes = null;
        $seconds = null;
        $startTime = $visit->start_time;
        $startTime = $startTime->i18nFormat('H:m');
        $startTime = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "$1:$2:00", $startTime);
        sscanf($startTime, "%d:%d:%d", $hours, $minutes, $seconds);
        $startInMinutes = $hours * 60 + $minutes;
        $endTime = $visit->end_time;
        $endTime = $endTime->i18nFormat('H:m');
        $endTime = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "$1:$2:00", $endTime);
        sscanf($endTime, "%d:%d:%d", $hours, $minutes, $seconds);
        $endInMinutes = $hours * 60 + $minutes;
        //echo $startInMinutes;
        //echo $endInMinutes;
        //echo $startTime;
        //echo $endTime;
        $difference = $endInMinutes-$startInMinutes;
        $visit->duration = $difference;
        $this->set('difference', $difference);

        $this->set('visit', $visit);
        $this->set('_serialize', ['visit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('patients');
        $visit = $this->Visits->newEntity();
        if ($this->request->is('post')) {
            $visit = $this->Visits->patchEntity($visit, $this->request->data);
            if ($this->Visits->save($visit)) {
                return $this->redirect(['action' => 'index']);

            } else {
                $this->Flash->error(__('The visit could not be saved. Please, try again.'));
            }
        }
        $patients = $this->Visits->Patients->find('list', ['limit' => 200]);
        $this->set(compact('visit', 'patients'));
        $this->set('_serialize', ['visit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->referer();
        //dump($session);
        //dump($numType);
        $this->viewBuilder()->layout('patients');
        $visit = $this->Visits->get($id, [
            'contain' => []
        ]);
        $minutes = null;
        $seconds = null;
        $startTime = $visit->start_time;
        $startTime = $startTime->i18nFormat('H:m');
        $startTime = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "$1:$2:00", $startTime);
        sscanf($startTime, "%d:%d:%d", $hours, $minutes, $seconds);
        $startInMinutes = $hours * 60 + $minutes;
        $endTime = $visit->end_time;
        $endTime = $endTime->i18nFormat('H:m');
        $endTime = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "$1:$2:00", $endTime);
        sscanf($endTime, "%d:%d:%d", $hours, $minutes, $seconds);
        $endInMinutes = $hours * 60 + $minutes;
        //echo $startInMinutes;
        //echo $endInMinutes;
        //echo $startTime;
        //echo $endTime;
        $difference = $endInMinutes-$startInMinutes;
        $visit->duration = $difference;
        $this->set('difference', $difference);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visit = $this->Visits->patchEntity($visit, $this->request->data);
            if ($this->Visits->save($visit)) {
                $this->Flash->success(__('The visit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The visit could not be saved. Please, try again.'));

            }
        }
        $patients = $this->Visits->Patients->find('list', ['limit' => 200]);
        $this->set(compact('visit', 'patients'));
        $this->set('_serialize', ['visit']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Visit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visit = $this->Visits->get($id);
        if ($this->Visits->delete($visit)) {
            $this->Flash->success(__('The visit has been deleted.'));
        } else {
            $this->Flash->error(__('The visit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    function findOwnedBy(Query $query, array $options)
    {
        $user = $options['visit'];
        return $query->where(['visit_id' => $user->id]);
    }

    function viewPdf($id=null)
    {
 	   $this->viewBuilder()->layout('visits');
        // This only brings back 1 visit!
        $visits = $this->Visits->get($id, [
            'contain' => ['Patients']
        ]);
        //dump($visits);
        $this->set('visits', $visits);
        $this->set('_serialize', ['visits']);
    }
}
