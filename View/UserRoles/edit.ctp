<div class="widget">

    <!-- Widget heading -->
    <div class="widget-head"><h4 class="heading"><?php echo 'Edit User Role'; ?></h4></div>
    <!-- // Widget heading END -->
    <div class="widget-body innerAll">
        <!-- Row -->
        <div class="row">
          <?php echo $this->Form->input('UserRole.id');?>
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">
                    <label class="col-md-4 control-label" for="UserRoleUserId">User</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('UserRole.user_id',array('label'=>'','options'=>$users,'between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>
      		
          <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="UserRoleRoleId">Role</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('UserRole.role_id',array('label'=>'','options'=>$roles,'between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

          <div class="col-md-12">
            <!-- Form actions -->
            <div class="col-md-5"></div>
            <div class="col-md-4">
              <div class="form-actions">
                <button id="FormOnSubmit" type="submit" name="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
                                <a  href="#" class="btn btn-default" id="FormOnCancel"><i class="fa fa-times"></i> Cancel</a>
              </div>
            </div>
            <div class="col-md-3"></div>
          <!-- // Form actions END -->
        </div>
            <!-- Column -->

            <!-- // Column END -->
    </div>
</div>
