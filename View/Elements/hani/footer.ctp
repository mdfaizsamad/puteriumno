<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <!-- <b>Version</b> 2.3.0 -->
    <strong>Copyright &copy; 2015<?php echo (2015<date("Y"))?"-".date("Y"):"";?> <a href="#">UNITAR</a>.</strong> All rights reserved.
  </div>
  <strong>&nbsp;</strong>
  <?php echo $this->element('sql_dump2'); ?>
</footer>


<?php


$this->Js->buffer("(function(){
  var resized = function () {
    var wh = $(window).height();
    if(wh > 717){
      $('.content').height(wh-170)
      var h = $('.content').height();
    }
  }
  // resized();
  // $(window).on('resize',resized);
})();");


 ?>
