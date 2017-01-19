<?php
App::uses('AppController', 'Controller');
/**
 * Races Controller
 *
 * @property Race $Race
 * @property PaginatorComponent $Paginator
 */
class RacesController extends AppController {

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
		$this->Race->recursive = 0;
		$this->set('races', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Race->exists($id)) {
			throw new NotFoundException(__('Invalid race'));
		}
		$options = array('conditions' => array('Race.' . $this->Race->primaryKey => $id));
		$this->set('race', $this->Race->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Race->create();
			if ($this->Race->save($this->request->data)) {
				$this->Flash->success(__('The race has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The race could not be saved. Please, try again.'));
			}
		}
		$creators = $this->Race->Creator->find('list');
		$modifiers = $this->Race->Modifier->find('list');
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
		if (!$this->Race->exists($id)) {
			throw new NotFoundException(__('Invalid race'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Race->save($this->request->data)) {
				$this->Flash->success(__('The race has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The race could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Race.' . $this->Race->primaryKey => $id));
			$this->request->data = $this->Race->find('first', $options);
		}
		$creators = $this->Race->Creator->find('list');
		$modifiers = $this->Race->Modifier->find('list');
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
		$this->Race->id = $id;
		if (!$this->Race->exists()) {
			throw new NotFoundException(__('Invalid race'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Race->delete()) {
			$this->Flash->success(__('The race has been deleted.'));
		} else {
			$this->Flash->error(__('The race could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
