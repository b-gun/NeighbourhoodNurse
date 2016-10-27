<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Refcontact'), ['action' => 'edit', $refcontact->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Refcontact'), ['action' => 'delete', $refcontact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refcontact->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Refcontacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Refcontact'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Referrers'), ['controller' => 'Referrers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Referrer'), ['controller' => 'Referrers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="refcontacts view large-9 medium-8 columns content">
    <h3><?= h($refcontact->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Referrer') ?></th>
            <td><?= $refcontact->has('referrer') ? $this->Html->link($refcontact->referrer->id, ['controller' => 'Referrers', 'action' => 'view', $refcontact->referrer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($refcontact->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($refcontact->status) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($refcontact->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Other Name') ?></th>
            <td><?= h($refcontact->other_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($refcontact->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($refcontact->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($refcontact->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= $this->Number->format($refcontact->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile Phone') ?></th>
            <td><?= $this->Number->format($refcontact->mobile_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Other Phone') ?></th>
            <td><?= $this->Number->format($refcontact->other_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($refcontact->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($refcontact->modified) ?></td>
        </tr>
    </table>
</div>
