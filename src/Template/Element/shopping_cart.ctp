

<?php
echo $this->Form->create('Product', ['url' => ['action' => 'search']], ['class'=>'form-inline']);
?>
<table cellpadding="2" cellspacing="2" width="50%" border="0">

    <tr>
        <td><?php echo $this->Form->input('name', ['label'=>'', 'empty' => "Search for bracelets, rings, etc..."]); ?></td>
        <td><?php echo $this->Form->submit(__('Search', true), ['class'=>'btn btn-default','name' => 'Search', 'div' => false]);?></td>
    </tr>
</table>
<?= $this->Form->end() ?>
