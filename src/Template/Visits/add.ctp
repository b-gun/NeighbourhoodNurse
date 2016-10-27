<?php
echo $this->Html->script('jquery-1.7.1.min.js');
echo $this->Html->script('jquery-ui-1.8.17.custom.min.js');
echo $this->Html->css('jquery-ui.css');
echo $this->Html->script('jquery.timepicker.js');
echo $this->Html->script('datepair.js');
echo $this->Html->css('jquery.timepicker.css');
echo $this->Html->css('viewpatient.css');
echo $this->element('navbar');

echo "<p />";
?>

  <script>
    $(function(){
        //the datepicker is part of jQueryUI http://jqueryui.com/
        $("#date").datepicker(
            {
               yearRange:"-120:+0",
                                       dateFormat: "dd/mm/yy",
                                       altFormat: "yy-mm-dd",
                                       changeMonth: true,
                                       changeYear: true
            });

    });

       // $("#time").timepicker(
       // {
       //      showDuration: true,
       //      timeFormat: "g:ia"
       //   });

       //   var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
       //   var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);
</script>

<body>
   <div id="wrapper">  
<div class="visits form large-9 medium-8 columns content">
    <?= $this->Form->create($visit) ?>

    <fieldset>
        <legend><?= __('Add Visit') ?></legend>
        <?php

        if(isset($_GET['patientid'])){
            echo $this->Form->input('patient_id', 
                ['options' => $patients,
                 'label'=>false,
                'default'=>  $_GET['patientid'],
                 'empty' => 'Choose a Patient', 
                'class' => 'form-control',
                'style' => 'width:50%; margin-left: 60px'
                ]);
          }
          else {
            echo $this->Form->input('patient_id', 
                ['options' => $patients,
                //'default'=>  $_GET['patientid'],
                'label'=>false,
                 'empty' => 'Choose a Patient', 
                'class' => 'form-control',
                'style' => 'width:50%; margin-left: 60px'
                ]);
          }

            echo "<div class='' style='width:100%; height:34px; margin-left: 60px; position:static'>";
                echo "</div>";

                 echo $this->Form->input('type',
                                             [
                                               'label'=>false,
                                                'empty' => 'Choose a Type',
                                               'options'=>['Home'=>'Home', 'Hospital'=>'Hospital', 'Meeting'=>'Meeting', 'Phone Call'=>'Phone Call', 'GP'=>'GP', 'Other'=>'Other'],
                                               'class' => 'form-control',
                                               'style' => 'width:50%; margin-left: 60px'
                                             ]);

                                               echo "<div class='' style='width:100%; height:34px; margin-left: 60px; position:static'>";
                                                             echo "</div>";
                
            echo $this->Form->input('status',
                [ 'options'=>['Scheduled'=>'Scheduled', 'Canceled'=>'Canceled', 'Completed'=>'Completed', 'Invoiced'=>'Invoiced'],
                 'empty' => 'Choose a Status',
                 'label'=>false,
                'class' => 'form-control',
                'style' => 'width:50%; margin-left: 60px']);

              echo "<div class='' style='width:100%; height:34px; margin-left: 60px; position:static'>";
                echo "</div>";

            echo $this->Form->input('date', 
                ['label'=>false, 
                'id'=>'date', 
                'placeholder' => 'Choose a Date', 
                'type'=>'text',
                'class' => 'form-control',
                'style' => 'width:50%; margin-left: 60px'
                ]);
                echo "<div class='' style='width:100%; height:34px; margin-left: 60px; position:static'>";
                echo "</div>";

              ?>
            <br>

             <?php 

             echo $this->Form->input('start_time', ['timeFormat'=>'12']);
             ?>
             
             <?php
            echo $this->Form->input('end_time', ['timeFormat'=>'12']);?>

             <br>
  
             <?php

            echo $this->Form->input('comments',
                [ 'placeholder' => 'Add some comments if need', 
                'label'=>false, 
                'type'=>'textarea',
                'class' => 'form-control',
                'style' => 'width:50%; margin-left: 60px'
                ]);
        ?>

          <br>

             <?php
            
            echo $this->Form->button('Reset the Form', 
                array('type' => 'reset',
                      'class'=>'btn btn-default',
                      'style' => 'width:20%; margin-left: 60px'
                    ));
                    ?>
        
             <?php
            echo $this->Form->button('Submit Form', 
                array('type' => 'submit',
                    'class'=>'btn btn-default',
                    'style' => 'width:20%; margin-left: 60px'
                    )); 
            
            ?>
    </fieldset>

    <?= $this->Form->end() ?>
</div>
</body>
