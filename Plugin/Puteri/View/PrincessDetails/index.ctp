<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-title col-md-11">
          <?php echo $this->Form->create('PrincessDetail',array("type"=>"get","id"=>"IndexForm"))?>          <div class="input-group">

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
                                <th><?php echo $this->Paginator->sort('princess_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('gender_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('race_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('no_kp'); ?></th>
                                <th><?php echo $this->Paginator->sort('dob'); ?></th>
                                <th><?php echo $this->Paginator->sort('age'); ?></th>
                                <th><?php echo $this->Paginator->sort('status'); ?></th>
                                <th class="left">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($princessDetails as $princessDetail): ?>
              <tr>
                              <td class='center text-inverse'>
                      <?php echo $this->Html->link($princessDetail['Princess']['name'], array('controller' => 'princesses', 'action' => 'view', $princessDetail['Princess']['id'])); ?>
                  </td>
                                            <td class='center text-inverse'>
                      <?php echo $this->Html->link($princessDetail['Gender']['id'], array('controller' => 'genders', 'action' => 'view', $princessDetail['Gender']['id'])); ?>
                  </td>
                                            <td class='center text-inverse'>
                      <?php echo $this->Html->link($princessDetail['Race']['id'], array('controller' => 'races', 'action' => 'view', $princessDetail['Race']['id'])); ?>
                  </td>
                                    				<td><?php echo $princessDetail["PrincessDetail"]["no_kp"]; ?>&nbsp;</td>
                                     				<td><?php echo $princessDetail["PrincessDetail"]["dob"]; ?>&nbsp;</td>
                                     				<td><?php echo $princessDetail["PrincessDetail"]["age"]; ?>&nbsp;</td>
                                     				<td><?php echo $princessDetail["PrincessDetail"]["status"]; ?>&nbsp;</td>
                                     <td style='min-width:186px;'>
                                    <a href="<?php echo Routed::url(array('action'=>'edit',$princessDetail['PrincessDetail']['id']))?>" class="btn btn-success btn-xs colorBoxIframe"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
            <a href="<?php echo Routed::url(array('action'=>'delete',$princessDetail['PrincessDetail']['id']))?>"  class="btn btn-danger btn-xs colorBoxIframe"><i class="fa fa-eraser"></i> Delete</a>
          </td>
        </tr>
  		<?php endforeach; ?>        </tbody></table>
      </div><!-- /.box-body -->
      <div class="box-footer clearfix">
        <?php echo $this->Html->pagination();?>      </div>
    </div><!-- /.box -->
  </div>
</div>
