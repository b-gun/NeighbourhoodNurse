<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nokrelationship'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nokrelationships index large-9 medium-8 columns content">
    <h3><?= __('Nokrelationships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('patient_id') ?></th>
                <th><?= $this->Paginator->sort('relationship') ?></th>
                <th><?= $this->Paginator->sort('gender') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('other_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('dateofbirth') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('poa') ?></th>
                <th><?= $this->Paginator->sort('home_phone') ?></th>
                <th><?= $this->Paginator->sort('work_phone') ?></th>
                <th><?= $this->Paginator->sort('mobile_phone') ?></th>
                <th><?= $this->Paginator->sort('other_phone') ?></th>
                <th><?= $this->Paginator->sort('address1') ?></th>
                <th><?= $this->Paginator->sort('address2') ?></th>
                <th><?= $this->Paginator->sort('suburb') ?></th>
                <th><?= $this->Paginator->sort('postcode') ?></th>
                <th><?= $this->Paginator->sort('state') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nokrelationships as $nokrelationship): ?>
            <tr>
                <td><?= h($nokrelationship->id) ?></td>
                <td><?= $nokrelationship->has('patient') ? $this->Html->link($nokrelationship->patient->full_name, ['controller' => 'Patients', 'action' => 'view', $nokrelationship->patient->id]) : '' ?></td>
                <td><?= h($nokrelationship->relationship) ?></td>
                <td><?= h($nokrelationship->gender) ?></td>
                <td><?= h($nokrelationship->first_name) ?></td>
                <td><?= h($nokrelationship->other_name) ?></td>
                <td><?= h($nokrelationship->last_name) ?></td>
                <td><?= h($nokrelationship->dateofbirth) ?></td>
                <td><?= h($nokrelationship->email) ?></td>
                <td><?= h($nokrelationship->poa) ?></td>
                <td><?= h($nokrelationship->home_phone) ?></td>
                <td><?= h($nokrelationship->work_phone) ?></td>
                <td><?= h($nokrelationship->mobile_phone) ?></td>
                <td><?= h($nokrelationship->other_phone) ?></td>
                <td><?= h($nokrelationship->address1) ?></td>
                <td><?= h($nokrelationship->address2) ?></td>
                <td><?= h($nokrelationship->suburb) ?></td>
                <td><?= h($nokrelationship->postcode) ?></td>
                <td><?= h($nokrelationship->state) ?></td>
                <td><?= h($nokrelationship->country) ?></td>
                <td><?= h($nokrelationship->created) ?></td>
                <td><?= h($nokrelationship->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nokrelationship->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nokrelationship->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nokrelationship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nokrelationship->id)]) ?>
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
