<?php
class Routed
{
    public $routers = [];
    public static function setRouters($ard)
    {
        self::init()->routers = Hash::extract($ard, "{n}.AccessRoute");
    }
    private $_AccessSkel = null;
    protected $Model = null;
    protected static $_object = null;
    public $controller;
    public $plugin;
    public static function init()
    {
        if (empty(self::$_object)) {
            self::$_object = new Routed();
            self::$_object->request = Router::getRequest();
        }
        return self::$_object;
    }

    public static function url($url)
    {
        return self::init()->getUrl($url);
    }

    public function getUrl($url)
    {
        if (!is_array($url)) {
            return Router::url($url);
        }
        $c['controller'] = (isset($url['controller']))?$url['controller']:$this->request->params['controller'];
        $c['plugin'] = (isset($url['plugin']))?$url['plugin']:$this->request->params['plugin'];
        $c['action'] = (isset($url['action']))?$url['action']:$this->request->params['action'];
        $keyTapis = array('plugin','controller','action');
        $id = "/";
        foreach ($this->routers as $routers) {
            $continue = true;
            foreach ($keyTapis as $tapis) {
                // die;
                if ($routers[$tapis] !== $c[$tapis]) {
                    $continue = false;
                    break;
                }
            }
            if ($continue) {
                $id = $routers['id'];
                break;
            }
        }

  //  if (($temp = strlen($url) - strlen("/")) >= 0 && strpos($url, "/", $temp) !== FALSE){
   //
  //  }
   $url_get = "";
        $url_pass = "";
        $urls = "";
        foreach ($url as $k=>$v) {
            if ($k==='plugin'||$k==='controller'||$k==='action') {
                continue;
            } elseif ($k === 'query' || $k === '?') {
                $url_get ='?';
                foreach ($v as $_k=>$_v) {
                    $url_get .="$_k=$_v&";
                }
                $url_get=rtrim($url_get, "&");
            } elseif (!is_int($k)) {
                $urls.='/'.$k.'/'.$v;
            } elseif (is_string($k)) {
                if (empty($url_get)) {
                    $url_get="?";
                } else {
                    $url_get.="&";
                }
            } else {
                $urls.='/'.$v;
            }
        }
        $id = str_replace("/*", "", $id);
        $url = $id.$urls.$url_pass.$url_get;
        return Router::url($url);
    }
}
