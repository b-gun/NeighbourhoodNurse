<?php
echo $this->element('navbar');
?>
<body>
   <div id="wrapper">
<div class="visits view large-9 medium-8 columns content">
    <h3><?=h($visit->date) ?> visit for <?=$this->Html->link($visit->patient->full_name, ['controller' => 'Patients', 'action' => 'view', $visit->patient->id]) ?></h3>
    <h4><?= $this->Html->link(__('Edit Visit'), ['action' => 'edit', $visit->id])?></h4>
  <!--   <h4><?= $this->Html->link(__('Receipts'), ['action' => 'receipt', $visit->id])?></h4>
    <h4><?= $this->Html->link(__('PDF'), ['action' => 'viewPdf', $visit->id])?></h4> -->
    <table class="vertical-table">
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($visit->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($visit->comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Type of Visit') ?></th>
            <td><?= h($visit->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($visit->date->format('d/m/y')) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Time') ?></th>
            <td><?= h($visit->start_time->format('h:i A')) ?></td>
        </tr>
        <tr>
            <th><?= __('End Time') ?></th>
            <td><?= h($visit->end_time->format('h:i A')) ?></td>
        </tr>
        <tr>
             <th><?= __('Duration in Minutes') ?></th>
             <?php if (!empty($visit->duration)): ?>
             <td><?= h($visit->duration) ?></td>
             <?php else: ?>
             <td>0</td>
             <?php endif; ?>
        </tr>
        <tr>
             <th><?= __('Charge per Hour') ?></th>
             <?php if (!empty($visit->charge)): ?>
             <td>$<?= h($visit->charge) ?></td>
             <?php else: ?>
             <td>$0</td>
             <?php endif; ?>
        </tr>
        <tr>
             <th><?= __('Discount') ?></th>
             <?php if (!empty($visit->charge)): ?>
             <td><?= h($visit->discount) ?>%</td>
             <?php else: ?>
             <td>0%</td>
             <?php endif; ?>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($visit->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Modified') ?></th>
            <td><?= h($visit->modified) ?></td>
        </tr>
    </table>
</div>
</body>