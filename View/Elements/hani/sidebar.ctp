<?php
$user_roles = Role::forUser();

// $user_role_id = 1;
// $this->Html->css('sidebar', array('inline' => false));
$AccessMenu = ClassRegistry::init('AccessMenu');
$menus = $AccessMenu->getSidebar($user_roles);
$params = $this->request->params;

?>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <ul class="sidebar-menu">
      <!-- <li class="header">MAIN NAVIGATION</li><HEADER-->
    <?php  $c = count($menus);
//    $user_role_id = $this->Session->read('Auth.User.user_role_id');
    // $sbactive = (isset($_COOKIE['sidebar_active']))?explode('_', $_COOKIE['sidebar_active']):[""];

    $breadcrumb_for_layout=[];

      $current_url =  str_replace("/*", "", Routed::url([
        'plugin'=>$this->request->plugin,
        'controller'=>$this->request->controller,
        'action'=>$this->request->action,
      ]));
      foreach ($menus as $i => $menu):
        $hasChild = "";
        $output_children="";
        $sbactive = false;
        $hasActive = false;
        if (count($menu['Child']) > 0) {
            $hasChild .= "treeview";
            $output_children="";
            foreach ($menu['Child'] as $child) :
            if (!Role::isUserInRole($child['roles'])) {
                continue;
            }
            $sbactive = ($current_url == Router::url($child['access_route_id']));
            $endsWith = "";
            if ($sbactive) {
                $breadcrumb_for_layout[] = $child;
                $startsWith=true;
                $endsWith = "class='active'";
                $hasActive=true;
            }
            $url = str_replace("/*", "", $child['access_route_id']);
            $iconic = (!isset($child['icon']) || empty($child['icon'])) ? "circle-o" : h($child['icon']);
            $output_children .= '<li '.$endsWith.'><a href="' . Router::url($url) . '"><i class="fa fa-' . $iconic . ' fa-1x"></i> &nbsp;&nbsp;' . $child['name'] . '</a></li>';
            endforeach;
            $output = '<ul class="treeview-menu ';
            $output.=$sbactive?'menu-open':'';
            $output.='">'.$output_children.'</ul>';
            $output_children=$output;
        }

        if ($hasActive) {
            $hasChild.=" active";
            $breadcrumb_for_layout[] = $menu['AccessMenu'];
        }
        $hasChild = sprintf(" class='%s'", $hasChild);
        $url = str_replace("/*", "", $menu['AccessMenu']['access_route_id']);
        $url = Router::url($url);
        $name = h($menu['AccessMenu']['name']);
        $icon = (!isset($menu['AccessMenu']['icon']) || empty($menu['AccessMenu']['icon'])) ? 'circle-o' : $menu['AccessMenu']['icon'];

        ?>
        <li<?php echo $hasChild?>> <!-- ROOT -->
          <a href="<?php echo $url;?>">
            <i class="fa fa-<?php echo $icon;?>"></i> <span><?php echo $name;?></span> <i class="fa fa-angle-left pull-right"></i>
          </a> <!-- ROOT DISPLAY -->
          <?=$output_children?>
        </li>
      <?php

    endforeach;

    if (!isset($this->viewVars['breadcrumb_for_layout'])) {
        $this->viewVars['breadcrumb_for_layout'] = array_reverse($breadcrumb_for_layout);
    }
    ?>
    </ul>

  </section>
  <!-- /.sidebar -->

</aside>
<?php $this->Js->buffer("
  $('.sidebar a').on('click',function(e){
    // localStorage.setItem('menu_active',$(this).parent().prop('outerHTML'));
  //  e.preventDefault();
    var key = 'sidebar_active';
    var value = $(this).parent().attr('id');
    var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';path=/;expires=' + expires.toUTCString();
  });
  ");?>
