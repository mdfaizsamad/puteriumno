<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-title col-md-12">
          <?php echo $this->Form->create('AccessRoute', array("url"=>"index", "type"=>"get", "id"=>"IndexForm"))?>
          <div class="input-group">
            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" value="<?php echo (isset($this->request->query["table_search"]))?$this->request->query["table_search"]:"";?>">
            <div class="input-group-btn">
              <button type='submit' class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
            <?php echo $this->Form->end();?>
          </div>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
                <th><?php echo  "Name"; ?></th>
                <th><?php echo  "Value"; ?></th>
            </tr>
          </thead>
          <tbody>
            <!-- ko foreach:configs -->
            <tr>
              <td><span data-bind="text:name"></span></td>
              <td style='padding:0px;width:300px'>
                  <span data-bind="click:$parent.configclick,text:$data.modified(),css:{'hide':$data.enabled()}" style='padding-bottom:10px;padding-top:10px;display:block;width:100%;'></span>
                  <input type='text' data-bind="value:modified,css:{'hide':!enabled()}"/>
                  <a class='btn btn-xs btn-success' data-bind="click:$parent.configsave,css:{'hide':!$data.enabled()}"><i class='fa fa-pencil'></i>Save</a>
                  <a class='btn btn-xs btn-warning' data-bind="click:$parent.configcancel,css:{'hide':!$data.enabled()}"><i class='fa fa-pencil'></i>Cancel</a>
              </td>
            </tr>
            <!-- /ko -->
          </tbody></table>
      </div><!-- /.box-body -->
      <div class="box-footer clearfix">
        <?php echo $this->Html->pagination();?>      </div>
    </div><!-- /.box -->
  </div>
</div>
<?php $this->append("ViewModel");?>
    self.configs = ko.observableArray();
    self.named = [];
    self.configsave = function(e){
      var v = e.modified();
      $.getJSON("<?=Router::url('/api/config');?>"+"/"+e.alias+"/"+v,function(){
          e.value = e.modified();
          e.enabled(false);
      }).fail(function() {
          e.modified(e.value);
      });
    };
    self.configcancel = function(e){
      e.enabled(false);
    };
    self.configclick= function(e){
      e.enabled(true);
    };
<?php
$this->end();
$this->Js->buffer("
  $('td').on('click',function(e){
    console.log(e);
  });
  var data = ".json_encode($data).";
  $.each(data,function(k,v){
    v.enabled = ko.observable(false);
    v.modified = ko.observable(v.value);
    AppModel.configs.push(v);
  });

  ");
?>
