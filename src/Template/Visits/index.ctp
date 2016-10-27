<!-- ___________                      ________      ___ ______________________________ ___    
\__    ___/___ _____    _____   /   __   \    /  / \__    ___/\______ \__    ___/ \  \   
  |    |_/ __ \\__  \  /     \  \____    /   /  /    |    |    |    |  \|    |     \  \  
  |    |\  ___/ / __ \|  Y Y  \    /    /   (  (     |    |    |    `   \    |      )  ) 
  |____| \___  >____  /__|_|  /   /____/     \  \    |____|   /_______  /____|     /  /  
             \/     \/      \/                \__\                    \/          /__/   

 -->

<?php
echo $this->element('navbar');
?>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function(){
    $('#visits').DataTable();
});
</script>


<body>
<div class="visits index large-9 medium-8 columns content">
    <h3><?= __('Visits') ?></h3>
    <table id="visits" class="display compact" cellspacing="0" width="100%" margin-left= "200px" cellpadding="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('patient_id') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th><?= $this->Paginator->sort('start_time') ?></th>
                <th><?= $this->Paginator->sort('end_time') ?></th>
<!--                <th><?= $this->Paginator->sort('comments') ?></th>-->
<!--                 <th><?= $this->Paginator->sort('created') ?></th>-->
                <th><?= $this->Paginator->sort('modified',['label'=>'Last Modified']) ?></th> 
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visits as $visit): ?>
            <tr>
                <td><?= $visit->has('patient') ? $this->Html->link($visit->patient->first_name.' '.$visit->patient->last_name, ['controller' => 'Patients', 'action' => 'view', $visit->patient->id]) : '' ?>
                </td>
                <td><?= h($visit->status) ?></td>
                <td>
                    <b><?php echo $this->Html->link(($visit->date->format('d/m/Y')), ['action' => 'view', $visit->id]); ?>
                    </b></td>

                <td><?= h($visit->start_time->format('h:i A')) ?></td>
                <td><?= h($visit->end_time->format('h:i A')) ?></td>
<!--                <td><?= h($visit->comments) ?></td>-->
<!--                 <td><?= h($visit->created) ?></td>-->
                <td><?= h($visit->modified) ?></td> 
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visit->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
</body>
