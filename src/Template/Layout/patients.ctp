<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Neighbourhood Nurse';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
     <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('modern-business.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
     <?= $this->Html->css('font-awesome.css') ?>
    <?= $this->Html->css('metisMenu.min.css') ?>
     <?= $this->Html->css('sb-admin-2.css') ?>
     <?= $this->Html->script('jquery.min.js') ?>
     <?= $this->Html->script('bootstrap.min.js') ?>
     <?= $this->Html->script('metisMenu.min.js') ?>
     <?= $this->Html->script('sb-admin-2.js') ?>
    <?= $this->Html->css('patients.css') ?>
    <?= $this->Html->script('jquery-ui-1.8.17.custom.min.js') ?>
    <?= $this->Html->css('jquery-ui.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
