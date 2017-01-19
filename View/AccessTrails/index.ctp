<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-title col-md-11">
                    <?php
                    echo $this->Form->create('AccessTrail', array("type" => "get", "id" => "IndexForm"));
                    ?>
                    <div class="input-group">
                        <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" value="<?php echo (isset($this->request->query["table_search"])) ? $this->request->query["table_search"] : ""; ?>">
                        <div class="input-group-btn">
                            <button type='submit' class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
                <div class="col-md-1">
                    <?php echo $this->Html->link("Reset", Router::url('', true), array('class' => 'btn btn-sm btn-warning')); ?>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <div class="col-md-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo $this->Paginator->sort('user_role_id'); ?></th>
                                <th><?php echo $this->Paginator->sort('ip'); ?></th>
                                <th><?php echo $this->Paginator->sort('url'); ?></th>
                                <th><?php echo $this->Paginator->sort('browser'); ?></th>
                                <th><?php echo $this->Paginator->sort('os'); ?></th>
                                <th><?php echo $this->Paginator->sort('referer'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($accessTrails as $bil => $accessTrail) {
                                $paginations = $this->request->params["paging"]["AccessTrail"];
                                $current_row = ($paginations['page'] - 1) * $paginations['limit'] + $bil + 1
                                ?>
                                <tr>
                                    <td><?php echo $current_row . "." ?></td>
                                    <td><?php
                                        $role = $accessTrail['AccessTrail']['user_role_id'];
                                        $role_name = $roles[$role];
                                        echo "<span class='label label-primary'>$role_name</span>";
                                        ?></td>
                                    <td><?php echo $accessTrail["AccessTrail"]["ip"]; ?>&nbsp;</td>
                                    <td><?php echo $this->Html->link("/" . $accessTrail["AccessTrail"]["url"]); ?>&nbsp;</td>
                                    <td><?php echo $accessTrail["AccessTrail"]["browser"]; ?>&nbsp;</td>
                                    <td><?php echo $accessTrail["AccessTrail"]["os"]; ?>&nbsp;</td>
                                    <td><?php echo $accessTrail["AccessTrail"]["referer"]; ?>&nbsp;</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <?php echo $this->Html->pagination(); ?>
            </div>
        </div><!-- /.box -->
    </div>
</div>
