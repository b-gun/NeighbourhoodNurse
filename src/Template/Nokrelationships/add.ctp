<?php
echo $this->Html->script('jquery-1.7.1.min.js');
echo $this->Html->script('jquery-ui-1.8.17.custom.min.js');
echo $this->Html->css('jquery-ui.css');
echo $this->element('navbar');
echo "<p />";
?>


<script>
    $(function()
    {
        //the datepicker is part of jQueryUI http://jqueryui.com/
        $("#dob").datepicker(
            {
               yearRange:"-120:+0",
                                       dateFormat: "dd/mm/yy",
                                       altFormat: "yy-mm-dd",
                                       changeMonth: true,
                                       changeYear: true
            });
           
    });
</script>


<body>
   <div id="wrapper">  
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="container">
          
            <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
               <a class="navbar-brand">Neighbourhood Nurse</a>


               <!--<a><?= $this->Html->link(__('Neighbourhood Nurse'), '/pages/home') ?></a>-->
            </div>
            
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    

                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Visits
                       
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                       
                            <a href="#">
                                <div>
                                     <i><?= $this->Html->link(__('View Visits'), ['controller' => 'Visits','action' => 'index']) ?>
                                     </i>
                                </div>
                            </a>
                       

                        <li class="divider">
                        </li>
                    
                            <a href="#">
                                <div>
                                    <i><?= $this->Html->link(__('Add Visits'), ['controller' => 'Visits','action' => 'add']) ?>
                                     </i>
                                </div>
                            </a>
                   
                </ul>
                </li>

                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Patients 
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                      
                            <a href="#">
                                <div>
                                     <i><?= $this->Html->link(__('View Patients'), ['controller' => 'Patients','action' => 'index']) ?>
                                     </i>
                                </div>
                            </a>
                       

                        <li class="divider"></li>
                        
                            <a href="#">
                                <div>
                                    <i><?= $this->Html->link(__('Add Patients'), ['controller' => 'Patients','action' => 'add']) ?>
                                     </i>
                                </div>
                            </a>
                   
                </ul>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Referrers
                       
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                       
                            <a href="#">
                                <div>
                                     <i><?= $this->Html->link(__('View Referrers'), ['controller' => 'Referrers','action' => 'index']) ?>
                                     </i>
                                </div>
                            </a>
                       
                </li>

                <li class="divider"></li>
                        
                            <a href="#">
                                <div>
                                    <i><?= $this->Html->link(__('Add Referrers'), ['controller' => 'Referrers','action' => 'add']) ?>
                                     </i>
                                </div>
                            </a>
                    
                </li>

                </li>

             </ul>

            </div>

    </div>
</nav> 

<div class="nokrelationships form large-9 medium-8 columns content">
    <?= $this->Form->create($nokrelationship) ?>
    <fieldset>
        <legend><?= __('Add NOK Relationship') ?></legend>

        <?php
                
            echo $this->Form->input('patient_id', [ 'disabled' => 'disabled',
                                    'label' => false,
                                     'default'=>  $_GET['patientid'],
                                    'placeholder'=>'Choose a Patient',
                                    'class' => 'form-control',
                                    'templates'=>[
                                     'inputContainer' => '<div style="width: 250px; height: 34px; float:left;">{{content}}</div>'
                                                 ],
                                     'style' => ' margin-left: 60px'
                                     ]);

       
            echo $this->Form->input('relationship',
                           ['label' => false,
                           'placeholder'=>'Relationship With Patient',
                           'type'=>'text',
                           'class' => 'form-control',
                           'templates'=>[
                                        'inputContainer' => '<div style="width: 250px; height: 34px; float:left;">{{content}}</div>'
                                                                     ],
                                        'style' => 'margin-left: 85px'

                           ]);

                 /* THIS IS A DIVIDER*/
             echo "<div class='' style='width:100%; height:34px; margin-left: 60px; position:static'>";
                echo "</div>";

             echo $this->Form->input('first_name',
                 [
                 'label' => false,
                 'placeholder'=>'First Name',
                'class' => 'form-control',
                'templates'=>[
                                'inputContainer' => '<div style="width: 250px; float:left; padding-top:25px; ">{{content}}</div>'
                             ],

                'required'=>'required',
                 'style' => 'margin-left: 60px'

                ]);


            echo $this->Form->input('other_name',
                [ 'label' => false,
                'placeholder'=>'Other Name/s',
                'class' => 'form-control',
                'templates'=>[
                              'inputContainer' => '<div style="width: 250px; float:left; margin-left:85px; padding-top:25px;">{{content}}</div>'
                             ],

                ]);

                 /* THIS IS A DIVIDER*/
             echo "<div class='' style='width:100%; height:34px; margin-left: 60px; position:static'>";
                echo "</div>";

            echo $this->Form->input('last_name',
                           ['label' => false,
                           'placeholder'=>'Last Name',
                           'type'=>'text',
                           'class' => 'form-control',
                           'templates'=>[
                                           'inputContainer' => '<div style="width: 250px; padding-top:25px;">{{content}}</div>'
                                        ],
                           'style' => 'margin-left: 60px; margin-top:25px;'
                           ]);

            echo $this->Form->input('poa',
                           ['label' => false,
                           'placeholder'=>'POA',
                           'type'=>'text',
                           'class' => 'form-control',
                           'templates'=>[
                                           'inputContainer' => '<div style="width: 250px; padding-top:25px;">{{content}}</div>'
                                        ],
                           'style' => 'margin-left: 60px; margin-top:25px;'
                           ]);
            

            echo $this->Form->input('dateofbirth',
                ['label' => false,
                'placeholder'=>'Date of Birth',
                'id'=>'dob',
                'type'=>'text',
                'class' => 'form-control',
                'templates'=>[
                'inputContainer' => '<div style="width: 250px; padding-top:25px; margin-left:60px; float:left;">{{content}}</div>'
                                                       ],
                ]);

            echo $this->Form->radio('gender',
                                [
                                ['value' => 'Male', 'text' => 'Male', 'style' => 'margin-left: 30px; margin-top:35px;'],
                                ['value' => 'Female', 'text' => 'Female', 'style' => 'margin-left: 25px; margin-top:25px;'],

                                ]
                                        );
               
            
            echo $this->Form->input('email',
                ['label' => false,
                 'placeholder'=>'Email',
                'class' => 'form-control',
                'style' => 'width:525px; margin-left: 60px; margin-top:25px;']
                );

            echo $this->Form->input('address1',
                           ['label' => false,
                            'placeholder'=>'Address',
                           'class' => 'form-control',
                           'style' => 'width:525px; margin-left: 60px; margin-top:25px;']);
            echo $this->Form->input('address2',
                           ['label' => false,
                            'placeholder'=>'Address Line 2',
                           'class' => 'form-control',
                           'style' => 'width:525px; margin-left: 60px; margin-top:25px;']);

            echo $this->Form->input('suburb',
                ['label' => false,
                 'placeholder'=>'Suburb',
                'class' => 'form-control',
                'style' => 'width:525px; margin-left: 60px; margin-top:25px;']);

                echo $this->Form->input('state',
                ['label' => false,
                 'placeholder'=>'State',
                'class' => 'form-control',
                'empty'=>'Choose Gender',
                'templates'=>[
                             'inputContainer' => '<div style="width: 125px; float:left; margin-left: 60px;">{{content}}</div>'
                             ],
                'style' => 'width:100%;  margin-top:25px;']);

            echo $this->Form->input('postcode',
                ['label' => false,
                 'placeholder'=>'Postcode',
                'class' => 'form-control',
                'templates'=>[
                            'inputContainer' => '<div style="width: 125px; float:left; ">{{content}}</div>'
                             ],
                'style' => 'margin-left: 25px; margin-top:25px;']);

            echo $this->Form->input('country',
                ['label' => false,
                 'placeholder'=>'Country',
                'class' => 'form-control',
                'templates'=>[
                            'inputContainer' => '<div style="width: 225px; float:left; margin-left: 50px;">{{content}}</div>'
                             ],
                'style' => 'width:100%;  margin-top:25px;']);

                 /* THIS IS A DIVIDER */
                           echo "<div class='' style='width:100%; height:64px; margin-left: 60px; position:static'>";
                           echo "</div>";

            echo $this->Form->input('home_phone',
                 ['label' => false,
                 'placeholder'=>'Phone',
                 'class' => 'form-control',
                'style' => 'width:525px; margin-left: 60px; margin-top:25px;']);


             echo $this->Form->input('work_phone',
                ['label' => false,
                'placeholder'=>'Work Phone',
                'class' => 'form-control',
                'style' => 'width:525px; margin-left: 60px; margin-top:25px;']);

            echo $this->Form->input('mobile_phone',
                ['label' => false,
                'placeholder'=>'Mobile Phone',
                'class' => 'form-control',
                'style' => 'width:525px; margin-left: 60px; margin-top:25px;']);

            echo $this->Form->input('other_phone',
                ['label' => false,
                 'placeholder'=>'Other Phone',
                'class' => 'form-control',
                'style' => 'width:525px; margin-left: 60px; margin-top:25px;']);


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
            echo $this->Form->button('Save NOK relationship',
                array('type' => 'submit',
                    'class'=>'btn btn-default',
                    'style' => 'width:20%; margin-left: 60px'
                    )); 
            
            ?>
    </fieldset>
 
    <?= $this->Form->end() ?>

</div>

</div>
</body>
