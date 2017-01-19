<?php
App::uses('AppController', 'Controller');
/**
 * Masters Controller
 *
 * @property Master $Master
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class MastersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Master->recursive = 0;
		$this->set('masters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Master->exists($id)) {
			throw new NotFoundException(__('Invalid master'));
		}
		$options = array('conditions' => array('Master.' . $this->Master->primaryKey => $id));
		$this->set('master', $this->Master->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Master->create();
			if ($this->Master->save($this->request->data)) {
				$this->Flash->success(__('The master has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The master could not be saved. Please, try again.'));
			}
		}
		$owneds = $this->Master->Owned->find('list');
		$assigneds = $this->Master->Assigned->find('list');
		$creators = $this->Master->Creator->find('list');
		$modifiers = $this->Master->Modifier->find('list');
		$this->set(compact('owneds', 'assigneds', 'creators', 'modifiers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Master->exists($id)) {
			throw new NotFoundException(__('Invalid master'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Master->save($this->request->data)) {
				$this->Flash->success(__('The master has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The master could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Master.' . $this->Master->primaryKey => $id));
			$this->request->data = $this->Master->find('first', $options);
		}
		$owneds = $this->Master->Owned->find('list');
		$assigneds = $this->Master->Assigned->find('list');
		$creators = $this->Master->Creator->find('list');
		$modifiers = $this->Master->Modifier->find('list');
		$this->set(compact('owneds', 'assigneds', 'creators', 'modifiers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Master->id = $id;
		if (!$this->Master->exists()) {
			throw new NotFoundException(__('Invalid master'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Master->delete()) {
			$this->Flash->success(__('The master has been deleted.'));
		} else {
			$this->Flash->error(__('The master could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
