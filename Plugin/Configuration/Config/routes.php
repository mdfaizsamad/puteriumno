<?php


/**
 * Settings using webtechnick Configuration
 */
Router::connect('/admin/settings/:action/*', array('plugin' => 'Configuration', 'controller' => 'configurations'));
Router::connect('/admin/settings/*', array('plugin' => 'Configuration', 'controller' => 'configurations', 'action' => 'index'));
