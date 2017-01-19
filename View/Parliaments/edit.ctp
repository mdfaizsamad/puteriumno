<div class="widget">

    <!-- Widget heading -->
    <div class="widget-head"><h4 class="heading"><?php echo $title_for_layout?></h4></div>
    <!-- // Widget heading END -->
    <div class="widget-body innerAll">
        <!-- Row -->
        <div class="row">
          <?php 		echo $this->Form->input('Parliament.id');?>
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="ParliamentCode">Parliament Code</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Parliament.code',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="ParliamentParliament">Parliament Parliament</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Parliament.parliament',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="ParliamentStatus">Parliament Status</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Parliament.status',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
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
