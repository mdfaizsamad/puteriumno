<?php


class ConfigController extends ApiAppController
{
    public function debug($status=0)
    {
        $content  = APP."Config/core.php";
        $data = file_get_contents($content);
        $moddata = str_replace("Configure::write('debug', 2);", "Configure::write('debug', $status);", $data);
        if ($moddata == $data) {
            $moddata = str_replace("Configure::write('debug', 1);", "Configure::write('debug', $status);", $data);
            if ($moddata == $data) {
                $moddata = str_replace("Configure::write('debug', 0);", "Configure::write('debug', $status);", $data);
            }
        }
        if ($moddata!=$data && file_put_contents($content, $moddata)>0) {
            return $this->_serialized(["status"=> "success"]);
        }
        $this->_serialized(["status"=> "error"]);
    }

    public function access_cache(){
        $content  = TMP.'cache'.DS.'cake_access_route_directory';
      
        if($data = file_exists($content)){
            if (unlink($content)) {
                return $this->_serialized(["status"=> "success"]);
            } else {
                $this->_serialized(["status"=> "error"]);  
            }
        } else {
            $this->_serialized(["status"=> "error"]);
        }
        die;
    }
}
