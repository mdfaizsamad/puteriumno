<?php
App::uses('AppController', 'Controller');
/**
 * DunVotes Controller
 *
 * @property DunVote $DunVote
 * @property PaginatorComponent $Paginator
 */
class DunVotesController extends AppController {

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
		$this->DunVote->recursive = 0;
		$this->set('dunVotes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DunVote->exists($id)) {
			throw new NotFoundException(__('Invalid dun vote'));
		}
		$options = array('conditions' => array('DunVote.' . $this->DunVote->primaryKey => $id));
		$this->set('dunVote', $this->DunVote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DunVote->create();
			if ($this->DunVote->save($this->request->data)) {
				$this->Flash->success(__('The dun vote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The dun vote could not be saved. Please, try again.'));
			}
		}
		$duns = $this->DunVote->Dun->find('list');
		$creators = $this->DunVote->Creator->find('list');
		$modifiers = $this->DunVote->Modifier->find('list');
		$this->set(compact('duns', 'creators', 'modifiers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DunVote->exists($id)) {
			throw new NotFoundException(__('Invalid dun vote'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DunVote->save($this->request->data)) {
				$this->Flash->success(__('The dun vote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The dun vote could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DunVote.' . $this->DunVote->primaryKey => $id));
			$this->request->data = $this->DunVote->find('first', $options);
		}
		$duns = $this->DunVote->Dun->find('list');
		$creators = $this->DunVote->Creator->find('list');
		$modifiers = $this->DunVote->Modifier->find('list');
		$this->set(compact('duns', 'creators', 'modifiers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DunVote->id = $id;
		if (!$this->DunVote->exists()) {
			throw new NotFoundException(__('Invalid dun vote'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DunVote->delete()) {
			$this->Flash->success(__('The dun vote has been deleted.'));
		} else {
			$this->Flash->error(__('The dun vote could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
