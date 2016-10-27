<?php
echo $this->Html->script('jquery-1.7.1.min.js');
echo $this->Html->script('jquery-ui-1.8.17.custom.min.js');
echo $this->Html->script('ui.dropdownchecklist-1.5-min.js');
echo $this->Html->css('jquery-ui.css');
echo $this->html->css('ui.dropdownchecklist.themeroller.css');
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

<script>
       $(document).ready(function() {
                   $("#diseases").dropdownchecklist( { emptyText: "Pick a Disease(s)", width: 250, maxDropHeight: 150} );
               });

</script>

<style>
table {
    border:1px solid #CCC;
    border-collapse:collapse;
    margin-left:20px;
    margin-top:10px;
}
td {
    border:none;
}
</style>

<body>
   <div id="wrapper">



<div class="patients form large-9 medium-8 columns content pull-left">
<!-- style="width:600px"-->
    <?= $this->Form->create($patient) ?>
    <fieldset>
        <legend><?= __('Add Patient') ?></legend>
        <?php

            /*
            echo $this->Form->input('user_id',
                ['options' => $users,
               'Default' => 1,
                'class' => 'form-control',
                'style' => 'width:50%; margin-left: 60px'
                 ]);
             */

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
                                      'Under Consideration'=>' Under Consideration',
                                      'Expired'=> 'Expired'),
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
                             ]
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
                                           'inputContainer' => '<div style="float:left; width: 250px; padding-bottom: 25px; ">{{content}}</div>'
                                        ],
                           'style' => 'margin-left: 60px; margin-top:25px;'
                           ]);



                       echo $this->Form->input('diseases._ids', ['options' => $diseases,'multiple',
                            'label'=>false,
                              'class' => 'form-control',
                              'templates'=>[
                                          'inputContainer' => '<div style="width: 250px; float:left; margin-top:28px; margin-left: 85px;">{{content}}</div>'
                                           ],
                               'id'=>'diseases'
                                 ]);

             /* THIS IS A DIVIDER*/
                         echo "<div class='' style='width:100%; height:34px; margin-left: 60px; position:static'>";
                            echo "</div>";

            echo $this->Form->input('email',
                ['label' => false,
                 'placeholder'=>'Email',
                'class' => 'form-control',

                'style' => 'width:525px; margin-left: 60px; margin-top:25px; ']
                );

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
                'options'=>['VIC'=>'VIC', 'NSW'=>'NSW','QLD'=>'QLD', 'WA'=>'WA', 'SA'=>'SA', 'TAS'=>'TAS'],
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
                'default'=>'Australia',
                'templates'=>[
                            'inputContainer' => '<div style="width: 225px; float:left; margin-left: 50px;">{{content}}</div>'
                             ],
                'style' => 'width:100%;  margin-top:25px;']);

                 /* THIS IS A DIVIDER */
                           echo "<div class='' style='width:100%; height:64px; margin-left: 60px; position:static'>";
                           echo "</div>";

            echo $this->Form->input('phone',
                 ['label' => false,
                 'placeholder'=>'Phone, eg.0399998888, 99998888',
                 'class' => 'form-control',
                'style' => 'width:525px; margin-left: 60px; margin-top:25px;']);

            echo $this->Form->input('mobile_phone',
                ['label' => false,
                'placeholder'=>'Mobile Phone, eg.0412345678',
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
            echo $this->Form->button('Save Patient',
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