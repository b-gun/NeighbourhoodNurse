<?php
echo $this->Html->script('jquery-1.7.1.min.js');
echo $this->Html->script('jquery-ui-1.8.17.custom.min.js');
echo $this->Html->css('jquery-ui.css');
echo $this->Html->script('jquery.timepicker.js');
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
//         $('#timeOnlyExample.time').timepicker({
//             'showDuration': true,
//              'timeFormat': 'g:ia'
//          });

// var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
// var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);
    });




</script>

<body>
   <div id="wrapper">  
<div class="visits form large-9 medium-8 columns content">
    <?= $this->Form->create($visit) ?>
    <fieldset>
        <legend><?= __('Edit Visit') ?></legend>
        <?php
            echo $this->Form->input('patient_id', 
                ['options' => $patients,
                 'empty' => true, 

                'class' => 'form-control',
                'style' => 'width:50%; margin-left: 60px'
                ]);

             echo $this->Form->input('type',
                             [
                               'options'=>['Home'=>'Home', 'Hospital'=>'Hospital'],
                               'class' => 'form-control',
                               'style' => 'width:50%; margin-left: 60px'
                             ]);

            echo $this->Form->input('status',[
                'options'=>['Scheduled'=>'Scheduled', 'Canceled'=>'Canceled', 'Completed'=>'Completed', 'Invoiced'=>'Invoiced'],
                'class' => 'form-control',
                'style' => 'width:50%; margin-left: 60px']);
            
            echo $this->Form->input('date', 
                ['label'=>'Date', 
                'id'=>'date', 
                'type'=>'text',
                'class' => 'form-control',
                'style' => 'width:50%; margin-left: 60px'
                ]);
            
            ?>
            <br>
             <?php

             echo $this->Form->input('start_time', ['timeFormat'=>'12']);
             ?>
             
             <?php
            echo $this->Form->input('end_time', ['timeFormat'=>'12']);?>

             <br>

            <?php
            echo $this->Form->input('duration', ['class'=>'form-control', 'label'=>'Duration in minutes',
                                                                                  'templates'=>[
                                                                                  'inputContainer' => '<div style="width: 250px; height: 34px; float:left;">{{content}}</div>'
                                                                                        ],'style' => 'width: 50%; margin-left: 60px']);
            ?>
            <?php
            echo $this->Form->input('charge', ['class'=>'form-control', 'label'=>'Charge per hour',
                                                                                  'templates'=>[
                                                                                  'inputContainer' => '<div style="width: 250px; height: 34px; float:left;">{{content}}</div>'
                                                                                      ],'style' => 'width: 50%; margin-left: 0px']);
            ?>

             <?php
             echo $this->Form->input('discount', ['class'=>'form-control', 'label'=>'Discount (if any)',
                                                                                    'templates'=>[
                                                                                   'inputContainer' => '<div style="width: 250px; height: 34px; float:left;">{{content}}</div>'
                                                                                         ],'style' => 'width:50%;']);
             ?>

              <?php
                          echo "<div class='' style='width:100%; height:68px; margin-left: 60px; position:static'>";
                                         echo "</div>";
              ?>

         <?php
            echo $this->Form->input('comments',
                [
                'label'=> array('display'=>'inline-block'),
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
