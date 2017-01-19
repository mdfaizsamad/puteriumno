<?php
App::uses('AppController', 'Controller');
/**
 * Ages Controller
 *
 * @property Age $Age
 * @property PaginatorComponent $Paginator
 */
class AgesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Age->recursive = 0;
		$this->set('ages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Age->exists($id)) {
			throw new NotFoundException(__('Invalid age'));
		}
		$options = array('conditions' => array('Age.' . $this->Age->primaryKey => $id));
		$this->set('age', $this->Age->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Age->create();
			if ($this->Age->save($this->request->data)) {
				$this->Flash->success(__('The age has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The age could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Age->exists($id)) {
			throw new NotFoundException(__('Invalid age'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Age->save($this->request->data)) {
				$this->Flash->success(__('The age has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The age could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Age.' . $this->Age->primaryKey => $id));
			$this->request->data = $this->Age->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Age->id = $id;
		if (!$this->Age->exists()) {
			throw new NotFoundException(__('Invalid age'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Age->delete()) {
			$this->Flash->success(__('The age has been deleted.'));
		} else {
			$this->Flash->error(__('The age could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
