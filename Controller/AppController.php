<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = array(
        // 'Access',
        //
        // 'Acl',
        'Auth' => array(
        // 'authorize' => array(
        //     'Actions' => array('actionPath' => 'controllers')
        // )
        ),
        'Session',
        'Flash'
    );
    public $helpers = array('Session', 'Flash');

    public function __construct($request = null, $response = null)
    {
        if (php_sapi_name() !== 'cli') {
            $this->components[] = "Access";
            $this->helpers[] = 'BsHelpers.Bs';
            // $this->components['DebugKit.Toolbar'] = array('history' => 10);
            $this->helpers[] = 'BsHelpers.BsForm';
            $this->helpers['Form'] = array(
                'className' => 'Unitar.UnitarForm',
                'datepicker' => array(
                    'format' => 'dd-mm-yyyy'
                )
            );
            $this->helpers['Html'] = array('className' => 'Unitar.UnitarHtml');
        } else {
            $this->helpers[] = 'Form';
            $this->helpers[] = 'Html';
        }
        parent::__construct($request, $response);
    }
    public function redirect($url, $status = NULL, $exit = true){
        if(isset($_GET['faliqnodirect'])){
            return;
        }
        return parent::redirect($url);
    }
    public function beforeFilter()
    {
        if (isset($this->Access)) {
            $this->Access->beforeFilter($this);
        }
         if ($this->Auth->loggedIn()) {
            $this->loadModel("AccessTrail");
            $this->AccessTrail->createAudit($this->Auth->user('id'), $this->Auth->user('user_role_id'), $this->request->referer(), $this->request->url);
        }
        // debug($_SESSION);
        // die;
    }

    // public function before()
    // {
       
    // }
}
