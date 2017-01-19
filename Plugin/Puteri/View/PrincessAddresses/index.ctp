<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-title col-md-11">
          <?php echo $this->Form->create('PrincessAddress',array("type"=>"get","id"=>"IndexForm"))?>          <div class="input-group">

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
                                <th><?php echo $this->Paginator->sort('address_1'); ?></th>
                                <th><?php echo $this->Paginator->sort('address_2'); ?></th>
                                <th><?php echo $this->Paginator->sort('address_3'); ?></th>
                                <th><?php echo $this->Paginator->sort('postcode'); ?></th>
                                <th><?php echo $this->Paginator->sort('city_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('province_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('state_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('status'); ?></th>
                                <th class="left">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($princessAddresses as $princessAddress): ?>
              <tr>
                              <td class='center text-inverse'>
                      <?php echo $this->Html->link($princessAddress['Princess']['name'], array('controller' => 'princesses', 'action' => 'view', $princessAddress['Princess']['id'])); ?>
                  </td>
                                    				<td><?php echo $princessAddress["PrincessAddress"]["address_1"]; ?>&nbsp;</td>
                                     				<td><?php echo $princessAddress["PrincessAddress"]["address_2"]; ?>&nbsp;</td>
                                     				<td><?php echo $princessAddress["PrincessAddress"]["address_3"]; ?>&nbsp;</td>
                                     				<td><?php echo $princessAddress["PrincessAddress"]["postcode"]; ?>&nbsp;</td>
                                             <td class='center text-inverse'>
                      <?php echo $this->Html->link($princessAddress['City']['name'], array('controller' => 'cities', 'action' => 'view', $princessAddress['City']['id'])); ?>
                  </td>
                                            <td class='center text-inverse'>
                      <?php echo $this->Html->link($princessAddress['Province']['id'], array('controller' => 'provinces', 'action' => 'view', $princessAddress['Province']['id'])); ?>
                  </td>
                                            <td class='center text-inverse'>
                      <?php echo $this->Html->link($princessAddress['State']['id'], array('controller' => 'states', 'action' => 'view', $princessAddress['State']['id'])); ?>
                  </td>
                                    				<td><?php echo $princessAddress["PrincessAddress"]["status"]; ?>&nbsp;</td>
                                     <td style='min-width:186px;'>
                                    <a href="<?php echo Routed::url(array('action'=>'edit',$princessAddress['PrincessAddress']['id']))?>" class="btn btn-success btn-xs colorBoxIframe"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
            <a href="<?php echo Routed::url(array('action'=>'delete',$princessAddress['PrincessAddress']['id']))?>"  class="btn btn-danger btn-xs colorBoxIframe"><i class="fa fa-eraser"></i> Delete</a>
          </td>
        </tr>
  		<?php endforeach; ?>        </tbody></table>
      </div><!-- /.box-body -->
      <div class="box-footer clearfix">
        <?php echo $this->Html->pagination();?>      </div>
    </div><!-- /.box -->
  </div>
</div>
