<?php
echo $this->element('navbar');
?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function(){
    $('#categories').DataTable();
});
</script>
<div class="categories index large-9 medium-8 columns content">
    <h3><?= __('Categories') ?></h3>
    <table id="categories" class="display compact" cellspacing="0" width="100%" margin-left= "200px" cellpadding="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('category') ?></th>
                <th><?= $this->Paginator->sort('icd10') ?></th>
                <th><?= $this->Paginator->sort('comment') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>


                <td><?= h($category->category) ?></td>
                <td><?= h($category->icd10) ?></td>
                <td><?= h($category->comment) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
