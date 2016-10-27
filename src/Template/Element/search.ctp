<?php
echo $this->Form->create('Patient',['action' => 'search']);
?>
<table cellpadding="2" cellspacing="2" width="50%">
    <tr>
     <?php echo $this->Form->input('name', ['label' =>'']); ?> 
    <tr>
     <tr><?php echo $this->Form->submit(__('Search Patients', true), ['class'=>'delbutton','name' => 'Search', 'div' => false]);?>
    </tr>
</table>
<?= $this->Form->end() ?>