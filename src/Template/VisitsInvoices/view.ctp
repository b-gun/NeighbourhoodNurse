<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visits Invoice'), ['action' => 'edit', $visitsInvoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visits Invoice'), ['action' => 'delete', $visitsInvoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitsInvoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Visits Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visits Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitsInvoices view large-9 medium-8 columns content">
    <h3><?= h($visitsInvoice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Visit') ?></th>
            <td><?= $visitsInvoice->has('visit') ? $this->Html->link($visitsInvoice->visit->id, ['controller' => 'Visits', 'action' => 'view', $visitsInvoice->visit->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Invoice') ?></th>
            <td><?= $visitsInvoice->has('invoice') ? $this->Html->link($visitsInvoice->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $visitsInvoice->invoice->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($visitsInvoice->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Duration') ?></th>
            <td><?= $this->Number->format($visitsInvoice->duration) ?></td>
        </tr>
        <tr>
            <th><?= __('Discount') ?></th>
            <td><?= $this->Number->format($visitsInvoice->discount) ?></td>
        </tr>
        <tr>
            <th><?= __('Charge') ?></th>
            <td><?= $this->Number->format($visitsInvoice->charge) ?></td>
        </tr>
    </table>
</div>
