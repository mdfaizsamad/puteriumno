<div class="widget">

    <!-- Widget heading -->
    <div class="widget-head"><h4 class="heading"><?php echo '<?php echo $title_for_layout?>'?></h4></div>
    <!-- // Widget heading END -->
    <div class="widget-body innerAll">
        <!-- Row -->
        <div class="row">
          <?php
      		foreach ($fields as $field) :
            $camelcaseField = Inflector::camelize($field);
            $id = $modelClass.$camelcaseField;
            if (strpos($action, 'add') !== false && $field === $primaryKey || in_array($field, array('modifier_id','creator_id','created', 'modified', 'updated'))) {
      				continue;
      			}else if ($field === $primaryKey){
              echo "<?php \t\techo \$this->Form->input('{$modelClass}.{$field}');?>";
              continue;
            }
            ?>

            <div class="col-md-6">
                <!-- Group -->
                <div class="form-group row">

                    <label class="col-md-4 control-label" for="<?php echo $id?>"><?php echo $modelClass." ".Inflector::humanize($field)?></label>
                    <div class="col-md-8">
                      <?php	echo "<?php \t\techo \$this->Form->input('{$modelClass}.{$field}',array('label'=>'','between'=>'<div class=\"col-md-12\">'));?>";?>
                    </div>
                </div>
                <!-- // Group END -->
          </div>

      		<?php endforeach;

      		if (!empty($associations['hasAndBelongsToMany'])) {
      			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) :?>
                <div class="col-md-6">
                  <!-- Group -->
                  <div class="form-group row">
                      <label class="col-md-4 control-label" for="<?php echo $id?>"><?php echo $modelClass." ".Inflector::humanize($assocName)?></label>
                      <div class="col-md-8">
                          <div class="input text">
                            <?php echo "<?php \t\techo \$this->Form->input('{$assocName}',array('label'=>'','between'=>'<div class=\"col-md-12\">'));?>";?>
                        </div>
                    </div>
                  <!-- // Group END -->
                </div>
              </div>
      	<?php		endforeach;
        }
          ?>
          <div class="col-md-12">

            <!-- Form actions -->
            <div class="col-md-5"></div>
            <div class="col-md-4">
              <div class="form-actions">
                <button id="FormOnSubmit" type="submit" name="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
                <?php
                  $index = '<?php echo Router::url(array(\'action\'=>\'index\'))?>';
                 ?>
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
