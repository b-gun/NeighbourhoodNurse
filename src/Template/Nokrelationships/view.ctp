<?php

echo $this->element('navbar');
?>
<div class="nokrelationships view large-9 medium-8 columns content">
    <h3><?= h($nokrelationship->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Patient') ?></th>
            <td><?= $nokrelationship->has('patient') ? $this->Html->link($nokrelationship->patient->full_name, ['controller' => 'Patients', 'action' => 'view', $nokrelationship->patient->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Relationship') ?></th>
            <td><?= h($nokrelationship->relationship) ?></td>
        </tr>
        <tr>
            <th><?= __('Gender') ?></th>
            <td><?= h($nokrelationship->gender) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($nokrelationship->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Other Name') ?></th>
            <td><?= h($nokrelationship->other_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($nokrelationship->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($nokrelationship->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Poa') ?></th>
            <td><?= h($nokrelationship->poa) ?></td>
        </tr>
        <tr>
            <th><?= __('Address1') ?></th>
            <td><?= h($nokrelationship->address1) ?></td>
        </tr>
        <tr>
            <th><?= __('Address2') ?></th>
            <td><?= h($nokrelationship->address2) ?></td>
        </tr>
        <tr>
            <th><?= __('Suburb') ?></th>
            <td><?= h($nokrelationship->suburb) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($nokrelationship->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($nokrelationship->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($nokrelationship->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Home Phone') ?></th>
            <td><?= $this->Number->format($nokrelationship->home_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Work Phone') ?></th>
            <td><?= $this->Number->format($nokrelationship->work_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile Phone') ?></th>
            <td><?= $this->Number->format($nokrelationship->mobile_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Other Phone') ?></th>
            <td><?= $this->Number->format($nokrelationship->other_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Postcode') ?></th>
            <td><?= $this->Number->format($nokrelationship->postcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Dateofbirth') ?></th>
            <td><?= h($nokrelationship->dateofbirth) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($nokrelationship->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($nokrelationship->modified) ?></td>
        </tr>
    </table>
</div>
