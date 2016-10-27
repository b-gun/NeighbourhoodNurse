<?php
echo $this->element('navbar');
?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function(){
    $('#diseases').DataTable();
});
</script>
<div class="diseases index large-9 medium-8 columns content">
    <h3><?= __('Diseases') ?></h3>
    <table id="diseases" class="display compact" cellspacing="0" width="100%" margin-left= "200px" cellpadding="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('comment') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diseases as $disease): ?>
            <tr>

                <td><?= $disease->has('category') ? $this->Html->link($disease->category->category, ['controller' => 'Categories', 'action' => 'view', $disease->category->id]) : '' ?></td>
                <td><?= h($disease->name) ?></td>
                <td><?= h($disease->comment) ?></td>
                <td><?= h($disease->code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $disease->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $disease->id]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
