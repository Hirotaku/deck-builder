<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
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

    <!-- Bootstrap core CSS     -->
    <?= $this->Html->css('bootstrap.min.css') ?>

    <!-- Animation library for notifications   -->
    <?= $this->Html->css('animate.min.css') ?>

    <!--  Paper Dashboard core CSS    -->
    <?= $this->Html->css('paper-dashboard.css') ?>

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <?= $this->Html->css('themify-icons.css') ?>



     <!--   Core JS Files   -->
    <?= $this->Html->script('jquery-1.10.2.js'); ?>
    <?= $this->Html->script('bootstrap.min.js'); ?>

    <!--  Checkbox, Radio & Switch Plugins -->
    <?= $this->Html->script('bootstrap-checkbox-radio.js'); ?>

    <!--  Charts Plugin -->
    <?= $this->Html->script('chartist.min.js'); ?>

    <!--  Notifications Plugin    -->
    <?= $this->Html->script('bootstrap-notify.js'); ?>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <?= $this->Html->script('paper-dashboard.js'); ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div class="wrapper">
  <div class="sidebar" data-background-color="white" data-active-color="danger">
    <?= $this->element('global_sideber') ?>
  </div>
    <?= $this->Flash->render() ?>
    <div class="main-panel">
        <?= $this->element('global_header') ?>
        <?= $this->fetch('content') ?>
        <footer class="footer">
            <?= $this->element('global_footer') ?>
        </footer>
    </div>

</div>

</body>
</html>
