<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-title col-md-11">
          <?php echo $this->Form->create('Princess',array("type"=>"get","id"=>"IndexForm"))?>          <div class="input-group">

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
              <th><?php echo $this->Paginator->sort('name'); ?></th>
              <th><?php echo $this->Paginator->sort('parlimen'); ?></th>
              <th><?php echo $this->Paginator->sort('parliament_id'); ?></th>
              <th><?php echo $this->Paginator->sort('dun'); ?></th>
              <th><?php echo $this->Paginator->sort('dun_id'); ?></th>
              <th><?php echo $this->Paginator->sort('dun_undi'); ?></th>
              <th><?php echo $this->Paginator->sort('dun_vote_id'); ?></th>
              <th><?php echo $this->Paginator->sort('caw'); ?></th>
              <th><?php echo $this->Paginator->sort('branch_id'); ?></th>
              <th><?php echo $this->Paginator->sort('age_id'); ?></th>
              <th><?php echo $this->Paginator->sort('vote'); ?></th>
              <th><?php echo $this->Paginator->sort('member'); ?></th>
              <th><?php echo $this->Paginator->sort('status'); ?></th>
              <th class="left">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($princesses as $princess): ?>
              <tr>
                <td><a href="<?php echo Routed::url(array('action'=>'view',$princess['Princess']['id']))?>"><?php echo h($princess["Princess"]["name"]); ?></a></td>
         				<td><?php echo $princess["Princess"]["parlimen"]; ?>&nbsp;</td>
                <td class='center text-inverse'><?php echo $princess['Parliament']['parliament']; ?>
                  </td>
                                    				<td><?php echo $princess["Princess"]["dun"]; ?>&nbsp;</td>
                                             <td class='center text-inverse'>
                      <?php echo $this->Html->link($princess['Dun']['id'], array('controller' => 'duns', 'action' => 'view', $princess['Dun']['id'])); ?>
                  </td>
                                    				<td><?php echo $princess["Princess"]["dun_undi"]; ?>&nbsp;</td>
                                             <td class='center text-inverse'>
                      <?php echo $this->Html->link($princess['DunVote']['id'], array('controller' => 'dun_votes', 'action' => 'view', $princess['DunVote']['id'])); ?>
                  </td>
                                    				<td><?php echo $princess["Princess"]["caw"]; ?>&nbsp;</td>
                                             <td class='center text-inverse'>
                      <?php echo $this->Html->link($princess['Branch']['id'], array('controller' => 'branches', 'action' => 'view', $princess['Branch']['id'])); ?>
                  </td>
                                            <td class='center text-inverse'>
                      <?php echo $princess['Age']['category']; ?>
                  </td>
                                    				<td><?php echo $princess["Princess"]["vote"]; ?>&nbsp;</td>
                                     				<td><?php echo $princess["Princess"]["member"]; ?>&nbsp;</td>
                                     				<td><?php echo $princess["Princess"]["status"]; ?>&nbsp;</td>
                                     <td style='min-width:186px;'>
                                    <a href="<?php echo Routed::url(array('action'=>'edit',$princess['Princess']['id']))?>" class="btn btn-success btn-xs colorBoxIframe"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
            <a href="<?php echo Routed::url(array('action'=>'delete',$princess['Princess']['id']))?>"  class="btn btn-danger btn-xs colorBoxIframe"><i class="fa fa-eraser"></i> Delete</a>
          </td>
        </tr>
  		<?php endforeach; ?>        </tbody></table>
      </div><!-- /.box-body -->
      <div class="box-footer clearfix">
        <?php echo $this->Html->pagination();?>      </div>
    </div><!-- /.box -->
  </div>
</div>
