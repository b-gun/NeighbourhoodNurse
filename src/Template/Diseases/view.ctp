<?php
echo $this->element('navbar');
?>
<div class="diseases view large-9 medium-8 columns content">
    <h3><?= h($disease->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $disease->has('category') ? $this->Html->link($disease->category->category, ['controller' => 'Categories', 'action' => 'view', $disease->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($disease->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Comment') ?></th>
            <td><?= h($disease->comment) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($disease->code) ?></td>
        </tr>

    </table>
    <div class="related">
        <h4><?= __('Related Patients') ?></h4>
        <?php if (!empty($disease->patients)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>




                <th><?= __('First Name') ?></th>
                <th><?= __('Other Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Dateofbirth') ?></th>
                <th><?= __('Gender') ?></th>



                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($disease->patients as $patients): ?>
            <tr>




                <td><?= h($patients->first_name) ?></td>
                <td><?= h($patients->other_name) ?></td>
                <td><?= h($patients->last_name) ?></td>
                <td><?= h($patients->status) ?></td>
                <td><?= h($patients->dateofbirth) ?></td>
                <td><?= h($patients->gender) ?></td>


                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Patients', 'action' => 'view', $patients->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Patients', 'action' => 'edit', $patients->id]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
