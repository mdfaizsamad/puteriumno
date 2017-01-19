<?= $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js', ['inline'=>false]);?>
<div class="widget">

    <!-- Widget heading -->
    <div class="widget-head"><h4 class="heading"><?php echo $title_for_layout?></h4></div>
    <!-- // Widget heading END -->
    <div class="widget-body innerAll">
        <!-- Row -->
        <?=$this->Form->create('AccessMenu', ['type'=>'post']);?>
        <?php         echo $this->Form->input('AccessMenu.id');?>

        <div class="row">
            <div class="col-md-5">
              <?= $this->Form->dropdown('AccessMenu.access_route_id', ['label'=>'Route', 'options'=>$routes]);?>
                <!-- // Group END -->
          </div>


            <div class="col-md-5">
              <?= $this->Form->col('AccessMenu.parent_id', ['label'=>'Parent Menu']);?>
          </div>


            <div class="col-md-2">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="AccessMenuIcon">Icon</label>
                    <div class="col-md-6">
                      <?php
                        $icon = (!empty($this->request->data['AccessMenu']['icon']))?h($this->request->data['AccessMenu']['icon']):'circle-o';
                       ?>
                     <div class="btn-group bootstrap-select" style="width: 100%;">
                       <input type="hidden" name="data[AccessMenu][icon]" value="<?=$icon?>" />
                       <button type="button" class="btn dropdown-toggle btn-default" title="" id='icon_target'>
                         <span class="filter-option pull-left">
                           <span>
                             <i class="fa fa-<?=$icon?>"></i>
                           </span>
                         </span>&nbsp;
                       </button>
                     </div>
                      <ul id='selectpicker' class="dropdown-menu inner" style="max-height: 260px; overflow-y: auto;">
                         <li>
                           <?php foreach (FontAwesome::$icon as $icon):?>
                             <a class='selectpicker_values' data-value=<?=$icon?>><span><i class="fa fa-<?=$icon?>"></i></span></a>
                           <?php endforeach;?>
                        </li>
                      </ul>
                   </div>
                     <?php
                     $this->Js->buffer('
                      $( "#icon_target" ).on("click",function(){$("#selectpicker").show();});
                      $(".selectpicker_values").on("click",function(){
                        $("#icon_target > span").html($(this).html());
                        $("#selectpicker").hide();
                        $("input[name=\"data[AccessMenu][icon]\"]").val($(this).attr("data-value"));
                      });
                     ');
                     ?>
                </div>
                <!-- // Group END -->
          </div>
        </div>
        <div class="row">

            <div class="col-md-6">
                <?=$this->Form->col('AccessMenu.name');?>
                <!-- // Group END -->
              </div>

            <div class="col-md-6">
              <?=$this->Form->yesno("AccessMenu.enabled");?>
            </div>
          </div>
          <div class="row">
                    <label class="col-md-2 control-label" for="AccessMenuRoles">Roles</label>
                    <div class="col-md-8" style='overflow:auto;'>
                        <?php
                        $thead = "";
                        $tbody = "";
                        $allow = @$this->request->data['AccessMenu']['roles'];
                        if (empty($allow)) {
                            $allow = [];
                        }
                        foreach ($roles as $i=>$role) {
                            $thead.=sprintf("<th>%s</th>", $role);
                            $checked = (in_array($i, $allow))?"checked":"";
                            $tbody.="<td><div class='checkbox-roles'><input type='checkbox' name='data[AccessMenu][roles][]' value='$i' $checked></div></td>";
                        }?>
                        <table class="table table-bordered table-hover"><thead><tr><?=$thead;?></tr></thead><tbody><tr><?=$tbody;?></tr></tbody></table>
                </div>
                <div class="col-md-2"></div>

                <!-- // Group END -->
          </div>
          <div class="row" style='margin-top:10px'>
            <!-- Form actions -->
            <div class="col-md-5"></div>
            <div class="col-md-4">
              <div class="form-actions">
                <button id="FormOnSubmit" type="submit" name="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
                <a  href="<?php echo Routed::url(array('controller'=>'access_menus','action'=>'index'));?>" class="btn btn-default" id="FormOnCancel"><i class="fa fa-times"></i> Cancel</a>
              </div>
            </div>
            <div class="col-md-3"></div>

                <!-- Column -->

                <!-- // Column END -->

<!-- // Form actions END -->
  <?=$this->Form->end();?>
    </div>
</div>
