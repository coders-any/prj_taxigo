<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->fetch('title'); ?></title>
    <?php echo $this->html->meta('icon','https://www.airprofits.com/images/favicon/android-desktop.png', array('type' =>'icon')); ?>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <?php echo $this->Html->css('AdminLTE.min'); ?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <?php echo $this->Html->css('_all-skins.min'); ?>
    <?php echo $this->Html->css('fullcalendar'); ?>
    <?php echo $this->Html->css('scheduler.css?ver=1.3'); ?>
    <?php echo $this->Html->css('jquery-ui.min'); ?>
    <?php echo $this->Html->css('tdev.css?ver=1.4'); ?>
    <?php echo $this->Html->css('daterangepicker'); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php echo $this->Html->css('amain.css?ver=1.5'); ?>
    <?php echo $this->Html->css('style.css?ver=1.9'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->Html->script('jquery.min'); ?>
    <!-- Bootstrap 3.3.2 JS -->
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <!-- Underscore -->
    <?php echo $this->Html->script('underscore-min'); ?>
    <!-- SlimScroll -->
    <?php echo $this->Html->script('jquery.slimscroll.min'); ?>
    <!-- FastClick -->
    <?php echo $this->Html->script('fastclick.min'); ?>
    <!-- AdminLTE App -->
    <?php echo $this->Html->script('app.min'); ?>
    <?php echo $this->Html->script('amain'); ?>
    <?php echo $this->Html->script('jquery.tokeninput'); ?>
    <?php echo $this->Html->script('sweetalert'); ?>
    <!-- <?php //echo $this->Html->script('fullcalendar'); ?> -->
    <?php echo $this->fetch('script'); ?>
    <?php echo $this->fetch('modal'); ?>

    <?php echo $this->Html->script('jquery.min'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAppU1Jvn8zFhIl3RBSA0uNHXfZwkKb8Gc&v=3.exp&sensor=false&libraries=places"></script>
    <?php echo $this->Html->script('jquery.placepicker'); ?>

</head>
<body class="skin-blue" cz-shortcut-listen="true">
<!-- Site wrapper -->
<div class="wrapper">
    <?php echo $this->element('atopnav'); ?>
    <!-- Left side column. contains the sidebar -->
    <?php echo $this->element('left-sidebar'); ?>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 803px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                    <legend>
                        <?php if(!empty($title_for_layout)){echo $title_for_layout;}; ?>
                    </legend>
                    <div class="clearfix"></div>
                    <?php
                    echo $this->Session->flash('success');
                    echo $this->Session->flash('error');
                    echo $this->Session->flash('warning');
                    echo $this->Session->flash('notice');
                    ?>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <?php echo $this->fetch('content'); ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright © 2017 <a href="taxigo.vn">TaxiGo</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
<!--  -->
<!-- jQuery 2.1.3 -->
<!-- Bootstrap 3.3.2 JS -->

</body>
</html>