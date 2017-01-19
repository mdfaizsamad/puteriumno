<?php
$User = CakeSession::read('Auth.User');

 ?>
<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
    <span class="hidden-xs"><?php echo $User['username'];?></span>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header" style="min-height:50px; height:90px;">
      <?php // echo $this->Html->image('/plugins/adminlte/dist/img/user2-160x160.jpg',array('class'=>"img-circle",'alt'=>"User Image"));?>
      <p>
        <?php echo h($User['username']);
          App::uses('CakeTime', 'Utility');
          $last_seen =  CakeTime::timeAgoInWords($User['last_seen']);
        ?>
        <small>Last seen on <?php echo date('d-M-Y h:i',strtotime(h($User['last_seen'])));?></small>
      </p>
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a href="#" class="btn btn-default btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <a href="<?php echo Routed::url('/users/logout');?>" class="btn btn-default btn-flat">Sign out</a>
      </div>
    </li>
  </ul>
</li>
