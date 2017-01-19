<?php
App::uses('ClassRegistry', 'Utility');
App::uses('CakeSession', 'Model/Datasource');

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
 session_start();
$user_home = false;
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
 if ( $user_role_id = CakeSession::read('Auth.User.user_role_id')) {
     $Role = ClassRegistry::init('Role');
     $Role->recursive = -1;
     if ($user_role = $Role->findById($user_role_id)) {
         $user_home = $user_role['Role']['home'];
     }
     $noHome = ($user_home !== '/' && $user_home !== false);
     if (!$noHome) {
         Router::connect('/', array('plugin'=>null, 'controller' => 'pages', 'action' => 'display', 'home'));
     }
 } else {
     $noHome = false;
     Router::connect('/', array('plugin'=>'users', 'controller' => 'users', 'action' => 'login'));
 }

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */

    // Router::connect('/rc',array('controller'=>'study_centres','action'=>'index'));
    // Router::connect('/rc/:action/*',array('controller'=>'study_centres'));
// /applicants/sign_up
App::uses('Routed', 'Routed');

$ard = Cache::read("AccessRouteDirectory");
$bool =false;
if (!$ard) {
    $AccessRoute = ClassRegistry::init('AccessRoute');
    $ard = $AccessRoute->ard();
    $bool = true;
}

      foreach ($ard as $ar) {
          $id = $ar['AccessRoute']['id'];
          unset($ar['AccessRoute']['id']);

          // debug($user_home);
          // debug(strpos($id, $user_home)!==false);
          if ($noHome&&strpos($id, $user_home)!==false) {
              $home = $ar['AccessRoute'];
              $home[] = $_SESSION['Auth']['User']['id'];
              Router::connect('/', $home);
          }
          Router::connect($id, $ar['AccessRoute']);
      }
if ($bool) {
    Cache::write("AccessRouteDirectory", $ard);
}
    Routed::setRouters($ard);
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
    CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
    require CAKE . 'Config' . DS . 'routes.php';
