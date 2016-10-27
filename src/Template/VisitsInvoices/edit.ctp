<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $visitsInvoice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $visitsInvoice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Visits Invoices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Visits'), ['controller' => 'Visits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visit'), ['controller' => 'Visits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitsInvoices form large-9 medium-8 columns content">
    <?= $this->Form->create($visitsInvoice) ?>
    <fieldset>
        <legend><?= __('Edit Visits Invoice') ?></legend>
        <?php
            echo $this->Form->input('visit_id', ['options' => $visits, 'empty' => true]);
            echo $this->Form->input('invoice_id', ['options' => $invoices, 'empty' => true]);
            echo $this->Form->input('duration');
            echo $this->Form->input('discount');
            echo $this->Form->input('charge');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
