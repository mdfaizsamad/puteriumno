<?php
if (!$this->request->bare) {
    $api_for_layout = $this->element('api');
    $sidebar_for_layout = $this->element('sidebar');
} else {
    $api_for_layout = "";
    $sidebar_for_layout = "";
}
$content_for_layout = $this->fetch('content');
?>
<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->Html->css(array('cake.generic', 'bootstrap', 'font-awesome.min','jquery-colorbox'));

        if ((isset($this->viewVars['debugToolbarPanels'])))
            echo $this->Html->script('DebugKit.js_debug_toolbar', array());
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
      WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
        <?php echo $api_for_layout; ?>
        <title>
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $api_for_layout;
        ?>
        <style>
      /*{iframe:true, width:"80%", height:"80%"}*/
        #colorbox{
          z-index: 1040;
        }
        #cboxOverlay{
          z-index: 1039;
        }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <?php echo $this->element('nav_bar'); ?>
            <?php echo $sidebar_for_layout; ?>

            <div id="content" class='container-fluid' style="padding-top: 66px;">

                <div class='row'>
                    <?php echo $this->Flash->render('flash'); ?>
                </div>
                <div class='row'>
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
            <!-- <div id="footer">
            <?php
            echo $this->Html->link(
                    $this->Html->image('cake.power.gif', array('border' => '0')), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)
            );
            ?>
            </div> -->
        </div>
        <?php // $this->element('sql_dump');    ?>
        <?php
        //$this->Js->buffer();

        if (method_exists($this->Html, 'requirejs')) {
          ?>
          <script>
          require(['jquery',"jquery-colorbox"], function($) {
            $("#MagnificPopupAddID").colorbox({
              'width':"80%",
              onOpen: function() {
        // make the overlay visible and re-add all it's original properties!
                  $('#cboxOverlay').css({
                      'visibility': 'visible',
                      'opacity':0.5,
                      'cursor': 'pointer',
                      'background':'black',
                  });
                  $('#colorbox').css({ 'visibility': 'visible' }).fadeIn(1000);
              }
            });
          });
            </script>
          <?php
            echo $this->Html->requirejs();
        }
        ?>
    </body>
</html>
