<?php Configure::write("debug", 0)?>

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
    <?php /*echo $this->Html->css('/plugins/jquery-datatables/media/css/jquery.DataTables');?>
    <?php echo $this->Html->css("/plugins/adminlte/plugins/datatables/dataTables.bootstrap")*/?>
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
    <?php echo $this->Html->css("/plugins/adminlte/plugins/iCheck/square/blue")?>
    <?php echo $this->Html->css("style");?>
    <?php echo $this->fetch('css');?>
    <style>
    /* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  src: local('Montserrat-Bold'), url(<?= Router::url('/fonts/Montserrat.woff2')?>) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
    .logo-login{
      font-family: 'Montserrat', sans-serif;
    }

    .bg-white{
      /*background: #fff;*/
      /*height: 100px;*/
    }
    /*body{
      background: url(http://unieccampus.unitar.my/assets/bg-pg-public-small.jpg) no-repeat;
    }*/
  </style>
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">

    <div class="wrapper">

      <?php //echo $this->element('hani/header');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container-fluid" style="height:100%;">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="login-logo row">
              <div class="col-md-4">
                  <a href="<?php echo Routed::url('/');?>"><?php echo $this->Html->image('/img/unitar_logo.png', [
                    'width'=> '50%',
                    ]);?></a>
                </div>
                <div class="col-md-4" class='logo-login'>&nbsp;</div>
                <!-- <div class="col-md-4" class='logo-login'><b>UNIEC CAMPUS</b></div> -->
                <div class="col-md-4">
                    <?php echo $this->Html->image('/img/uniec_logo.png');?>
                </div>
              </div>
            </div>
          </section>

          <!-- Main content -->
          <section class="content">
            <?php echo $this->Flash->render('flash'); ?>
            <div class="row">
              <div class="col-md-1 hidden-xs"></div>
              <div class="col-md-5 hidden-xs" id="twitter"></div>
              <div class="col-md-1 hidden-xs"></div>

              <div class="col-md-3 col-xs-12">
                <?php echo $this->fetch('content');?>
              </div>
              <div class="col-md-2"></div>
            </div>

          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
    <?php echo $this->element('hani/footer');?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <?php echo $this->Html->script("/components/jquery/dist/jquery.min", array('inline'=>true))?>
    <!-- Bootstrap 3.3.5 -->
    <?php echo $this->Html->script("/components/bootstrap/dist/js/bootstrap.min", array('inline'=>true))?>
<!-- iCheck -->
<?php echo $this->Html->script("/plugins/adminlte/plugins/iCheck/icheck.min.js", array('inline'=>true))?>
<!-- buffer -->
<?php $this->Js->buffer("$('input').iCheck({checkboxClass: 'icheckbox_square-blue',radioClass: 'iradio_square-blue',increaseArea: '20%'});");?>

    <!-- jQuery + bootstrap + DataTables -->
    <?php /*echo $this->Html->script("/plugins/jquery-datatables/media/js/jquery.DataTables", array('inline'=>true))?>
    <?php echo $this->Html->script("/plugins/adminlte/plugins/datatables/dataTables.bootstrap.min", array('inline'=>true))?>
    <?php echo $this->Html->script("/plugins/adminlte/plugins/datatables/dataTables.bootstrap.min", array('inline'=>true))*/?>
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
    <?php echo $this->Html->script("/plugins/srobbin/jquery-backstretch/jquery.backstretch.min", array('inline'=>true))?>

    <script>
    (function(){
      var pad = 5;//213
      var checkwindow = function(){
        var bt = 225;
        var h = $(window).height();
        return h-bt;
      };
      var rh = checkwindow();
      var root = document.getElementById("twitter");
      root.setAttribute("style","height:"+rh+"px;");
      rh-=pad;
      var a = document.createElement("a");
      a.setAttribute("height",rh+"px");
      a.setAttribute("data-chrome","nofooter");
      a.setAttribute("data-aria-polite","assertive");
      a.setAttribute("class","twitter-timeline");
      a.setAttribute("data-dnt","true");
      a.setAttribute("href","https://twitter.com/UNITARofficial");
      a.setAttribute("data-widget-id","641934576445583360");
      a.innerHTML = "Tweets by @UNITARofficial";
      root.appendChild(a);
      window.onresize = function(){
        var nrh = checkwindow();
        root.setAttribute("style","height:"+nrh+"px;");
        nrh-=pad;
        $("#twitter iframe").css("height",nrh+"px");
      };
      $(".content").backstretch([
           "<?=Router::url("/img/login1.jpg")?>",
           "<?=Router::url("/img/login2.jpg")?>",
           "<?=Router::url("/img/login3.jpg")?>",
           "<?=Router::url("/img/login4.jpg")?>"
         ], {duration: 5000,fade:"slow"}
       );
    })();

    </script>
    <?php $this->Js->buffer("$(\".colorBoxIframe\").colorbox({width:\"80%\", height:\"80%\"});");?>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    <?php (isset($display_for_view))?$this->Js->buffer("$(\"input\").prop('disabled',true)"):'';?>
    <?php echo $this->Js->writeBuffer();?>

  </body>
</html>
