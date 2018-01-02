<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="description" content="Hotelprofits">
    <meta name="author" content="Hotelprofits">
    <title><?php echo $this->fetch('title'); ?></title>
    <?php echo $this->html->meta('icon','https://www.airprofits.com/images/favicon/android-desktop.png', array('type' =>'icon')); ?>
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <!--[if lt IE 9]>
    <?php echo $this->Html->script('html5shiv'); ?>
    <![endif]-->
    <?php echo $this->Html->css('main'); ?>
    <?php echo $this->Html->css('AdminLTE.min'); ?>
    <?php echo $this->Html->css('blue'); ?>
    <?php echo $this->fetch('css'); ?>
</head><!--/head-->

<body class="login-page">
<?php echo $this->fetch('content'); ?>
<?php echo $this->Html->script('jquery.min'); ?>
<?php echo $this->Html->script('bootstrap.min'); ?>
<?php echo $this->Html->script('icheck.min'); ?>
<?php echo $this->Html->script('alogin'); ?>
<?php echo $this->fetch('script'); ?>
</body>
</html>