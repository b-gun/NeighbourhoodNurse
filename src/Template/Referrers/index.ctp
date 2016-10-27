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
    $('#referrers').DataTable();
});
</script>


<body>
   
<div class="referrers index large-9 medium-8 columns content">
    <h3><?= __('Referrers') ?></h3>
    <table id="referrers" class="display compact" cellspacing="0" width="100%" margin-left= "200px" cellpadding="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('business_name') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('fax_phone') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($referrers as $referrer): ?>
            <tr>


                <td><b><?php echo $this->Html->link(($referrer->business_name), ['action' => 'view', $referrer->id]); ?></b></td>
                <td><?= h($referrer->type) ?></td>
                <td><?= h($referrer->status) ?></td>
                <td><?= h($referrer->email) ?></td>
                <td><?=h($referrer->phone) ?></td>
                <td><?= h($referrer->fax_phone) ?></td>
<!--                 <td><?= h($referrer->address1) ?></td>
                <td><?= h($referrer->address2) ?></td>
                <td><?= h($referrer->suburb) ?></td>
                <td><?= $this->Number->format($referrer->postcode) ?></td>
                <td><?= h($referrer->state) ?></td>
                <td><?= h($referrer->country) ?></td> -->
                <!-- <td><?= h($referrer->created) ?></td>
                <td><?= h($referrer->modified) ?></td> -->
                 <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $referrer->id]) ?>
                </td>
              
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
