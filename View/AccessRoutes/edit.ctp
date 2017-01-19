<div class="widget">

    <!-- Widget heading -->
    <div class="widget-head"><h4 class="heading"><?php echo 'Create New Access Route'?></h4></div>
    <!-- // Widget heading END -->
    <div class="widget-body innerAll">
      <?=$this->Form->create("AccessRoute", ['type'=>'post']);?>
        <!-- Row -->
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4">
              <?php  echo $this->Form->col('AccessRoute.id', ['type'=>'text', 'label'=>'URL']);?>
          </div>
            <div class="col-md-4">
                <!-- Group -->
                <?php  echo $this->Form->col('AccessRoute.name');?>
                <!-- // Group END -->
          </div>
          <div class="col-md-2"></div>
        </div>
        <div class="row">
          <div class="col-md-4">
                <!-- Group -->
                <?php  echo $this->Form->col('AccessRoute.plugin');?>
                <!-- // Group END -->
          </div>


          <div class="col-md-4">
                <!-- Group -->
                <?php  echo $this->Form->col('AccessRoute.controller');?>
                <!-- // Group END -->
          </div>


            <div class="col-md-4">
                <!-- Group -->
                <?php  echo $this->Form->col('AccessRoute.action');?>
                <!-- // Group END -->
          </div>
        </div>
          <div class='row'>
            <div class="col-md-4">
                <!-- Group -->
                <?php  echo $this->Form->yesno('AccessRoute.public');?>
                <!-- // Group END -->
            </div>
            <div class="col-md-4">
                <!-- Group -->
                <?php  echo $this->Form->yesno('AccessRoute.owner_only');?>
                <!-- // Group END -->
            </div>
            <div class="col-md-4">
                <!-- Group -->
                <?php  echo $this->Form->yesno('AccessRoute.active');?>
                <!-- // Group END -->
            </div>
          </div>

          <div class="row">
                    <label class="col-md-2 control-label" for="AccessRouteRoles">Roles</label>
                    <div class="col-md-8" style='overflow:auto;'>
                        <?php
                        $thead = "";
                        $tbody = "";
                        $allow = @$this->request->data['AccessRoute']['roles'];
                        if (empty($allow)) {
                            $allow = [];
                        }
                        foreach ($roles as $i=>$role) {
                            $thead.=sprintf("<th>%s</th>", $role);
                            $checked = (in_array($i, $allow))?"checked":"";
                            $tbody.="<td><div class='checkbox-roles'><input type='checkbox' name='data[AccessRoute][roles][]' value='$i' $checked></div></td>";
                        }?>
                        <table class="table table-bordered table-hover"><thead><tr><?=$thead;?></tr></thead><tbody><tr><?=$tbody;?></tr></tbody></table>
                </div>
                <div class="col-md-2"></div>

                <!-- // Group END -->
          </div>
          <div class="row">
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
            <?= $this->Form->end();?>
    </div>
</div>
