<style>
.info-box {
  min-height: 50px;
}
.info-box-icon {
    height: 50px;
    font-size: 40px;
    line-height: 50px;
}
.info-box-content{
  line-height: 40px;
}
</style>
<?php

$url = Router::url('/portal/student_info');
$options[] = [
  "size"=>2,
  "bg"=>($current === 1)?'aqua':'gray',
  "icon"=>"user",
  "title"=>"Personal",
  'url'=>"$url?page=1"
];
$options[] = [
  "size"=>2,
  "bg"=>($current === 2)?'green':'gray',

  "icon"=>"university",
  "title"=>"Academic",
  'url'=>"$url?page=2"
];
$options[] = [
  "size"=>2,
  "bg"=>($current === 3)?'yellow':'gray',
  "icon"=>"money",
  "title"=>"Finance",
  //'url'=>"$url?page=3",
  'url'=>''
];
$options[] = [
  "size"=>2,
  "bg"=>($current === 4)?'red':'gray',
  "icon"=>"info-circle",
  "title"=>"Others",
  //'url'=>"$url?page=4",
  'url'=>''
];
$options[] = [
  "size"=>3,
  "bg"=>($current === 5)?'purple':'gray',
  "icon"=>"clipboard",
  "title"=>"Online Request Form",
  'url'=>"$url?page=5" ,
  // 'url'=>''
];
?>
<div class='panel'>
  <div class="panel-body" style='background: #F7F3F3;padding-bottom: 0px;'>
<div class="row">
  <?php foreach ($options as $option):?>
        <div class="col-md-<?=$option['size']+1?> col-sm-<?=$option['size']+1?> col-xs-6">
          <div class="info-box">
            <a href="<?=$option['url']?>">
            <span class="info-box-icon bg-<?=$option['bg']?>"><i class="fa fa-<?=$option['icon']?>"></i></span>

            <div class="info-box-content hidden-sm hidden-xs">
              <span class="info-box-number"><?=$option['title']?></span>
            </div>
          </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
<?php endforeach;?>
      </div>
    </div>
</div>
