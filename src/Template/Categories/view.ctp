<?php
echo $this->element('navbar');
?>
<body>
   <div id="wrapper">
<div class="visits view large-9 medium-8 columns content">
    <h3><?= h($category->category) ?></h3>
    <h4><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id])?></h4>
    <table class="vertical-table">
        <tr>
            <th><?= __('Icd10') ?></th>
            <td><?= h($category->icd10) ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($category->comment) ?></td>
        </tr>
    </table>
</div>
</body>
