<?php
App::uses("HtmlHelper", "Helper");

class UnitarHtmlHelper extends HtmlHelper
{
    public $helpers = array('Js');
    private $jscripts = array();

    public function script($url, $options = array('var'=>true))
    {
        if (!is_array($options)) {
            return $this->script($url, array('var'=>$options));
        }
        if (isset($options['inline'])||isset($options['block'])||!isset($options['var'])||empty($options['var'])) {
            unset($options['var']);
            return parent::script($url, $options);
        }
        if ($options['var']===true) {
            $this->jscripts[] = $url;
        } else {
            $this->jscripts[$options['var']] = $url;
        }
    }

    public function ko($ob= null)
    {
        $this->append('ViewModel', str_replace(['<script>', '</script>'], "", $ob));
    }
    public function paginator($current = 0, $max = 0)
    {
    }

    public function pagination($append = "")
    {
        $output = "<!--Pagination controls -->";
        $output .='<ul class="pagination margin-bottom-none">';
        $Paginator = $this->_View->Paginator;
        $params = $Paginator->params();
        $page = $params['page'];

        $query=$this->request->query;
        // foreach($this->request->query as $key=>$value){
        //     $query.="$key=$value?";
        // }
        // rtrim($query,"?");
        if ($Paginator->hasPrev()) {
            $output .= '<li class="primary previous">' . $Paginator->prev("Previous", array('tag' => false)) . '</li>';


            $i = $page-5;//4-5
            for ($i;$i<$page;$i++) {
                if ($i <= 0) {
                    continue;
                }
                $io = $i;
                $url = $Paginator->url(array("?"=>$query, 'page' => $io), false);
                $output.="<li><a href='$url'>$io</a></li>";
            }
        } else {
            $output .= '<li class="disabled"><a href="#" class="no-ajaxify"> Previous </a></li>';
        }
        $url = $Paginator->url(array('page' => $page, "?"=>$query, ), false);
        $output.="<li class='active'><a href='$url'>$page</a></li>";

        if ($Paginator->hasNext()) {
            $ip = $page+6;//4-5
            for ($i = $page+1;$i<$ip;$i++) {
                if ($i > $params['pageCount']) {
                    break;
                }
                $url = $Paginator->url(array('page' => $i, "?"=>$query, ), false);
                $output.="<li><a href='$url'>$i</a></li>";
            }
            $output .= '<li class="primary next">' . $Paginator->next("Next", array('tag' => false)) . '</li>';
        } else {
            $output .= '<li class="disabled"><a href="#" class="no-ajaxify"> Next </a></li>';
        }
        $output .= '</ul><!-- //Pagination controls END -->';
        return $output;
    }
    protected $_calendarLoaded = 0;
    public function calendar($data=[], $options=[])
    {
        if ($this->_calendarLoaded === 0) {
            $this->css([
            '/components/fullcalendar/dist/fullcalendar.min.css',
          ], ['inline'=>false]);
            $this->script([
            '/components/momentjs/min/moment.min.js',
            '/components/fullcalendar/dist/fullcalendar.min.js'
          ], ['inline'=>false]);
        }
        $this->_calendarLoaded++;

        if (!isset($options['defaultDate'])) {
            $options['defaultDate'] = date("Y-m-d");
        }
        if (!isset($options['currentTimezone'])) {
            $options['currentTimezone'] ='Asia/Kuala_Lumpur';
        }
        $buffer = "calendar".$this->_calendarLoaded;
        $this->Js->buffer("$('#$buffer').fullCalendar({
          		header: {
          			left: 'prev,next today',
          			center: 'title',
          			right: 'month,agendaWeek,agendaDay'
          		},
              timezone: '".$options['currentTimezone']."',
		          defaultDate: '".$options['defaultDate']."',
		          editable: false,
		          eventLimit: true, // allow link when too many events
		          events: ".json_encode($data)."
        });");
        return "<div id='$buffer'></div>";
    }

    public function requirejs()
    {
        //By default load any module IDs from js/lib
    $content='';

    // Start the main app logic.
    $fn = array();
        $load = array();
        $lfn = array();
        foreach ($this->jscripts as $var => $script) {
            if (is_int($var)) {
                $load[] = $script;
            } else {
                $lfn[] = $script;
                $fn[] =$var;
            }
        }

    /*
    (['jquery','knockout'],function($,ko){ ... });
    */
    $s = '\''.implode('\',\'', $lfn).'\'';
        if (count($load)>0) {
            $s.=',\''.implode('\',\'', $load).'\'';
        }
        $content .=sprintf("requirejs(['jquery',%s],function($,%s){%s});", $s, implode(',', $fn), PHP_EOL.implode(PHP_EOL, $this->Js->getBuffer()).PHP_EOL);
        return sprintf("<script>%s</script>", $content);
    }
}
