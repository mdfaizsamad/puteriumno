<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-title col-md-11">
          <?php echo $this->Form->create('AccessMenu', array("type"=>"get", "id"=>"IndexForm"))?>          <div class="input-group">
            <?php if (!empty($parent_id)) :?>
              <div class="input-group-btn">
              <a  href="<?php echo Routed::url(array('action'=>'index'))?>" class="btn btn-sm btn-warning pull-right"><i class="fa fa-undo"></i>&nbsp;Back</a>
              </div>
            <?php endif;?>
            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search" value="<?php echo (isset($this->request->query["table_search"]))?$this->request->query["table_search"]:"";?>">
            <div class="input-group-btn">
              <button type='submit' class="btn btn-sm btn-default"><i class="fa fa-search"></i>&nbsp;Search</button>
            </div>
            <div class="input-group-btn">
              <a href="<?php echo Router::url("/dashboard/access/menus/recover")?>" class="btn btn-sm btn-warning"><i class="fa fa-chrome text-faded"></i>&nbsp;Recover</a>
            </div>
            <?php echo $this->Form->end();?>          </div>
        </div>
        <div class="box-tools col-md-1">
            <a href="<?php echo Routed::url(array('action'=>'add'));?>" class="btn btn-info colorBoxIframe"><i class="fa fa-plus text-faded"></i>&nbsp;Add </a>
            &nbsp;
        </div>
      </div><!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
                  <th><?php echo $this->Paginator->sort('position', "Order"); ?></th>
                  <th><?php echo $this->Paginator->sort('icon', "Icon"); ?></th>
                  <th><?php echo $this->Paginator->sort('name', "Display Name"); ?></th>
                  <th><?php echo $this->Paginator->sort('access_route_id', "Route"); ?></th>
                  <th><?php echo $this->Paginator->sort('enabled'); ?></th>
                  <th><?php echo $this->Paginator->sort('roles'); ?></th>
                  <th class="left" style='width:140px;'>Action</th>
                  <th style='width:50px;'>Sort</th>

            </tr>
          </thead>
          <tbody id="sortable-handler-el">
            <?php
            $imax = count($accessMenus);

             foreach ($accessMenus as $i => $accessMenu):
              $style= ($accessMenu["AccessMenu"]["enabled"])?'':"style='background-color:rgba(128,0,0, 0.14);''";//rgba(19, 128, 0, 0.14)
              ?>
              <tr class='item' <?=$style?> data-id='<?=$accessMenu['AccessMenu']['id']?>'>
                <td><?php echo h($accessMenu["AccessMenu"]["position"]); ?></td>

                  <td><i class="fa fa-<?=$accessMenu["AccessMenu"]["icon"]; ?>"></i></td>
                  <?php if (empty($parent_id)) :?>
                    <td><a href="<?php echo Routed::url(array('action'=>'index', '?'=>['parent_id'=>$accessMenu['AccessMenu']['id']]))?>"><?php echo h($accessMenu["AccessMenu"]["name"]); ?></a></td>
                  <?php else:?>
                    <td><?php echo h($accessMenu["AccessMenu"]["name"]); ?></td>
                  <?php endif;  ?>

                  <td class='center text-inverse'><?php echo (empty($accessMenu['Route']['id']))?"#":$this->Html->link($accessMenu['Route']['id'], array('controller' => 'access_routes', 'action' => 'index', '?'=>["table_search"=>$accessMenu['Route']['id']])); ?></td>
                  <td><?php echo ($accessMenu["AccessMenu"]["enabled"])?"<span class='label label-success'>Enabled</span> &nbsp":"<span class='label label-warning'>Disabled</span> &nbsp"; ?>&nbsp;</td>
                  <td><?php
                foreach ($accessMenu["AccessMenu"]["roles"] as $role) {
                    echo "<span class='label label-primary'>".$roles[$role]."</span> &nbsp";
                }
?>              </td>
                <td>
                  <a href="<?php echo Routed::url(array('action'=>'edit', $accessMenu['AccessMenu']['id']))?>" class="btn btn-success btn-xs colorBoxIframe"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                  <a href="<?php echo Routed::url(array('action'=>'delete', $accessMenu['AccessMenu']['id']))?>"  class="btn btn-danger btn-xs colorBoxIframe"><i class="fa fa-eraser"></i> Delete</a>
                </td>
                <td class='my-handle' style='cursor:move'>
                  <span class='label label-default my-handle' ><i class='fa fa-bars'></i></span>
                </td>
              </tr>
  		<?php
     endforeach; ?>
        </tbody>
      </table>
      </div><!-- /.box-body -->
      <div class="box-footer clearfix">
        <?php echo $this->Html->pagination();?>
      </div>
    </div><!-- /.box -->
  </div>
</div>
<?php ob_start();?>
<script>
var el = document.getElementById("sortable-handler-el");
var sortable = new Sortable(el, {
    sort: true,  // sorting inside list
    delay: 0, // time in milliseconds to define when the sorting should start
    animation: 150,  // ms, animation speed moving items when sorting, `0` — without animation
    handle: ".my-handle",  // Drag handle selector within list items
    draggable: ".item",  // Specifies which items inside the element should be sortable
    //ghostClass: "sortable-ghost",  // Class name for the drop placeholder
    // chosenClass: "sortable-chosen",  // Class name for the chosen item
    dataIdAttr: 'data-id',

    forceFallback: false,  // ignore the HTML5 DnD behaviour and force the fallback to kick in
    fallbackClass: "sortable-fallback",  // Class name for the cloned DOM Element when using forceFallback
    fallbackOnBody: false,  // Appends the cloned DOM Element into the Document's Body

    scroll: true, // or HTMLElement
    scrollSensitivity: 30, // px, how near the mouse must be to an edge to start scrolling.
    scrollSpeed: 10, // px

    setData: function (dataTransfer, dragEl) {
        dataTransfer.setData('Text', dragEl.textContent);
    },

    // dragging started
    onStart: function (/**Event*/evt) {
        evt.oldIndex;  // element index within parent
    },

    // dragging ended
    onEnd: function (/**Event*/evt) {
      var o = evt.oldIndex;  // element's old index within parent
      var n = evt.newIndex;  // element's new index within parent
        //console.log();
        var action = "";
        var step = 0;
        if(n > o){
          action= "down";
          step=n-o;
        } else if(n < o){
          action= "up";
          step=o-n;
        } else {
          return;
        }
        var url = "<?=Routed::url(["action"=>"index"]);?>";
        var id = $(evt.item).attr('data-id');
        url+="?id="+id;
        url+="&action="+action;
        url+="&step="+step;
        url+="&format=json";

        $.ajax({
          // dataType: "json",
          url: url,
          success: function(json){
            var data = JSON.parse(json);
            if(data.data == 'success'){
              // console.log(data);
               window.location.reload(true);
            }
          }
        });
    },

    // Element is dropped into the list from another list
    onAdd: function (/**Event*/evt) {
        var itemEl = evt.item;  // dragged HTMLElement
        evt.from;  // previous list
        // + indexes from onEnd
    },

    // Changed sorting within list
    onUpdate: function (/**Event*/evt) {
        var itemEl = evt.item;  // dragged HTMLElement
        // + indexes from onEnd
    },

    // Called by any change to the list (add / update / remove)
    onSort: function (/**Event*/evt) {
        // same properties as onUpdate
    },

    // Element is removed from the list into another list
    onRemove: function (/**Event*/evt) {
        // same properties as onUpdate
    },

    // Attempt to drag a filtered element
    onFilter: function (/**Event*/evt) {
        var itemEl = evt.item;  // HTMLElement receiving the `mousedown|tapstart` event.
    },

    // Event when you move an item in the list or between lists
    onMove: function (/**Event*/evt) {
        // Example: http://jsbin.com/tuyafe/1/edit?js,output
        evt.dragged; // dragged HTMLElement
        evt.draggedRect; // TextRectangle {left, top, right и bottom}
        evt.related; // HTMLElement on which have guided
        evt.relatedRect; // TextRectangle
        // return false; — for cancel

    }
});
</script>
<?php $this->Js->buffer(str_replace(['<script>', '</script>'], '', ob_get_clean()));?>
