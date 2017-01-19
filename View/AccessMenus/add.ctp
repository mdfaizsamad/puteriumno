<div class="widget">

    <!-- Widget heading -->
    <div class="widget-head"><h4 class="heading"><?php echo $title_for_layout?></h4></div>
    <!-- // Widget heading END -->
    <div class="widget-body innerAll">
        <!-- Row -->
        <div class="row">

            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="AccessMenuAccessRouteId">AccessMenu Access Route Id</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('AccessMenu.access_route_id',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="AccessMenuParentId">AccessMenu Parent Id</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('AccessMenu.parent_id',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="AccessMenuIcon">AccessMenu Icon</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('AccessMenu.icon',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="AccessMenuName">AccessMenu Name</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('AccessMenu.name',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="AccessMenuEnabled">AccessMenu Enabled</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('AccessMenu.enabled',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="AccessMenuRoles">AccessMenu Roles</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('AccessMenu.roles',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="AccessMenuLft">AccessMenu Lft</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('AccessMenu.lft',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>


            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="AccessMenuRght">AccessMenu Rght</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('AccessMenu.rght',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		          <div class="col-md-12">

            <!-- Form actions -->
            <div class="col-md-5"></div>
            <div class="col-md-4">
              <div class="form-actions">
                <button id="FormOnSubmit" type="submit" name="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
                                <a  href="<?php echo Routed::url(array('controller'=>'access_menus','action'=>'index'));?>" class="btn btn-default" id="FormOnCancel"><i class="fa fa-times"></i> Cancel</a>
              </div>
            </div>
            <div class="col-md-3"></div>
          <!-- // Form actions END -->
        </div>
            <!-- Column -->

            <!-- // Column END -->
    </div>
</div>
