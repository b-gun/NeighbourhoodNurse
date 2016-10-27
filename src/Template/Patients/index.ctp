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
    $('#patients').DataTable();
});
</script>
<div class="row">
    <div class="view">
<div class="patients index large-9 medium-8 columns content">
    <h3><?= __('Patients') ?></h3>
    <table id="patients" class="display compact" cellspacing="0" width="100%" margin-left= "200px" cellpadding="0">
        <thead>
            <tr>
               
                <th>First Name</th>
                <th>Last name</th>
                <th>Status</th>
                <th>Referrer</th>
                <th>Email</th>
                <th>DoB</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $patient): ?>
            <tr>
                <td><b><?php echo $this->Html->link(($patient->first_name), ['action' => 'view', $patient->id]); ?></b></td>
                <td><?= h($patient->last_name) ?></td>
                 <td><?= h($patient->status) ?></td>
                 <td><b><?= $patient->has('referrer') ? $this->Html->link($patient->referrer->business_name, ['controller' => 'Referrers', 'action' => 'view', $patient->referrer->id]) : '' ?></b></td>
                <td><?= h($patient->email) ?></td>
                <td><?= h($patient->dateofbirth->format('d/m/Y')) ?></td>
                <td><?= h($patient->gender) ?></td>
                <td><?= h($patient->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $patient->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
</div>
</div>

