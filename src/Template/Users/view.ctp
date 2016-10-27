<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Patients'), ['controller' => 'Patients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Patient'), ['controller' => 'Patients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Patients') ?></h4>
        <?php if (!empty($user->patients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Referrer Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Other Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Dateofbirth') ?></th>
                <th><?= __('Gender') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Mobile Phone') ?></th>
                <th><?= __('Other Phone') ?></th>
                <th><?= __('Address1') ?></th>
                <th><?= __('Address2') ?></th>
                <th><?= __('Suburb') ?></th>
                <th><?= __('Postcode') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('Country') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->patients as $patients): ?>
            <tr>
                <td><?= h($patients->id) ?></td>
                <td><?= h($patients->user_id) ?></td>
                <td><?= h($patients->referrer_id) ?></td>
                <td><?= h($patients->status) ?></td>
                <td><?= h($patients->first_name) ?></td>
                <td><?= h($patients->other_name) ?></td>
                <td><?= h($patients->last_name) ?></td>
                <td><?= h($patients->email) ?></td>
                <td><?= h($patients->dateofbirth) ?></td>
                <td><?= h($patients->gender) ?></td>
                <td><?= h($patients->phone) ?></td>
                <td><?= h($patients->mobile_phone) ?></td>
                <td><?= h($patients->other_phone) ?></td>
                <td><?= h($patients->address1) ?></td>
                <td><?= h($patients->address2) ?></td>
                <td><?= h($patients->suburb) ?></td>
                <td><?= h($patients->postcode) ?></td>
                <td><?= h($patients->state) ?></td>
                <td><?= h($patients->country) ?></td>
                <td><?= h($patients->created) ?></td>
                <td><?= h($patients->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Patients', 'action' => 'view', $patients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Patients', 'action' => 'edit', $patients->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Patients', 'action' => 'delete', $patients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patients->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
