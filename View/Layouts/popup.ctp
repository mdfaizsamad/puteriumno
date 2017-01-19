<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */
 $content_for_layout=$this->fetch('content'); ?>
<!DOCTYPE html>
<html>
<head>
  <?php echo $this->Html->charset(); ?>
  <title><?php echo $title_for_layout?></title>
  <!-- Bootstrap 3.3.5 -->
  <?php echo $this->Html->css('/components/bootstrap/dist/css/bootstrap.min');?>
  <!-- Font Awesome -->
  <?php echo $this->Html->css('/components/font-awesome/css/font-awesome.min');?>
  <!-- Ionicons -->
  <?php echo $this->Html->css('/plugins/ionicons/css/ionicons.min');?>
  <!-- jvectormap -->
  <?php echo $this->Html->css('/plugins/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2');?><!-- jquery DataTables-->
    <?php echo $this->Html->css('/plugins/jquery-datatables/media/css/jquery.dataTables');?>
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

  <link rel="stylesheet/less" type="text/css" href="<?=Router::url('/components/bootstrap-timepicker/css/timepicker.less');?>" />
  <?php echo $this->Html->css("style");?>
  <?php echo $this->fetch('css');?>
</head>
<body>

<div class='container-fluid'><?php echo  $content_for_layout;?></div>
<?php echo $this->element('sql_dump2');?>
<!-- jQuery 2.1.4 -->
<?php echo $this->Html->script("/components/jquery/dist/jquery.min", array('inline'=>true))?>
<!-- Knockout -->
<?php echo $this->Html->script("/components/knockout/dist/knockout", array('inline'=>true))?>
<!-- LESS JS -->
<?php echo $this->Html->script("/components/less/dist/less.min", array('inline'=>true))?>
<!-- Bootstrap 3.3.5 -->
<?php echo $this->Html->script("/components/bootstrap/dist/js/bootstrap.min", array('inline'=>true))?>
<!-- jQuery + bootstrap + DataTables-->
<?php echo $this->Html->script("/plugins/jquery-datatables/media/js/jquery.dataTables", array('inline'=>true))?>
<?php echo $this->Html->script("/plugins/adminlte/plugins/datatables/dataTables.bootstrap.min", array('inline'=>true))?>
<!-- SlimScroll -->
<?php echo $this->Html->script("/plugins/jquery-slimscroll/jquery.slimscroll.min", array('inline'=>true))?>
<?php echo $this->Html->script("/components/bootstrap-timepicker/js/bootstrap-timepicker.js", array('inline' => true)) ?>
<!-- FastClick -->
<?php echo $this->Html->script("/plugins/fastclick/lib/fastclick", array('inline'=>true))?>
<!-- AdminLTE App -->
<?php echo $this->Html->script("/plugins/adminlte/dist/js/app.min", array('inline'=>true))?>
<?php echo $this->Html->script("/plugins/jquery-colorbox/jquery.colorbox-min", array('inline'=>true))?>
<?php echo $this->Html->script("/plugins/nazkidd982/maskMoney/jquery.maskMoney", array('inline'=>true))?>
<!-- AdminLTE for demo purposes -->
<?php echo $this->fetch('script');?>
<script type="text/javascript">
  (function(){
    $('[data-toggle="tooltip"]').tooltip();
    var fnOnClose = function (){
      if(typeof parent.jQuery.colorbox != 'undefined') parent.jQuery.colorbox.close();
      if(typeof parent.jQuery.fancybox != 'undefined') parent.jQuery.fancybox.close();
    };
    $("#FormOnCancel").click(fnOnClose);
    $('form').on("submit",fnOnClose);
  })();
  var AppModel = new function(){
    self=this;
    <?php echo $this->fetch("ViewModel");?>
  };
  ko.applyBindings(AppModel);
</script>
<?php echo $this->Js->writeBuffer();?>
</body>
</html>
