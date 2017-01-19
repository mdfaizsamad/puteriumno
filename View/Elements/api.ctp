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
// $module = md5($module);
//
// if (!file_exists(JS."app".DS.$module.'.js')){
//   touch(JS."app".DS.$module.'.js');
// }
ob_start();
?>
var CakeApp = {
module:'<?php echo $module ?>',
<?php echo $this->fetch('apihead'); ?>
request:<?php echo json_encode($request); ?>
};
<?php
$cake_app = ob_get_clean();
$this->Html->script('require', array('inline' => false));
$this->Html->script('lib/jquery-2.1.4', array('inline' => false));
$content = sprintf("requirejs.config({ baseUrl:'%s',", Router::url('/js/lib'));
//except, if the module ID starts with "app",
//load it from the js/app directory. paths
//config is relative to the baseUrl, and
//never includes a ".js" extension since
//the paths config could be for a directory.
$content .= sprintf("paths: {app: '%s'", Router::url('/js/app'));

$content .= ",jquery:'jquery-2.1.4'},shim:{'bootstrap':['jquery'],'knockout':['jquery']}});";

$this->Html->script('knockout', array('var' => "ko"));
$this->Html->script('bootstrap');
if (file_exists(JS . "app" . DS . $module . '.js')) {
    $this->Html->script("app/$module");
}
?>
<script><?php echo "$cake_app \n $content" ?></script>
