<?php
App::uses('AppController', 'Controller');
/**
 * PrincessAddresses Controller
 *
 * @property PrincessAddress $PrincessAddress
 * @property PaginatorComponent $Paginator
 */
class PrincessAddressesController extends AppController {

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
		$this->PrincessAddress->recursive = 0;
		$this->set('princessAddresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PrincessAddress->exists($id)) {
			throw new NotFoundException(__('Invalid princess address'));
		}
		$options = array('conditions' => array('PrincessAddress.' . $this->PrincessAddress->primaryKey => $id));
		$this->set('princessAddress', $this->PrincessAddress->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PrincessAddress->create();
			if ($this->PrincessAddress->save($this->request->data)) {
				$this->Flash->success(__('The princess address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The princess address could not be saved. Please, try again.'));
			}
		}
		$princesses = $this->PrincessAddress->Princess->find('list');
		$cities = $this->PrincessAddress->City->find('list');
		$provinces = $this->PrincessAddress->Province->find('list');
		$states = $this->PrincessAddress->State->find('list');
		$creators = $this->PrincessAddress->Creator->find('list');
		$modifiers = $this->PrincessAddress->Modifier->find('list');
		$this->set(compact('princesses', 'cities', 'provinces', 'states', 'creators', 'modifiers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PrincessAddress->exists($id)) {
			throw new NotFoundException(__('Invalid princess address'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PrincessAddress->save($this->request->data)) {
				$this->Flash->success(__('The princess address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The princess address could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PrincessAddress.' . $this->PrincessAddress->primaryKey => $id));
			$this->request->data = $this->PrincessAddress->find('first', $options);
		}
		$princesses = $this->PrincessAddress->Princess->find('list');
		$cities = $this->PrincessAddress->City->find('list');
		$provinces = $this->PrincessAddress->Province->find('list');
		$states = $this->PrincessAddress->State->find('list');
		$creators = $this->PrincessAddress->Creator->find('list');
		$modifiers = $this->PrincessAddress->Modifier->find('list');
		$this->set(compact('princesses', 'cities', 'provinces', 'states', 'creators', 'modifiers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PrincessAddress->id = $id;
		if (!$this->PrincessAddress->exists()) {
			throw new NotFoundException(__('Invalid princess address'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PrincessAddress->delete()) {
			$this->Flash->success(__('The princess address has been deleted.'));
		} else {
			$this->Flash->error(__('The princess address could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
