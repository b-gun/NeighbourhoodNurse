<?php
echo $this->Html->script('jquery-1.7.1.min.js');
echo $this->Html->script('jquery-ui-1.8.17.custom.min.js');
echo $this->Html->script('ui.dropdownchecklist-1.5-min.js');
echo $this->Html->css('jquery-ui.css');
echo $this->html->css('ui.dropdownchecklist.themeroller.css');
echo $this->element('navbar');
echo "<p />";
?>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Edit Category') ?></legend>
        <?php
            echo $this->Form->input('icd10', [ 'class' => 'form-control',  'style' => 'width:50%']);
            echo $this->Form->input('category', [ 'class' => 'form-control',  'style' => 'width:50%']);
            echo $this->Form->input('comment', [ 'class' => 'form-control',  'style' => 'width:50%', 'type'=>'textarea']);
        ?>
    </fieldset>
    <?php

                echo $this->Form->button('Reset to Default',
                    array('type' => 'reset',
                          'class'=>'btn btn-default',
                          'style' => 'width:20%; margin-top:25px; margin-left: 60px'
                        ));
                        ?>
      <?php
                echo $this->Form->button('Save Category',
                    array('type' => 'submit',
                        'class'=>'btn btn-default',
                        'style' => 'width:20%; margin-top:25px;'
                        ));
                ?>
    <?= $this->Form->end() ?>
</div>
