<ul  style='padding-top:1px;list-style-type: none;background: #fafafa;border-bottom: 1px solid #dddddd;margin-bottom: 20px;'>
  <li>
      <h1 style="webkit-font-smoothing: antialiased !important; color: #908E8E;text-shadow: 0px 1px 1px #fff;"><?php echo strtoupper($title_for_layout);?></h1>
    <?php
if (isset($breadcrumb_for_layout)):?>
    <ul class='breadcrumb' style='background-color:transparent; webkit-font-smoothing: antialiased !important; color: #aaa;text-shadow: 0px 1px 1px #fff;'>
      <?php
      $maxi = count($breadcrumb_for_layout)-1;
      foreach ($breadcrumb_for_layout as $i => $breadcrumb):

        $breadcrumb_icon = !empty($breadcrumb['icon'])?$breadcrumb['icon']:'circle-o';
        $content = "<i class='fa fa-$breadcrumb_icon'></i>&nbsp;".h($breadcrumb['name']);
        ?>

      <li><?=$content?></li>
    <?php endforeach;?>
    </ul>
<?php endif;?>
  </li>
  <li>
    <?php echo $this->fetch('top_bar_left');?>
  </li>
</ul>
