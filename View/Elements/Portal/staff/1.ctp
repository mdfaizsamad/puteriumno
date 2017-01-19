<style>
.widget-user .widget-user-header {
    height: 60px;
}
.widget-user .widget-user-image {
    top: 0px;
}
</style>


<div class="pull-right">
  <a width='100%' href="#" align='center' class="btn-sm btn-warning colorBoxIframe" id="add_subject">Update</a>
</div><br>
<div class="row">
            <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green-active">
              <!-- <h3 class="widget-user-username">Alexander Pierce</h3>
              <h5 class="widget-user-desc">Founder &amp; CEO</h5> -->
            </div>
            <div class="widget-user-image">
              <!-- <img class="img-circle" src="https://auth.unitar.my/img/no_user_search.png" alt="User Avatar"> -->
              <?php
              $src = "https://auth.unitar.my/img/no_user_search.png";
//              if(@getimagesize($src)) {
//                  $src = "gambar yg sepatotnye";
//              }
              echo $this->Html->image($src, ['class'=>'img-circle']);?>
            </div>
      <?php
            $fullname = ($staff_info['LecturerMaster']['fullname']!='')?$staff_info['LecturerMaster']['fullname']:'';
            $ic_ppt_no = ($staff_info['LecturerMaster']['ic_ppt_no']!='')?$staff_info['LecturerMaster']['ic_ppt_no']:'';
            $staff_no = ($staff_info['LecturerMaster']['lecturer_staff_no']!='')?$staff_info['LecturerMaster']['lecturer_staff_no']:'';

      ?>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="row">
                    <div class="description-block">
                      <h5 class="description-header">Name</h5>
                      <span class="description-text"><?= h($fullname) ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="description-block">
                      <h5 class="description-header">IC / Passport Number</h5>
                      <span class="description-text"><?= h($ic_ppt_no) ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="description-block">
                      <div class="description-block">
                        <h5 class="description-header">Staff Number</h5>
                        <span class="description-text"><?= h($staff_no) ?></span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">Address</h5>
                      <span class="description-text">

                        <span><i>NO DATA</i></span></br>

                      </span>
                  </div>


                <!-- /.col -->
              </div>
              <?php $email = ($_SESSION['Auth']['User']['email'] != '')?$_SESSION['Auth']['User']['email']:"<i>No data</i>" ?>
              <?php $phone = ($_SESSION['Auth']['User']['phone_no'] != '')?$_SESSION['Auth']['User']['phone_no']:"<i>No data</i>" ?>

              <!-- /.col -->
              <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Email</h5>
                    <span class="description-text">
                      <span><?= $email ?></span></br>

                    </span>
                  <div class="description-block">
                    <h5 class="description-header">Phone</h5>
                    <span class="description-text">
                      <span><?= $phone ?></span></br>

                    </span>
                </div>

              <!-- /.description-block -->
            </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
          </div>
        </div>

        
