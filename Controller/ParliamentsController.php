<?php
App::uses('AppController', 'Controller');
/**
 * Parliaments Controller
 *
 * @property Parliament $Parliament
 * @property PaginatorComponent $Paginator
 */
class ParliamentsController extends AppController {

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
		$this->Parliament->recursive = 0;
		$this->set('parliaments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Parliament->exists($id)) {
			throw new NotFoundException(__('Invalid parliament'));
		}
		$options = array('conditions' => array('Parliament.' . $this->Parliament->primaryKey => $id));
		$this->set('parliament', $this->Parliament->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Parliament->create();
			if ($this->Parliament->save($this->request->data)) {
				$this->Flash->success(__('The parliament has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The parliament could not be saved. Please, try again.'));
			}
		}
		$creators = $this->Parliament->Creator->find('list');
		$modifiers = $this->Parliament->Modifier->find('list');
		$this->set(compact('creators', 'modifiers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Parliament->exists($id)) {
			throw new NotFoundException(__('Invalid parliament'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Parliament->save($this->request->data)) {
				$this->Flash->success(__('The parliament has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The parliament could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Parliament.' . $this->Parliament->primaryKey => $id));
			$this->request->data = $this->Parliament->find('first', $options);
		}
		$creators = $this->Parliament->Creator->find('list');
		$modifiers = $this->Parliament->Modifier->find('list');
		$this->set(compact('creators', 'modifiers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Parliament->id = $id;
		if (!$this->Parliament->exists()) {
			throw new NotFoundException(__('Invalid parliament'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Parliament->delete()) {
			$this->Flash->success(__('The parliament has been deleted.'));
		} else {
			$this->Flash->error(__('The parliament could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
