<?php
App::uses('PuteriAppController', 'Puteri.Controller');
/**
 * Princesses Controller
 *
 * @property Princess $Princess
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PrincessesController extends PuteriAppController {

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
		$this->Princess->recursive = 0;
		$this->set('princesses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Princess->exists($id)) {
			throw new NotFoundException(__('Invalid princess'));
		}
		$options = array('conditions' => array('Princess.' . $this->Princess->primaryKey => $id));
		$this->set('princess', $this->Princess->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Princess->create();
			if ($this->Princess->save($this->request->data)) {
				$this->Flash->success(__('The princess has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The princess could not be saved. Please, try again.'));
			}
		}
		$parliaments = $this->Princess->Parliament->find('list');
		$duns = $this->Princess->Dun->find('list');
		$dunVotes = $this->Princess->DunVote->find('list');
		$branches = $this->Princess->Branch->find('list');
		$ages = $this->Princess->Age->find('list');
		$this->set(compact('parliaments', 'duns', 'dunVotes', 'branches', 'ages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Princess->exists($id)) {
			throw new NotFoundException(__('Invalid princess'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Princess->save($this->request->data)) {
				$this->Flash->success(__('The princess has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The princess could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Princess.' . $this->Princess->primaryKey => $id));
			$this->request->data = $this->Princess->find('first', $options);
		}
		$parliaments = $this->Princess->Parliament->find('list');
		$duns = $this->Princess->Dun->find('list');
		$dunVotes = $this->Princess->DunVote->find('list');
		$branches = $this->Princess->Branch->find('list');
		$ages = $this->Princess->Age->find('list');
		$this->set(compact('parliaments', 'duns', 'dunVotes', 'branches', 'ages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Princess->id = $id;
		if (!$this->Princess->exists()) {
			throw new NotFoundException(__('Invalid princess'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Princess->delete()) {
			$this->Flash->success(__('The princess has been deleted.'));
		} else {
			$this->Flash->error(__('The princess could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
