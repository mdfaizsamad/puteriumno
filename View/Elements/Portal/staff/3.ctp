<div align='right'>

    <a href="<?php echo Routed::url(array('controller'=>'portal','action'=>'search_schedule'))?>" class="btn btn-xs btn-warning colorBoxIframe"><i class="fa fa-search"></i>&nbsp;Search </a>

</div>

<?php if($search == false){  ?>

<div class="box">
  <div class="box-body">
    <div align='center'>
      <h4><i>Please search your class schedule..</i><h4>
    </div>
  </div>
</div>

<?php }else{ ?>

<div class='panel'>
  <div class='row' style="margin:10px">

  </div>
  <div class='row' style="margin:10px">
    <div class="col-md-12" style='border:0px solid blue' >
      <?php
      // debug($calendar);
      // die;
        // $now = date('Y-m-d H:i');
        // // debug($now);
        // $now1 = strtotime('+7 day',$now);
        // // debug(date('Y-m-d',$now1));
        // echo h(CakeTime::isToday($now));
        //
        // $kakfaz =[
        //       'title'=>"Hari Kak faz jadi critters!!",
        //       'start'=>$now,
        //      // 'end'=>date('Y-m-d H:i',strtotime('+1 day')),
        //       'end'=>'2016-04-25 00:00',
        //       'id'=>'@fazlone',
        //       'url'=>"http://localhost"
        //   ];
        // $data = [];
        // for($i=0;$i<2;$i++){
        //   $data[]=$kakfaz;
        // }
        echo $this->Html->calendar($calendar);
      ?>
    </div>
  </div>
</div>

<?php } ?>
