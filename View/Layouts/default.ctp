<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title_for_layout; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <?php echo $this->Html->css('/components/bootstrap/dist/css/bootstrap.min'); ?>
        <!-- Font Awesome -->
        <?php echo $this->Html->css('/components/font-awesome/css/font-awesome.min'); ?>
        <!-- Ionicons -->
        <?php echo $this->Html->css('/plugins/ionicons/css/ionicons.min'); ?>
        <!-- jvectormap -->
        <?php echo $this->Html->css('/plugins/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2'); ?>
        <!-- jquery DataTables-->
        <?php echo $this->Html->css('/plugins/jquery-datatables/media/css/jquery.dataTables'); ?>
        <?php echo $this->Html->css("/plugins/adminlte/plugins/datatables/dataTables.bootstrap") ?>

        <?php echo $this->Html->css("/plugins/jquery-colorbox/example5/colorbox") ?>
            <!-- Select2 -->
        <?php echo $this->Html->css('/plugins/select2/select2/dist/css/select2.min');?>
        <?php echo $this->Html->css("/components/animate.css/animate.min") ?>
        <!-- Theme style -->
        <?php echo $this->Html->css('/plugins/adminlte/dist/css/AdminLTE.min'); ?>

        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <!--
            <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
        -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php //echo  $this->Html->css('/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min'); ?>

        <?php echo $this->Html->css("style"); ?>
        <?= $this->fetch('css') ?>
        <style type="text/css">
        <?php echo str_replace(['<style>', '</style>'], '', $this->fetch('style')); ?>
            .sidebar-menu li{
                border-top: 1px solid #54677a;
                border-bottom: 1px solid #142638;
            }
            .sidebar-menu li>a, .sidebar-menu li>a:focus, .sidebar-menu li>a:hover, .sidebar-menu li>a:active {
                text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
                outline: none;
                color: #fff;
                background-color: #34495e;
            }
        </style>
        <?php echo $this->element("hani/api") ?>
    </head>
    <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
    <!-- the fixed layout is not compatible with sidebar-mini -->
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo --><!-- <?php echo Router::url('/'); ?> -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>U</b>C</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>UNIEC</b>&nbsp;CAMPUS</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <?php echo $this->element('hani/messages'); ?>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <?php echo $this->element('hani/notifications'); ?>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <?php echo $this->element('hani/tasks'); ?>
                            <!-- User Account: style can be found in dropdown.less -->
                            <?php echo $this->element('hani/account'); ?>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- =================SIDEBAR======================= -->
            <?php echo $this->Element('hani/sidebar'); ?>
            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php echo $this->element('hani/breadcrumbs'); ?>
                <!-- Content Header (Page header) -->

                <!-- Main content -->
                <section class="content">
                    <?php echo $this->Flash->render('flash'); ?>
                    <!-- Default box -->
                    <?php echo $content_for_layout; ?>

                </section><!-- /.content -->

            </div><!-- /.content-wrapper -->
            <?php echo $this->element('hani/footer'); ?>

        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <?php echo $this->Html->script("/components/jquery/dist/jquery.min", array('inline' => true)) ?>
        <!-- Knockout -->
        <?php echo $this->Html->script("/components/knockout/dist/knockout", array('inline' => true)) ?>
        <!-- Bootstrap 3.3.5 -->
        <?php echo $this->Html->script("/components/bootstrap/dist/js/bootstrap.min", array('inline' => true)) ?>
        <!-- jQuery + bootstrap + DataTables-->
        <?php echo $this->Html->script("/plugins/jquery-datatables/media/js/jquery.dataTables", array('inline' => true)) ?>
        <?php echo $this->Html->script("/plugins/adminlte/plugins/datatables/dataTables.bootstrap.min", array('inline' => true)) ?>
        <!-- Sortable -->
        <?php echo $this->Html->script('/components/Sortable/Sortable.min.js', ['inline' => true]) ?>
        <!-- SlimScroll -->
        <?php echo $this->Html->script("/plugins/jquery-slimscroll/jquery.slimscroll.min", array('inline' => true)) ?>
        <?php echo $this->Html->script("/components/highcharts/highcharts", array('inline' => true)) ?>
        <?php echo $this->Html->script("/components/highchartTable/jquery.highchartTable", array('inline' => true)) ?>
        <?php //echo $this->Html->script("/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min", array('inline' => true)) ?>
        <!-- FastClick -->
        <?php echo $this->Html->script("/plugins/fastclick/lib/fastclick", array('inline' => true)) ?>
        <!-- Select2 -->
        <?php echo $this->Html->script('/plugins/select2/select2/dist/js/select2.min', array('inline'=>true));?>
        <!-- AdminLTE App -->
        <?php echo $this->Html->script("/plugins/adminlte/dist/js/app.min", array('inline' => true)) ?>
        <?php echo $this->Html->script("/plugins/jquery-colorbox/jquery.colorbox-min", array('inline' => true)) ?>
        <?php echo $this->Html->script("/plugins/nazkidd982/maskMoney/jquery.maskMoney", array('inline'=>true))?>

        <!-- Lead -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
        <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->


        <!-- AdminLTE for demo purposes -->
        <?php echo $this->fetch('script'); ?>
        <?php //echo $this->Html->script("/plugins/adminlte/dist/js/demo", array('inline'=>true))?>
        <?php $this->Js->buffer("$(\".colorBoxIframe\").colorbox({width:\"80%\", height:\"80%\",onClosed:function(){location.reload(true);}});"); ?>
        <?php $this->Js->buffer('$(".box button[data-widget=\"remove\"]").each(function(k,v){var self = this;setTimeout(function(){self.click();},30000);});'); ?>
        <?php if ($ViewModel = str_replace(['<script>', '</script>'], '', $this->fetch("ViewModel"))): ?>
            <script type="text/javascript">
                var AppModel = new function () {
                    self = this;<?php echo $ViewModel; ?>
                };
                ko.applyBindings(AppModel);
            </script>
        <?php endif; ?>
        <?php (isset($display_for_view)) ? $this->Js->buffer("$(\"input\").prop('disabled',true)") : ''; ?>


        <?php echo $this->Js->writeBuffer(); ?>
    </body>
</html>
