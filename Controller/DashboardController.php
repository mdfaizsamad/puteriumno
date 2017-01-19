<?php

class DashboardController extends AppController
{
    public function config()
    {
        $data[] = [
        "name"=>"Debug",
        'alias'=>'debug',
        "value"=>Configure::read("debug"),

      ];
      $data[] = [
      	"name"=>"Access Cache",
      	"alias"=>"access_cache",
      	'value'=>file_exists(TMP.DS.'cache'.DS.'cake_access_route_directory')
      ];

        $this->set('data', $data);
    }
}
