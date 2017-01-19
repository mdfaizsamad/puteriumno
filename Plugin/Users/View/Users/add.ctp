<div class="widget">

    <!-- Widget heading -->
    <div class="widget-head"><h4 class="heading"><?php echo $title_for_layout?></h4></div>
    <!-- // Widget heading END -->
    <div class="widget-body innerAll">
        <?php echo $this->Form->create() ?>
        <!-- Row -->
        <div class="row">

            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="UserUsername">User Username</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('User.username',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="UserPassword">User Password</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('User.password',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="UserEmail">User Email</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('User.email',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="UserLastSeen">User Last Seen</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('User.last_seen',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="UserPhoneNo">User Phone No</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('User.phone_no',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="UserAddress">User Address</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('User.address',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="UserUserRoleId">User Role</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('User.user_role_id',array('label'=>'','between'=>'<div class="col-md-12">', 'empty' => '--Please Select--', 'options' => $roles));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

          <div class="col-md-6">
              <!-- Group -->
              <div class="form-group row">

                  <label class="col-md-4 control-label" for="UserStudyCentreId">Study Centre</label>
                  <div class="col-md-8">
                    <?php echo $this->Form->input('User.study_centre_id',array('label'=>'','between'=>'<div class="col-md-12">', 'empty' => '--Please Select--', 'options' => $study_centres));?>                    </div>
              </div>
              <!-- // Group END -->
        </div>

      <!-- <div class="col-md-6"> -->
                <!-- Group -->
                <!-- <div class="form-group row">

                    <label class="col-md-4 control-label" for="UserActive">User Active</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('User.active',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div> -->
                <!-- // Group END -->
          <!-- </div> -->

      		          <div class="col-md-12">

            <!-- Form actions -->
            <div class="col-md-5"></div>
            <div class="col-md-4">
              <div class="form-actions">
                <button id="FormOnSubmit" type="submit" name="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
                <a  href="<?php echo Routed::url(array('action'=>'index'));?>" class="btn btn-default" id="FormOnCancel"><i class="fa fa-times"></i> Cancel</a>
              </div>
            </div>
            <div class="col-md-3"></div>
          <!-- // Form actions END -->
        </div>
          <?php echo $this->Form->end() ?>
            <!-- Column -->

            <!-- // Column END -->
    </div>
</div>
