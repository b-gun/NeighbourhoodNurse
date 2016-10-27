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
<div class="referrers form large-9 medium-8 columns content">
    <?= $this->Form->create($referrer) ?>
    <fieldset>
        <legend><?= __('Edit Referrer') ?></legend>
        <?php
            echo $this->Form->input('type',
                array('options'=>array('Private'=>'Private','Business'=>'Business'),
                    'label' => false,
                  'empty'=>'Choose Type',
                   'class' => 'form-control',
                    'templates'=>[
                                     'inputContainer' => '<div style="width: 250px; height: 34px; float:left;">{{content}}</div>'
                                                 ],
                                     'style' => 'width:100%; margin-left: 60px'
                  ));

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
             echo "<div class='' style='width:100%; height:34px; margin-left: 60px; position:static'>";
        echo "</div>";
            


            echo $this->Form->input('business_name',
                [
                'placeholder'=>'Business Name/Family Name For Private',
                'label' => false,
                'class' => 'form-control',
                 'templates'=>[
                                'inputContainer' => '<div style="width: 290px; float:left; padding-top:25px; ">{{content}}</div>'
                             ],

                'required'=>'required',
                 'style' => 'margin-left: 60px'
                ]);

          echo "<div class='' style='width:100%; height:75px; margin-left: 60px; position:static'>";
        echo "</div>";
        
            echo $this->Form->input('email',
                [
                'placeholder'=>'Email',
                'label' => false,
                'class' => 'form-control',
                'style' => 'width:46%; margin-left: 60px'
                ]);

          
          echo $this->Form->input('phone',
                 ['label' => false,
                 'placeholder'=>'Phone, eg.0499998888, 99998888',
                 'class' => 'form-control',
                'style' => 'width:525px; margin-left: 60px; margin-top:25px;']);

        echo "<div class='' style='width:100%; height:34px; margin-left: 60px; position:static'>";
        echo "</div>";

            echo $this->Form->input('fax_phone',

                ['label' => false,
                 'placeholder'=>'Fax Number, eg.0399998888, 99998888',
                'class' => 'form-control',
                'style' => 'width:46%; margin-left: 60px'
                ]);


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

        ?>

         <br>
        
             <?php
            echo $this->Form->button('Submit Form', 
                array('type' => 'submit',
                    'class'=>'btn btn-default',
                    'style' => 'width:35%; margin-left: 80px'
                    )); 
            
            ?>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>
</body>
