<?php
echo $this->Html->script('jquery-1.7.1.min.js');
echo $this->Html->script('jquery-ui-1.8.17.custom.min.js');
echo $this->Html->script('ui.dropdownchecklist-1.5-min.js');
echo $this->Html->css('jquery-ui.css');
echo $this->html->css('ui.dropdownchecklist.themeroller.css');
echo $this->element('navbar');
echo "<p />";
?>
<div class="diseases form large-9 medium-8 columns content">
    <?= $this->Form->create($disease) ?>
    <fieldset>
        <legend><?= __('Add Disease') ?></legend>
        <?php
            echo $this->Form->input('category_id', ['options' => $categories, 'empty' => 'Pick a Category', 'class' => 'form-control', 'style' => 'width:30%;']);
            echo $this->Form->input('name', ['class' => 'form-control', 'style' => 'width:30%;']);
            echo $this->Form->input('code', ['class' => 'form-control', 'style' => 'width:30%;']);
            echo $this->Form->input('comment', ['class' => 'form-control', 'style' => 'width:30%;', 'type'=>'textarea']);

        ?>
    </fieldset>
    <?php

                    echo $this->Form->button('Reset the Form',
                        array('type' => 'reset',
                              'class'=>'btn btn-default',
                              'style' => 'width:15%; margin-top: 25px'
                            ));
                            ?>

                     <?php
                    echo $this->Form->button('Save Disease',
                        array('type' => 'submit',
                            'class'=>'btn btn-default',
                            'style' => 'width:15%; margin-top: 25px'
                            ));

                    ?>
    <?= $this->Form->end() ?>
</div>
