<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-title col-md-11">
          <?php echo $this->Form->create('UserRole',array("type"=>"get","id"=>"IndexForm"))?>          
          <div class="input-group">

              <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" value="<?php echo (isset($this->request->query["table_search"]))?$this->request->query["table_search"]:"";?>">
              <div class="input-group-btn">
                <button type='submit' class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
              </div>                     
          </div>
          <?php echo $this->Form->end();?> 
        </div>
        <div class="box-tools col-md-1">
            <a href="<?php echo Routed::url("/user_role/add");?>" class="btn btn-info colorBoxIframe"><i class="fa fa-plus text-faded"></i>&nbsp;Add </a>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
                <th width='60%'><?php echo $this->Paginator->sort('user_id'); ?></th>
                <th width='20%'><?php echo $this->Paginator->sort('role_id'); ?></th>
                <th class="left">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($userRoles as $userRole): ?>
              <tr>
                  <td class='center text-inverse'>
                      <?php echo $userRole['User']['username']; ?>
                  </td>
                  <td class='center text-inverse'>
                      <?php echo $userRole['Role']['name']; ?>
                  </td>
                  <td style='min-width:186px;'>
                      <a href="<?php echo Routed::url(array('action'=>'edit',$userRole['UserRole']['id']))?>" class="btn btn-success btn-xs colorBoxIframe"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                      <a href="<?php echo Routed::url(array('action'=>'delete',$userRole['UserRole']['id']))?>"  class="btn btn-danger btn-xs colorBoxIframe"><i class="fa fa-eraser"></i> Delete</a>
                  </td>
              </tr>
  		      <?php endforeach; ?>        
          </tbody>
        </table>
      </div><!-- /.box-body -->
      <div class="box-footer clearfix">
        <?php echo $this->Html->pagination();?>      </div>
    </div><!-- /.box -->
  </div>
</div>
