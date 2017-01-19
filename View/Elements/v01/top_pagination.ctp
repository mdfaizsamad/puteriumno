<?php $this->append('top_bar_left');?>
<?php

$urls = $data_for_top_pagination;
if (!isset($current)) {
    $current = 0;
}
 ?>
<div class="row" style="padding-bottom:10px;">
  <div class='col-md-5'></div>
  <div class='col-md-5'>
    <?php if ($current > 0):?>
    <a href="<?php echo Router::url($urls[$current-1])?>" class="btn "><i class="fa fa-chevron-left"></i> </a>
  <?php else:?>
    <a class="btn " disabled><i class="fa fa-chevron-left"></i> </a>
  <?php endif;?>

  <?php foreach ($urls as $i => $url):?>
    <a href="<?php echo Router::url($url)?>" class="btn btn-<?=($current==$i)?"info":"default"?>"><?php echo $i+1?></a>
  <?php endforeach;?>
    <?php if ($current < count($urls)-1):?>
    <a href="<?php echo Router::url($urls[$current+1])?>" class="btn">  <i class="fa fa-chevron-right"></i></a>
  <?php else:?>
    <a class="btn " disabled><i class="fa fa-chevron-right"></i> </a>
  <?php endif;?>
  </div>
</div>


<?php $this->end();?>
