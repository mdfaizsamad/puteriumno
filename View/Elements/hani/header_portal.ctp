<?php
$User = CakeSession::read('Auth.User');
 ?>
<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="<?php echo Routed::url('/')?>" class="navbar-brand"><b>UNIEC</b>&nbsp; CAMPUS</a>

      </div>
         <div class="navbar-custom-menu right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                    <?php if($User['user_role_id']==Role::Student): ?>
                      <span class="hidden-xs"><?php echo $User['matric_no'];?></span>
                    <?php else: ?>
                      <span class="hidden-xs"><?php echo $User['username'];?></span>
                    <?php endif; ?>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header" style="min-height:50px; height:90px;">
                      <?php // echo $this->Html->image('/plugins/adminlte/dist/img/user2-160x160.jpg',array('class'=>"img-circle",'alt'=>"User Image"));?>
                      <p>
                        <?php 
                          if($User['user_role_id']==Role::Student):
                            echo h($User['matric_no']);
                          else:
                            echo h($User['username']);
                          endif;

                          App::uses('CakeTime', 'Utility');
                          $last_seen =  CakeTime::timeAgoInWords($User['last_seen']);
                        ?>
                        <small>Last seen on <?php echo date('d-M-Y h:i',strtotime(h($User['last_seen'])));?></small>
                      </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                        <ul class="list-unstyled">
                          <?php if(Role::isUserInRole(Role::Student)) : ?>
                            <li><a href="http://unieccampusv2.unitar.my/uploads/documents/predmission_applicant_manual.pdf" target="_blank">Preadmission Manual</a></li>
                            <li><a href="http://unieccampusv2.unitar.my/uploads/documents/User_s_Manual_Academic_Student_-_Pre_Course.pdf" target="_blank">PreCourse Registration Manual(Student)</a></li>
                          <?php else : ?>
                            <li><a href="http://unieccampusv2.unitar.my/uploads/documents/predmission_applicant_manual.pdf" target="_blank">Preadmission Manual</a></li>
                            <li><a href="http://unieccampusv2.unitar.my/uploads/documents/User_s_Manual_Academic_Student_-_Pre_Course.pdf" target="_blank">PreCourse Registration Manual(Student)</a></li>
                            <li><a href="http://unieccampusv2.unitar.my/uploads/documents/contact_management_manual_mktg_stff.pdf" target="_blank">Contact Management Manual(Marketing Staff)</a></li>
                            <li><a href="http://unieccampusv2.unitar.my/uploads/documents/contact_management_manual_mktg_manager.pdf" target="_blank">Contact Management Manual(Marketing Manager)</a></li>
                            <li><a href="http://unieccampusv2.unitar.my/uploads/documents/registration_adm_staff_manual.pdf" target="_blank">Registration Manual(Admission Staff)</a></li>
                            <li><a href="http://unieccampusv2.unitar.my/uploads/documents/registration_adm_mgr_manual.pdf" target="_blank">Registration Manual(Admission Manager)</a></li>
                            <li><a href="http://unieccampusv2.unitar.my/uploads/documents/registration_fin_staff_manual.pdf" target="_blank">Registration Manual(Finance)</a></li>
                          <?php endif; ?>
                          <!-- <li><a href="#">Profile</a></li>
                          <li><a href="#">Academic</a></li> -->
                        </ul>
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
            </ul>
          </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <?php
        $user_role_id = $this->Session->read('Auth.User.user_role_id');
        if (false):

        ?>

        <ul class="nav navbar-nav">

          <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li> -->

        </ul>
        <form class="navbar-form navbar-left" role="search">
          <!-- <div class="form-group">
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
          </div> -->
        </form>
      </div><!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">



          </ul>
          <?php endif;?>
        </div><!-- /.navbar-custom-menu -->
    </div><!-- /.container-fluid -->
  </nav>
</header>
