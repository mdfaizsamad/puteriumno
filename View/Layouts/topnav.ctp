<?php $content_for_layout = $this->fetch('content');?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title_for_layout;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <?php echo $this->Html->css('/components/bootstrap/dist/css/bootstrap.min');?>
    <!-- Font Awesome -->
    <?php echo $this->Html->css('/components/font-awesome/css/font-awesome.min');?>
    <!-- Ionicons -->
    <?php echo $this->Html->css('/plugins/ionicons/css/ionicons.min');?>
    <!-- jvectormap -->
    <?php echo $this->Html->css('/plugins/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2');?>
    <!-- jquery DataTables -->
    <?php echo $this->Html->css('/plugins/jquery-datatables/media/css/jquery.DataTables');?>
    <?php echo $this->Html->css("/plugins/adminlte/plugins/datatables/dataTables.bootstrap")?>
    <!-- jquery Colorbox -->
    <?php echo $this->Html->css("colorbox")?>
    <!-- Theme style -->
    <?php echo $this->Html->css('/plugins/adminlte/dist/css/AdminLTE.min');?>
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
    <?php echo $this->Html->css("style");?>
    <?php echo $this->fetch('css');?>
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <?php echo $this->element('hani/header');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">

            <!-- <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
            </ol> -->
          </section>

          <!-- Main content -->
          <section class="content">
            <?php echo $this->Flash->render('flash'); ?>
            <?php echo $content_for_layout;?>
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
    <?php echo $this->element('hani/footer');?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <?php echo $this->Html->script("/components/jquery/dist/jquery.min", array('inline'=>true))?>
    <!-- Bootstrap 3.3.5 -->
    <?php echo $this->Html->script("/components/bootstrap/dist/js/bootstrap.min", array('inline'=>true))?>
    <!-- jQuery + bootstrap + DataTables -->
        <?php echo $this->Html->script("/plugins/knockout/dist/knockout", array('inline'=>true))?>

    <?php /*
    echo $this->Html->script("/plugins/jquery-datatables/media/js/jquery.DataTables", array('inline'=>true))?>
    echo $this->Html->script("/plugins/adminlte/plugins/datatables/dataTables.bootstrap.min", array('inline'=>true))?>
    <?php echo $this->Html->script("/plugins/adminlte/plugins/datatables/dataTables.bootstrap.min", array('inline'=>true))
*/
    ?>
    <!-- SlimScroll -->
    <?php echo $this->Html->script("/plugins/jquery-slimscroll/jquery.slimscroll.min", array('inline'=>true))?>
    <!-- FastClick -->
    <?php echo $this->Html->script("/plugins/fastclick/lib/fastclick", array('inline'=>true))?>
    <!-- AdminLTE App -->
    <?php echo $this->Html->script("/plugins/adminlte/dist/js/app.min", array('inline'=>true))?>
    <?php echo $this->Html->script("/plugins/jquery-colorbox/jquery.colorbox-min", array('inline'=>true))?>
    <!-- AdminLTE for demo purposes -->
    <?php echo $this->fetch('script');?>
    <?php echo $this->Html->script("/plugins/adminlte/dist/js/demo", array('inline'=>true))?>
    <?php $this->Js->buffer("$(\".colorBoxIframe\").colorbox({width:\"80%\", height:\"80%\"});");?>
    <?php $this->Js->buffer('$(".box button[data-widget=\"remove\"]").each(function(k,v){var self = this;setTimeout(function(){self.click();},2500);});');?>

    <?php (isset($display_for_view))?$this->Js->buffer("$(\"input\").prop('disabled',true)"):'';?>
    <?php echo $this->Js->writeBuffer();?>

  </body>
</html>
