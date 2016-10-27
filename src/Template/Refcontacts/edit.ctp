<?php
echo $this->element('navbar');

?>

<body>
   <div id="wrapper">  
<div class="refcontacts form large-9 medium-8 columns content">
    <?= $this->Form->create($refcontact) ?>
    <fieldset>
        <legend><?= __('Edit Refcontact') ?></legend>
        <?php

          echo $this->Form->input('referrer_id',
                                     ['options' =>$referrers,
                                     'label' => false,
                                     'empty' => 'Choose a Referrer',
                                     'class' => 'form-control',
                                    'templates'=>[
                                     'inputContainer' => '<div style="width: 250px; height: 34px; float:left;">{{content}}</div>'
                                                 ],
                                     'style' => 'width:100%; margin-left: 60px'
                                     ]);
                                 echo $this->Form->input('status',
                                     array('options'=>array('Active'=>'Active',
                                      
                                      'Inactive'=> 'Inactive'),
                                      'label' => false,
                                       'empty'=>'Choose Status',
                                        'class' => 'form-control',
                                        'templates'=>[
                                        'inputContainer' => '<div style="width: 250px; height: 34px; float:left;">{{content}}</div>'
                                                                     ],
                                        'style' => 'margin-left: 85px'

                                       ));

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

            echo $this->Form->input('lastname',
                           ['label' => false,
                           'placeholder'=>'Last Name',
                           'type'=>'text',
                           'class' => 'form-control',
                           'templates'=>[
                                           'inputContainer' => '<div style="width: 250px; padding-top:25px;">{{content}}</div>'
                                        ],
                           'style' => 'margin-left: 60px; margin-top:25px;'
                           ]);

            echo $this->Form->input('type',
                           ['label' => false,
                           'placeholder'=>'Job Title',
                           'type'=>'text',
                           'class' => 'form-control',
                           'templates'=>[
                                           'inputContainer' => '<div style="width: 250px; padding-top:25px;">{{content}}</div>'
                                        ],
                           'style' => 'margin-left: 60px; margin-top:25px;'
                           ]);
           
        

            echo $this->Form->input('email',
                ['label' => false,
                 'placeholder'=>'Email',
                'class' => 'form-control',
                'style' => 'width:525px; margin-left: 60px; margin-top:25px;']
                );
            

            echo $this->Form->input('phone',
                 ['label' => false,
                 'placeholder'=>'Phone',
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
            echo $this->Form->button('Save Referrer Contact',
                array('type' => 'submit',
                    'class'=>'btn btn-default',
                    'style' => 'width:20%; margin-left: 60px'
                    )); 
            
            ?>

    </fieldset>
    <?= $this->Form->end() ?>
</div>
</body>
