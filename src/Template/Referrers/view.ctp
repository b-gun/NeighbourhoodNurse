<?php
// echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
// echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css');
// echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
// echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
echo $this->Html->css('viewpatient.css');
echo $this->element('navbar');
?>



<body>
  
<!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= h($referrer->business_name) ?>
                    <small><?= h($referrer->status) ?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
            <h3>Referrer info</h3>
            <p>
            Business Name:  <?= h($referrer->business_name) ?>
            <br>
            Email: <?= h($referrer->email) ?>
            <br>
            Address: 
            <?= h($referrer->address1) ?>
             <?= h($referrer->address2) ?>
             <?= h($referrer->suburb) ?>
              <?= h($referrer->state) ?>
              <?= h($referrer->postcode) ?>
              <?= h($referrer->country) ?>   
              <br>
            Contact Phone: <?=h($referrer->phone) ?>
            <br>
            Fax: <?= h($referrer->fax_phone) ?>
            <br>

            <br>
            <?php 
                  $urlEdit= array('controller' => 'Referrers','action' => 'edit',$referrer->id); 
                echo $this->Form->button('Edit Referrer', ['onclick' => "location.href='".$this->Url->build($urlEdit)."'"]); ?> 
    
              </p>  
            </div>

            <div class="col-md-4">
                 

            <?php 
                  $urlEdit= array('controller' => 'Refcontacts', 'action' => 'add', 'referrerid'=>$referrer->id); 
                echo $this->Form->button('Add a new Referrer Contact', ['onclick' => "location.href='".$this->Url->build($urlEdit)."'"]); 
                ?> 

            </div>

        </div>
        
        
<div class="row">
<div class="container">

          <div id="exTab2">

           <ul class="nav nav-tabs">
                <li class="active">
                <a href="#tab-1" data-toggle="tab">Related Patients</a>
                </li>
                <li>
                <a href="#tab-2" data-toggle="tab">Referrer Contact</a></li>
                <!-- <li>
                <a href="#tab-3" data-toggle="tab">Referrer Info</a></li> -->
        </ul>

    <div class="tab-content">

        <div id="tab-1" class="tab-pane active">
            <div class="col-lg-12">
        <?php if (!empty($referrer->patients)): ?>
            <table cellpadding="0" cellspacing="0">
              <tr>

            

                <th><?= __('First Name') ?></th>
                <th><?= __('Other Name') ?></th>
                <th><?= __('Last Name') ?></th>
                 <th><?= __('Status') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Date of birth') ?></th>
                <th><?= __('Gender') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Mobile Phone') ?></th>
<!--                 <th><?= __('Other Phone') ?></th>
                <th><?= __('Address1') ?></th>
                <th><?= __('Address2') ?></th>
                <th><?= __('Suburb') ?></th>
                <th><?= __('Postcode') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('Country') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>  -->
             <th class="actions"><?= __('Actions') ?></th> 
            </tr>
            <?php foreach ($referrer->patients as $patients): ?>
            <tr>

                
                <td><?= h($patients->first_name) ?></td>
                <td><?= h($patients->other_name) ?></td>
                <td><?= h($patients->last_name) ?></td>
                <td><?= h($patients->status) ?></td>
                <td><?= h($patients->email) ?></td>
                <td><?= h($patients->dateofbirth) ?></td>
                <td><?= h($patients->gender) ?></td>
                <td><?= h($patients->phone) ?></td>
                <td><?= h($patients->mobile_phone) ?></td>
             <!--   <td><?= h($patients->other_phone) ?></td>
                <td><?= h($patients->address1) ?></td>
                <td><?= h($patients->address2) ?></td>
                <td><?= h($patients->suburb) ?></td>
                <td><?= h($patients->postcode) ?></td>
                <td><?= h($patients->state) ?></td>
                <td><?= h($patients->country) ?></td>
                <td><?= h($patients->created) ?></td>
                <td><?= h($patients->modified) ?></td>    -->     
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Patients', 'action' => 'view', $patients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Patients', 'action' => 'edit', $patients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Patients', 'action' => 'delete', $patients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
          

            </div>
               
        </div>    
    
        <div class="tab-pane" id="tab-2" >
             <?php if (!empty($referrer->refcontacts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                
                
                <th><?= __('Job Title') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Other Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Mobile Phone') ?></th>
                <th><?= __('Other Phone') ?></th>
                
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($referrer->refcontacts as $refcontacts): ?>
            <tr>
                
           
                <td><?= h($refcontacts->type) ?></td>
                <td><?= h($refcontacts->status) ?></td>
                <td><?= h($refcontacts->first_name) ?></td>
                <td><?= h($refcontacts->other_name) ?></td>
                <td><?= h($refcontacts->last_name) ?></td>
                <td><?= h($refcontacts->email) ?></td>
                <td><?= h($refcontacts->phone) ?></td>
                <td><?= h($refcontacts->mobile_phone) ?></td>
                <td><?= h($refcontacts->other_phone) ?></td>
              
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Refcontacts', 'action' => 'edit', $refcontacts->id]) ?>
                   
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        
    
        </div>

      <!--   <div class="tab-pane" id="tab-3" >
         

        <div class="col-lg-12">
        
       
        </div>   -->

</div>
  
</div>

</div>
        <!-- /.row -->

<!-- <div class="referrers view large-9 medium-8 columns content">
    

    <h3><?= h($referrer->business_name) ?></h3>
    <h4><?= $this->Html->link(__('Edit Referrer'), ['action' => 'edit', $referrer->id])?></h4>

   <section style=";position:absolute; ">
    <table style="display: inline-block;">
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($referrer->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($referrer->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Business Name') ?></th>
            <td><?= h($referrer->business_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($referrer->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Address 1') ?></th>
            <td><?= h($referrer->address1) ?></td>
        </tr>
        <tr>
            <th><?= __('Address 2') ?></th>
            <td><?= h($referrer->address2) ?></td>
        </tr>
        <tr>
            <th><?= __('Suburb') ?></th>
            <td><?= h($referrer->suburb) ?></td>
        </tr>
        </table>
    <table style="display: inline-block;">
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($referrer->state) ?></td>
        </tr>

         <tr>
            <th><?= __('Postcode') ?></th>
            <td><?= h($referrer->postcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($referrer->country) ?></td>
        </tr>
       
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?=h($referrer->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Fax Phone') ?></th>
            <td><?= h($referrer->fax_phone) ?></td>
        </tr>
       
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($referrer->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Modified') ?></th>
            <td><?= h($referrer->modified) ?></td>
        </tr>
    </table>

    <div class="related">
        <h4><?= __('Related Patients') ?></h4>
        <?php if (!empty($referrer->patients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>

                <th><?= __('User Id') ?></th>


                <th><?= __('First Name') ?></th>
                <th><?= __('Other Name') ?></th>
                <th><?= __('Last Name') ?></th>
                 <th><?= __('Status') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Date of birth') ?></th>
                <th><?= __('Gender') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Mobile Phone') ?></th>
                <th><?= __('Other Phone') ?></th>
                <th><?= __('Address1') ?></th>
                <th><?= __('Address2') ?></th>
                <th><?= __('Suburb') ?></th>
                <th><?= __('Postcode') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('Country') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th> -->
                <!-- <th class="actions"><?= __('Actions') ?></th> 
            </tr>
            <?php foreach ($referrer->patients as $patients): ?>
            <tr>

                <td><?= h($patients->user_id) ?></td>


                <td><?= h($patients->first_name) ?></td>
                <td><?= h($patients->other_name) ?></td>
                <td><?= h($patients->last_name) ?></td>
                <td><?= h($patients->status) ?></td>
                <td><?= h($patients->email) ?></td>
                <td><?= h($patients->dateofbirth) ?></td>
                <td><?= h($patients->gender) ?></td>
                <td><?= h($patients->phone) ?></td>
                <td><?= h($patients->mobile_phone) ?></td>
               <td><?= h($patients->other_phone) ?></td>
                <td><?= h($patients->address1) ?></td>
                <td><?= h($patients->address2) ?></td>
                <td><?= h($patients->suburb) ?></td>
                <td><?= h($patients->postcode) ?></td>
                <td><?= h($patients->state) ?></td>
                <td><?= h($patients->country) ?></td>
                <td><?= h($patients->created) ?></td>
                <td><?= h($patients->modified) ?></td>                <!--  <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Patients', 'action' => 'view', $patients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Patients', 'action' => 'edit', $patients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Patients', 'action' => 'delete', $patients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Refcontacts') ?></h4>


        <?php if (!empty($referrer->refcontacts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Referrer Id') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Other Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Mobile Phone') ?></th>
                <th><?= __('Other Phone') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($referrer->refcontacts as $refcontacts): ?>
            <tr>
                <td><?= h($refcontacts->id) ?></td>
                <td><?= h($refcontacts->referrer_id) ?></td>
                <td><?= h($refcontacts->type) ?></td>
                <td><?= h($refcontacts->status) ?></td>
                <td><?= h($refcontacts->first_name) ?></td>
                <td><?= h($refcontacts->other_name) ?></td>
                <td><?= h($refcontacts->last_name) ?></td>
                <td><?= h($refcontacts->email) ?></td>
                <td><?= h($refcontacts->phone) ?></td>
                <td><?= h($refcontacts->mobile_phone) ?></td>
                <td><?= h($refcontacts->other_phone) ?></td>
                <td><?= h($refcontacts->created) ?></td>
                <td><?= h($refcontacts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Refcontacts', 'action' => 'view', $refcontacts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Refcontacts', 'action' => 'edit', $refcontacts->id]) ?>
                   
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    </section>
</div>-->
</body> 