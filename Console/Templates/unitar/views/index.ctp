<?php
$noneed = array('id','creator_id','created','modifier_id','modified');
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-title col-md-11">
          <?php
            echo '<?php echo $this->Form->create(\''.ucfirst($singularVar).'\',array("type"=>"get","id"=>"IndexForm"))?>';
            $form_value = '<?php echo (isset($this->request->query["table_search"]))?$this->request->query["table_search"]:"";?>';
          ?>
          <div class="input-group">

            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" value="<?php echo $form_value;?>">
            <div class="input-group-btn">
              <button type='submit' class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
            <?php echo '<?php echo $this->Form->end();?>';?>
          </div>
        </div>
        <?php $add = '<?php echo Routed::url(array(\'controller\'=>\'school_subjects\',\'plugin\'=>null,\'action\'=>\'add\'));?>';?>
        <div class="box-tools col-md-1">
            <a href="<?php echo $add;?>" class="btn btn-info colorBoxIframe"><i class="fa fa-plus text-faded"></i>&nbsp;Add </a>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <?php
              foreach ($fields as $field):
                 if (in_array($field,$noneed)) continue;?>
                  <th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
              <?php endforeach; ?>
                  <th class="left">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php echo sprintf("<?php foreach ($%s as $%s): ?>\n",$pluralVar,$singularVar);?>
              <tr>
            <?php
                foreach ($fields as $field) :
                if (in_array($field,$noneed))continue;
                $view = "<?php echo Routed::url(array('action'=>'view',\${$singularVar}['$modelClass']['$primaryKey']))?>";
                $isKey = false;
              	if (!empty($associations['belongsTo'])) :
              	   foreach ($associations['belongsTo'] as $alias => $details) :
                     if ($field === $details['foreignKey']) :
                       $isKey = true;
                ?>
                  <td class='center text-inverse'>
                      <?php
                      echo "<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>";
                      echo "\n";
                      ?>
                  </td>
                <?php
                       break;
                     endif;
                   endforeach;
                 endif;
                 if($field ==='name'):?>
                  <td><a href="<?php echo $view;?>"><?php echo '<?php echo h($'.$singularVar.'["'.$modelClass.'"]["'.$field.'"]); ?>';?></a></td>
                 <?php
          			elseif ($isKey !== true) :?>
          				<td><?php echo '<?php echo $'.$singularVar.'["'.$modelClass.'"]["'.$field.'"]; ?>';?>&nbsp;</td>
                 <?php
               endif;?>
          <?php endforeach;?>
          <td style='min-width:186px;'>
            <?php $edit = "<?php echo Routed::url(array('action'=>'edit',\${$singularVar}['$modelClass']['$primaryKey']))?>";?>
            <?php $delete = "<?php echo Routed::url(array('action'=>'delete',\${$singularVar}['$modelClass']['$primaryKey']))?>";?>
            <a href="<?php echo $edit;?>" class="btn btn-success btn-xs colorBoxIframe"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
            <a href="<?php echo $delete;?>"  class="btn btn-danger btn-xs colorBoxIframe"><i class="fa fa-eraser"></i> Delete</a>
          </td>
        </tr>
  <?php echo "\t\t<?php endforeach; ?>";?>
        </tbody></table>
      </div><!-- /.box-body -->
      <div class="box-footer clearfix">
        <?php echo '<?php echo $this->Html->pagination();?>';?>
      </div>
    </div><!-- /.box -->
  </div>
</div>
