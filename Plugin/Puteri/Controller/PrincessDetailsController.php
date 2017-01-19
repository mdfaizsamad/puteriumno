<?php
App::uses('PuteriAppController', 'Puteri.Controller');
/**
 * PrincessDetails Controller
 *
 * @property PrincessDetail $PrincessDetail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PrincessDetailsController extends PuteriAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PrincessDetail->recursive = 0;
		$this->set('princessDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PrincessDetail->exists($id)) {
			throw new NotFoundException(__('Invalid princess detail'));
		}
		$options = array('conditions' => array('PrincessDetail.' . $this->PrincessDetail->primaryKey => $id));
		$this->set('princessDetail', $this->PrincessDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PrincessDetail->create();
			if ($this->PrincessDetail->save($this->request->data)) {
				$this->Flash->success(__('The princess detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The princess detail could not be saved. Please, try again.'));
			}
		}
		$princesses = $this->PrincessDetail->Princess->find('list');
		$genders = $this->PrincessDetail->Gender->find('list');
		$races = $this->PrincessDetail->Race->find('list');
		$this->set(compact('princesses', 'genders', 'races'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PrincessDetail->exists($id)) {
			throw new NotFoundException(__('Invalid princess detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PrincessDetail->save($this->request->data)) {
				$this->Flash->success(__('The princess detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The princess detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PrincessDetail.' . $this->PrincessDetail->primaryKey => $id));
			$this->request->data = $this->PrincessDetail->find('first', $options);
		}
		$princesses = $this->PrincessDetail->Princess->find('list');
		$genders = $this->PrincessDetail->Gender->find('list');
		$races = $this->PrincessDetail->Race->find('list');
		$this->set(compact('princesses', 'genders', 'races'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PrincessDetail->id = $id;
		if (!$this->PrincessDetail->exists()) {
			throw new NotFoundException(__('Invalid princess detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PrincessDetail->delete()) {
			$this->Flash->success(__('The princess detail has been deleted.'));
		} else {
			$this->Flash->error(__('The princess detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
