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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
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
    <?= $this->Html->css('receipt.css') ?>

   <?= $this->Html->script('jquery-1.7.1.min.js') ?>
    <?= $this->Html->script('jquery-ui-1.8.17.custom.min.js') ?>
    <?= $this->Html->css('jquery-ui.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1><?= $this->Html->link($cakeDescription, 'http://cakephp.org') ?></h1>
        </div>
        <div id="content">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </div>
        <div id="footer">
            <?= $this->Html->link(
                    $this->Html->image('cake.power.gif', ['alt' => $cakeDescription, 'border' => '0']),
                    'http://www.cakephp.org/',
                    ['target' => '_blank', 'escape' => false]
                )
            ?>
        </div>
    </div>
</body>
</html>
