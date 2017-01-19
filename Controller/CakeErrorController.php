<?php

App::uses('AppController', 'Controller');

class CakeErrorController extends Controller {

	public $uses = array();

	public function __construct($request = null, $response = null) {
		parent::__construct($request, $response);
		$this->constructClasses();
		if (count(Router::extensions()) &&
			!$this->Components->attached('RequestHandler')
		) {
			$this->RequestHandler = $this->Components->load('RequestHandler');
		}
		if ($this->Components->enabled('Auth')) {
			$this->Components->disable('Auth');
		}
		if ($this->Components->enabled('Security')) {
			$this->Components->disable('Security');
		}
		$this->_set(array('cacheAction' => true, 'viewPath' => 'Errors'));
		
		$this->helpers = array('Form'=>array('className'=>'Form'),'Html'=>array('className'=>'Html'));
	}
	public function beforeFilter(){
		$this->layout = 'error';
	}
}
