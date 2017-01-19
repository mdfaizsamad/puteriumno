<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-title col-md-11">
          <?php echo $this->Form->create('AccessRoute', array("url"=>"/access_routes", "type"=>"get", "id"=>"IndexForm"))?>
          <div class="input-group">
            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" value="<?php echo (isset($this->request->query["table_search"]))?$this->request->query["table_search"]:"";?>">
            <div class="input-group-btn">
              <button type='submit' class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
            <?php echo $this->Form->end();?>
          </div>
        </div>
                <div class="box-tools col-md-1">
            <a href="<?php echo Routed::url('/access_routes/add');?>" class="btn btn-info colorBoxIframe"><i class="fa fa-plus text-faded"></i>&nbsp;Add </a>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('id', 'URL'); ?></th>
                <th><?php echo $this->Paginator->sort('plugin'); ?></th>
                <th><?php echo $this->Paginator->sort('controller'); ?></th>
                <th><?php echo $this->Paginator->sort('action'); ?></th>
                <th><?php echo $this->Paginator->sort('public'); ?></th>
                <th><?php echo $this->Paginator->sort('owner_only'); ?></th>
                <th><?php echo $this->Paginator->sort('active'); ?></th>
                <th><?php echo $this->Paginator->sort('roles'); ?></th>
                <th class="left">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($accessRoutes as $accessRoute):
                            $id = $accessRoute['AccessRoute']['id'];
                            $label = "<a data-bind='click:function(){var type = \"%s\";var id=\"$id\";}' class='label label-%s'><i class='fa fa-%s'></i></a>";
                            ?>
              <tr>
                <td><?php echo h($accessRoute["AccessRoute"]["name"]); ?></td>
                <td><?php echo h($accessRoute["AccessRoute"]["id"]); ?>&nbsp;</td>
         				<td><?php echo (!empty($accessRoute["AccessRoute"]["plugin"]))?$accessRoute["AccessRoute"]["plugin"]:"-"; ?>&nbsp;</td>
         				<td><?php echo $accessRoute["AccessRoute"]["controller"]; ?>&nbsp;</td>
         				<td><?php echo $accessRoute["AccessRoute"]["action"]; ?>&nbsp;</td>
         				<td><?php echo ($accessRoute["AccessRoute"]["public"])?  sprintf($label, 'public', "success", "eye"):sprintf($label, 'public',  "danger", "eye-slash"); ?>&nbsp;</td>
         				<td><?php echo ($accessRoute["AccessRoute"]["owner_only"])? sprintf($label, 'owner', "primary", "user"):sprintf($label, 'owner', "info", "users"); ?>&nbsp;</td>
         				<td><?php echo ($accessRoute["AccessRoute"]["active"])? sprintf($label, 'active', "success", "check"):sprintf($label, 'active',  "warning", "close");?>&nbsp;</td>
								<td>
<?php foreach ($accessRoute["AccessRoute"]["roles"] as $role) : $role_name = $roles[$role]; echo "<span class='label label-primary'>$role_name</span> &nbsp";endforeach;?></td>
                                     <td style='min-width:186px;'>
                                    <a href="<?php echo Routed::url("/access_routes/edit?url=".urlencode($accessRoute['AccessRoute']['id']))?>" class="btn btn-success btn-xs colorBoxIframe"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
            <a href="<?php echo Routed::url("/access_routes/edit?url".urlencode($accessRoute['AccessRoute']['id']))?>"  class="btn btn-danger btn-xs"><i class="fa fa-eraser"></i> Delete</a>
          </td>
        </tr>
  		<?php endforeach; ?>        </tbody></table>
      </div><!-- /.box-body -->
      <div class="box-footer clearfix">
        <?php echo $this->Html->pagination();?>      </div>
    </div><!-- /.box -->
  </div>
</div>
