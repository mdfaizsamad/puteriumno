<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-title col-md-11">
          <?php echo $this->Form->create('State',array("type"=>"get","id"=>"IndexForm"))?>          <div class="input-group">

            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" value="<?php echo (isset($this->request->query["table_search"]))?$this->request->query["table_search"]:"";?>">
            <div class="input-group-btn">
              <button type='submit' class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
            <?php echo $this->Form->end();?>          </div>
        </div>
                <div class="box-tools col-md-1">
            <a href="<?php echo Routed::url(array('controller'=>'school_subjects','plugin'=>null,'action'=>'add'));?>" class="btn btn-info colorBoxIframe"><i class="fa fa-plus text-faded"></i>&nbsp;Add </a>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
                                <th><?php echo $this->Paginator->sort('code'); ?></th>
                                <th><?php echo $this->Paginator->sort('state'); ?></th>
                                <th><?php echo $this->Paginator->sort('status'); ?></th>
                                <th class="left">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($states as $state): ?>
              <tr>
                      				<td><?php echo $state["State"]["code"]; ?>&nbsp;</td>
                                     				<td><?php echo $state["State"]["state"]; ?>&nbsp;</td>
                                     				<td><?php echo $state["State"]["status"]; ?>&nbsp;</td>
                                     <td style='min-width:186px;'>
                                    <a href="<?php echo Routed::url(array('action'=>'edit',$state['State']['id']))?>" class="btn btn-success btn-xs colorBoxIframe"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
            <a href="<?php echo Routed::url(array('action'=>'delete',$state['State']['id']))?>"  class="btn btn-danger btn-xs colorBoxIframe"><i class="fa fa-eraser"></i> Delete</a>
          </td>
        </tr>
  		<?php endforeach; ?>        </tbody></table>
      </div><!-- /.box-body -->
      <div class="box-footer clearfix">
        <?php echo $this->Html->pagination();?>      </div>
    </div><!-- /.box -->
  </div>
</div>
