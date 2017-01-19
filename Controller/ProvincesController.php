<?php
App::uses('AppController', 'Controller');
/**
 * Provinces Controller
 *
 * @property Province $Province
 * @property PaginatorComponent $Paginator
 */
class ProvincesController extends AppController {

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
		$this->Province->recursive = 0;
		$this->set('provinces', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Province->exists($id)) {
			throw new NotFoundException(__('Invalid province'));
		}
		$options = array('conditions' => array('Province.' . $this->Province->primaryKey => $id));
		$this->set('province', $this->Province->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Province->create();
			if ($this->Province->save($this->request->data)) {
				$this->Flash->success(__('The province has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The province could not be saved. Please, try again.'));
			}
		}
		$creators = $this->Province->Creator->find('list');
		$modifiers = $this->Province->Modifier->find('list');
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
		if (!$this->Province->exists($id)) {
			throw new NotFoundException(__('Invalid province'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Province->save($this->request->data)) {
				$this->Flash->success(__('The province has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The province could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Province.' . $this->Province->primaryKey => $id));
			$this->request->data = $this->Province->find('first', $options);
		}
		$creators = $this->Province->Creator->find('list');
		$modifiers = $this->Province->Modifier->find('list');
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
		$this->Province->id = $id;
		if (!$this->Province->exists()) {
			throw new NotFoundException(__('Invalid province'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Province->delete()) {
			$this->Flash->success(__('The province has been deleted.'));
		} else {
			$this->Flash->error(__('The province could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
