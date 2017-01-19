<!-- =================API======================= -->
<?php
$request = $this->request;
$module = "";
if (!empty($request->plugin)) {
    $module .= $request->plugin;
    $module .= "_";
}
$module .= $request->controller;
$module .= "_";
$module .= $request->action;

unset($request['models']);
?>
<script type='text/javascript'>
var CakeApp = {
  module:'<?php echo $module; ?>',
  request:<?php echo json_encode($request); ?>
  <?php echo $this->fetch('cake_app');?>
};
</script>
<!-- ============================================= -->
