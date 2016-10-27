<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Refcontact'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Referrers'), ['controller' => 'Referrers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Referrer'), ['controller' => 'Referrers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refcontacts index large-9 medium-8 columns content">
    <h3><?= __('Refcontacts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('referrer_id') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('other_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('mobile_phone') ?></th>
                <th><?= $this->Paginator->sort('other_phone') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($refcontacts as $refcontact): ?>
            <tr>
                <td><?= $this->Number->format($refcontact->id) ?></td>
                <td><?= $refcontact->has('referrer') ? $this->Html->link($refcontact->referrer->id, ['controller' => 'Referrers', 'action' => 'view', $refcontact->referrer->id]) : '' ?></td>
                <td><?= h($refcontact->type) ?></td>
                <td><?= h($refcontact->status) ?></td>
                <td><?= h($refcontact->first_name) ?></td>
                <td><?= h($refcontact->other_name) ?></td>
                <td><?= h($refcontact->last_name) ?></td>
                <td><?= h($refcontact->email) ?></td>
                <td><?= $this->Number->format($refcontact->phone) ?></td>
                <td><?= $this->Number->format($refcontact->mobile_phone) ?></td>
                <td><?= $this->Number->format($refcontact->other_phone) ?></td>
                <td><?= h($refcontact->created) ?></td>
                <td><?= h($refcontact->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $refcontact->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $refcontact->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $refcontact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refcontact->id)]) ?>
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
