<div class="widget">

    <!-- Widget heading -->
    <div class="widget-head"><h4 class="heading"><?php echo $title_for_layout?></h4></div>
    <!-- // Widget heading END -->
    <div class="widget-body innerAll">
        <!-- Row -->
        <div class="row">
          <?php 		echo $this->Form->input('Princess.id');?>
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessName">Princess Name</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.name',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessParlimen">Princess Parlimen</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.parlimen',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessParliamentId">Princess Parliament Id</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.parliament_id',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessDun">Princess Dun</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.dun',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessDunId">Princess Dun Id</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.dun_id',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessDunUndi">Princess Dun Undi</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.dun_undi',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessDunVoteId">Princess Dun Vote Id</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.dun_vote_id',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessCaw">Princess Caw</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.caw',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessBranchId">Princess Branch Id</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.branch_id',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessAgeId">Princess Age Id</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.age_id',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessVote">Princess Vote</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.vote',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessMember">Princess Member</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.member',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		
            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="PrincessStatus">Princess Status</label>
                    <div class="col-md-8">
                      <?php 		echo $this->Form->input('Princess.status',array('label'=>'','between'=>'<div class="col-md-12">'));?>                    </div>
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
