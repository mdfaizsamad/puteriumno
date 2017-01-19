<?php
App::uses('AppController', 'Controller');
/**
 * Duns Controller
 *
 * @property Dun $Dun
 * @property PaginatorComponent $Paginator
 */
class DunsController extends AppController {

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
		$this->Dun->recursive = 0;
		$this->set('duns', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dun->exists($id)) {
			throw new NotFoundException(__('Invalid dun'));
		}
		$options = array('conditions' => array('Dun.' . $this->Dun->primaryKey => $id));
		$this->set('dun', $this->Dun->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dun->create();
			if ($this->Dun->save($this->request->data)) {
				$this->Flash->success(__('The dun has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The dun could not be saved. Please, try again.'));
			}
		}
		$parliaments = $this->Dun->Parliament->find('list');
		$creators = $this->Dun->Creator->find('list');
		$modifiers = $this->Dun->Modifier->find('list');
		$this->set(compact('parliaments', 'creators', 'modifiers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Dun->exists($id)) {
			throw new NotFoundException(__('Invalid dun'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dun->save($this->request->data)) {
				$this->Flash->success(__('The dun has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The dun could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Dun.' . $this->Dun->primaryKey => $id));
			$this->request->data = $this->Dun->find('first', $options);
		}
		$parliaments = $this->Dun->Parliament->find('list');
		$creators = $this->Dun->Creator->find('list');
		$modifiers = $this->Dun->Modifier->find('list');
		$this->set(compact('parliaments', 'creators', 'modifiers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dun->id = $id;
		if (!$this->Dun->exists()) {
			throw new NotFoundException(__('Invalid dun'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Dun->delete()) {
			$this->Flash->success(__('The dun has been deleted.'));
		} else {
			$this->Flash->error(__('The dun could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
