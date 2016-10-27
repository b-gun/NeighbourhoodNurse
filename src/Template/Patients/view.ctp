<?php
echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css');
echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.');
echo $this->Html->css('viewpatient.css');
echo $this->element('navbar');
?>

<script>
        $(document).ready(function() {
            $(".nav nav-tabs a").click(function(event) {

                event.preventDefault();
                $(this).parent().addClass("active");
                $(this).parent().siblings().removeClass("active");

                var tab = $(this).attr("href");
                $(".tab-content").not(tab).css("display", "none");
                $(tab).fadeIn();
            });

        });
</script>
<script type="text/javascript">
    var storedVisits = new Array();
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            $id = $(this).closest('tr').attr('id');
            var Row = document.getElementById($id);
            var Cells = Row.getElementsByTagName("td");
            if (Cells[6].innerText == "Completed")
            {
             if($(this).is(":checked")){

                                    document.getElementById($id).style.backgroundColor = "#B4CDCD";

                                    storedVisits.push($id);

                                        }
                                    else if($(this).is(":not(:checked)")){
                                    $id = $(this).closest('tr').attr('id');
                                   document.getElementById($id).style.backgroundColor = "white";
                                  var index = storedVisits.indexOf($id);
                                  storedVisits.splice(index, 1);
                                        }
            }
            else{
                   if (Cells[6].innerText == "Invoiced"){

                        alert("This visit has been invoiced");
                        event.preventDefault();
                     }
                     else{
                         alert("This visit hasn't been completed");
                         event.preventDefault();
                     }

            }
        });
    });
   function generateTable(){

                if (storedVisits.length >0){
                 window.location.assign("http://localhost/build4/patients/view_confirm/"+
                  <?php echo $patient->id; ?> +"/"+storedVisits);
                }
                else {
                alert("No visits selected");
                }
     }

</script>

<script>
        function colourchange() {
            //document.body.style.backgroundColor = "black";
             var table1 = document.getElementById('testtable');
            //table1.style.backgroundColor = "black";
             for (i=1; i < table1.rows.length; i++) {
                var cell1 = table1.rows.item(i).cells;


                    if (cell1.item(6).innerHTML == "Scheduled") {

                        cell1.item(6).style.backgroundColor = "#96CDCD";
                    }
                    else if (cell1.item(6).innerHTML == "Approved") {

                        cell1.item(6).style.backgroundColor = "#D1EEEE";
                    }
                    else if (cell1.item(6).innerHTML == "Completed") {

                        cell1.item(6).style.backgroundColor = "#668B8B";
                    }
             }
        }

</script>

<script>
        $("#table tr").click(function() {

            $(this).addClass('selected').siblings().removeClass('selected');
            var value = $(this).find('td.first').html();
            alert(value);
        })
</script>

<body>
 <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">

                <?= h($patient->full_name) ?>
                    <small><?= h($patient->status) ?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">
            <div class="col-md-6">
                <h3>Patient info</h3>
                <p>
                     DOB: <?= h($patient->dateofbirth->format('d/m/y')) ?>
                    <br>
                    Gender: <?= h($patient->gender) ?>
                    <br>
                     
                    Email:  <?= h($patient->email) ?>
                    <br>
                    Home Phone: <?= h($patient->phone) ?>
                    <br>
                    Mobile Phone: <?= h($patient->mobile_phone) ?>
                    <br>
                    Other Phone: <?= h($patient->other_phone) ?>
                     <br>
                     Address: <?= h($patient->address1) ?>
                              <?= h($patient->address2) ?>
                              <?= h($patient->suburb) ?>
                              <?= h($patient->state) ?>
                              <?= h($patient->country) ?>
                              <?= h($patient->postcode) ?>

                </p>

                 <?php
                                  $urlEdit= array('controller' => 'Patients','action' => 'edit',$patient->id);
                                echo $this->Form->button('Edit Patient', ['onclick' => "location.href='".$this->Url->build($urlEdit)."'"]); ?>
               <br>

               <br>

            </div>

            <div class="col-md-4">
                <?php 
                   $urlEdit= array('controller' => 'Nokrelationships','action' => 'add', 'patientid' => $patient->id);
                echo $this->Form->button('Add a new NOK Relationship', ['onclick' => "location.href='".$this->Url->build($urlEdit)."'"]);
                echo "\n";
                $urlEdit2= array('controller' => 'Visits','action' => 'add', 'patientid' => $patient->id);
                echo $this->Form->button('Add a New Visit', ['onclick' => "location.href='".$this->Url->build($urlEdit2)."'"]);
                echo $this->Form->button('Generate Invoice', ['id'=>'Invoice', 'onclick'=> 'generateTable()', 'style'=>'margin-top:25px;']); ?>
            </div>
        </div>

<div class="row">
<div class="container">

          <div id="exTab2">

           <ul class="nav nav-tabs">
                <li class="active">
                <a href="#tab-1" data-toggle="tab">Related visits</a>
                </li>
                <li>
                <a href="#tab-2" data-toggle="tab">Diseases</a></li>
                <li>
                <a href="#tab-3" data-toggle="tab">Referrer Info</a></li>
                <li>
                <a href="#tab-4" data-toggle="tab">NOK relationship</a></li>
                <li>
                <a href="#tab-5" data-toggle="tab">Invoices</a></li>
        </ul>

    <div class="tab-content">

        <div id="tab-1" class="tab-pane active">
            <div class="col-lg-12">
        <?php if (!empty($patient->visits)): ?>
        
        <table id="testtable" cellpadding="0" cellspacing="0">
            <tr>
                <!-- <th><?= __('Id') ?></th> -->
                 <th><?= __('') ?></th>
                 <th><?= __('Date') ?></th>

<!--                 <th><?= __('Status') ?></th> -->
               
                <th><?= __('Start Time') ?></th>
                <th><?= __('End Time') ?></th>
                <th><?= __('Comments') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
                <th><?= __('Status') ?></th>
            </tr>
            <?php
                $i = 1;
            ?>
            <?php foreach ($patient->visits as $visits): ?>
             <tr id="<?php echo $visits->id;?>">
                <!-- <td><?= h($visits->id) ?></td>  -->
                <td><?= $this->Form->input('', ['type' => 'checkbox']); ?></td>
                <td><?= h($visits->date->format('d/m/y')) ?></td>
                <td><?= h($visits->start_time->format('H:i A')) ?></td>
                <td><?= h($visits->end_time->format('H:i A')) ?></td>
                <td><?= h($visits->comments) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Visits', 'action' => 'view', $visits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Visits', 'action' => 'edit', $visits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Visits', 'action' => 'delete', $visits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visits->id)]) ?>
                </td>
                    <td id = "status"><?= h($visits->status) ?></td>

            </tr>
            <?php
             $i++;
            ?>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>


            </div>
               
        </div>    
    
<div class="tab-pane" id="tab-2" >
      <div class="col-lg-12">
          <?php if (!empty($patient->diseases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>

                <th><?= __('Disease Name') ?></th>
                <th><?= __('Comment') ?></th>
            </tr>
            <?php foreach ($patient->diseases as $disease): ?>
            <tr>
                <td><?= h($disease->name) ?></td>
                <td><?= h($disease->comment) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>

 </div>

</div>

        <div class="tab-pane" id="tab-3" >

        <div class="col-lg-12">
        
        <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Type') ?></th>
            <th><?= __('Business Name') ?></th>
            <th><?= __('Email') ?></th>
            <th><?= __('Address 1') ?></th>
            <th><?= __('Address 2') ?></th>
            <th><?= __('Suburb') ?></th>
             <th><?= __('State') ?></th>
             <th><?= __('Postcode') ?></th>
              <th><?= __('Country') ?></th>
              <th><?= __('Phone') ?></th>
              <th><?= __('Fax Phone') ?></th>
        </tr>
        <tr>
            <td>
                <?= $patient->has('referrer') ? $this->Html->link($patient->referrer->type, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?></td>
        
            <td><?= $patient->has('referrer') ? $this->Html->link($patient->referrer->business_name, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?></td>
    
            
            <td><?= $patient->has('referrer') ? $this->Html->link($patient->referrer->email, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?>
             </td>
       
            <td><?= $patient->has('referrer') ? $this->Html->link($patient->referrer->address1, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?></td>
       
        
            <td><?= $patient->has('referrer') ? $this->Html->link($patient->referrer->address2, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?></td>
       
            
            <td><?= $patient->has('referrer') ? $this->Html->link($patient->referrer->suburb, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?></td>
       
            <td><?= $patient->has('referrer') ? $this->Html->link($patient->referrer->state, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?></td>
        
            <td><?= $patient->has('referrer') ? $this->Html->link($patient->referrer->postcode, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?></td>
       
           
            <td><?= $patient->has('referrer') ? $this->Html->link($patient->referrer->country, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?></td>
       
            
            <td><?= $patient->has('referrer') ? $this->Html->link($patient->referrer->phone, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?></td>
        
            
            <td><?= $patient->has('referrer') ? $this->Html->link($patient->referrer->fax_phone, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?></td>
        </tr>

    </table>
        </div>    

</div>

 <div class="tab-pane" id="tab-4" >
      <div class="col-lg-12">
          <?php if (!empty($patient->nokrelationships)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
               <!--  <th><?= __('Id') ?></th>
                <th><?= __('Patient Id') ?></th> -->
                <th><?= __('Relationship') ?></th>
                <!-- <th><?= __('Gender') ?></th> -->
                <th><?= __('First Name') ?></th>
                <!-- <th><?= __('Other Name') ?></th> -->
                <th><?= __('Last Name') ?></th>
               <!--  <th><?= __('Dateofbirth') ?></th> -->
                <!-- <th><?= __('Email') ?></th> -->
                <th><?= __('Poa') ?></th>
                <th><?= __('Home Phone') ?></th>
           <!--      <th><?= __('Work Phone') ?></th> -->
                <th><?= __('Mobile Phone') ?></th>
              <!--   <th><?= __('Other Phone') ?></th> -->
                <th><?= __('Address1') ?></th>
                <th><?= __('Address2') ?></th>
                <th><?= __('Suburb') ?></th>
             <!--    <th><?= __('Postcode') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('Country') ?></th> -->
            <!--     <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th> -->
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($patient->nokrelationships as $nokrelationships): ?>
            <tr>
               <!--  <td><?= h($nokrelationships->id) ?></td> -->
               <!--  <td><?= h($nokrelationships->patient_id) ?></td> -->
                <td><?= h($nokrelationships->relationship) ?></td>
               <!--  <td><?= h($nokrelationships->gender) ?></td> -->
                <td><?= h($nokrelationships->first_name) ?></td>
                <!-- <td><?= h($nokrelationships->other_name) ?></td> -->
                <td><?= h($nokrelationships->last_name) ?></td>
             <!--    <td><?= h($nokrelationships->dateofbirth) ?></td> -->
                <!-- <td><?= h($nokrelationships->email) ?></td> -->
               <td><?= h($nokrelationships->poa) ?></td>
                <td><?= h($nokrelationships->home_phone) ?></td>
             <!--    <td><?= h($nokrelationships->work_phone) ?></td> -->
                <td><?= h($nokrelationships->mobile_phone) ?></td>
          <!--       <td><?= h($nokrelationships->other_phone) ?></td> -->
                <td><?= h($nokrelationships->address1) ?></td>
                <td><?= h($nokrelationships->address2) ?></td>
                <td><?= h($nokrelationships->suburb) ?></td>
             <!--    <td><?= h($nokrelationships->postcode) ?></td> -->
               <!--  <td><?= h($nokrelationships->state) ?></td>
                <td><?= h($nokrelationships->country) ?></td> -->
                <!-- <td><?= h($nokrelationships->created) ?></td>
                <td><?= h($nokrelationships->modified) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Nokrelationships', 'action' => 'view', $nokrelationships->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Nokrelationships', 'action' => 'edit', $nokrelationships->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Nokrelationships', 'action' => 'delete', $nokrelationships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nokrelationships->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    
 </div>
  
</div>

        <div class="tab-pane" id="tab-5" >
        <table>

        <tr>
            <th><?= __('id') ?></th>
             <th><?= __('Start date') ?></th>
              <th><?= __('End date') ?></th>
              <th><?= __('Status') ?></th>
              <th><?= __('Actions') ?></th>
        </tr>
        <tr>
            <!-- <td><?= h($patient->visit->invoice->id) ?>
            </td> -->
        </tr>
    
       </table>

        </div>

</div>
      
</body>

            <script> 
            colourchange(); 
            invoicegenerator();
            </script>
