<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visits Invoice'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitsInvoices index large-9 medium-8 columns content">
    <h3><?= __('Visits Invoices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('visit_id') ?></th>
                <th><?= $this->Paginator->sort('invoice_id') ?></th>
                <th><?= $this->Paginator->sort('duration') ?></th>
                <th><?= $this->Paginator->sort('discount') ?></th>
                <th><?= $this->Paginator->sort('charge') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitsInvoices as $visitsInvoice): ?>
            <tr>
                <td><?= $this->Number->format($visitsInvoice->id) ?></td>
                <td><?= $visitsInvoice->has('visit') ? $this->Html->link($visitsInvoice->visit->id, ['controller' => 'Visits', 'action' => 'view', $visitsInvoice->visit->id]) : '' ?></td>
                <td><?= $visitsInvoice->has('invoice') ? $this->Html->link($visitsInvoice->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $visitsInvoice->invoice->id]) : '' ?></td>
                <td><?= $this->Number->format($visitsInvoice->duration) ?></td>
                <td><?= $this->Number->format($visitsInvoice->discount) ?></td>
                <td><?= $this->Number->format($visitsInvoice->charge) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visitsInvoice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visitsInvoice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visitsInvoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visitsInvoice->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
