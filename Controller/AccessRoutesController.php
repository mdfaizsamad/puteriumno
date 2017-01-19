<?php
App::uses('AppController', 'Controller');
/**
 * AccessRoutes Controller
 *
 * @property AccessRoute $AccessRoute
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AccessRoutesController extends AppController
{
    /**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator', 'Session');


/**
 * index method
 *
 * @return void
 */
    public function index()
    {
        if (isset($this->request->query['table_search'])) {
            $table_search = $this->request->query['table_search'];
            $conditions['OR'][]="LOWER(AccessRoute.controller) LIKE '%".strtolower($table_search)."%'";
            $conditions['OR'][]="LOWER(AccessRoute.plugin) LIKE '%".strtolower($table_search)."%'";
            $conditions['OR'][]="LOWER(AccessRoute.action) LIKE '%".strtolower($table_search)."%'";
            $conditions['OR'][]="LOWER(AccessRoute.name) LIKE '%".strtolower($table_search)."%'";
            $conditions['OR'][]="LOWER(AccessRoute.id) LIKE '%".strtolower($table_search)."%'";
            $this->Paginator->settings=compact('conditions');
        }

        $this->AccessRoute->recursive = 0;
        $this->loadModel('Role');
        $this->set('roles', $this->Role->find('list'));
        $this->set('accessRoutes', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view()
    {
        $id = @$this->request->query['url'];
        if (!$this->AccessRoute->exists($id)) {
            throw new NotFoundException(__('Invalid access route'));
        }
        $options = array('conditions' => array('AccessRoute.' . $this->AccessRoute->primaryKey => $id));
        $this->set('accessRoute', $this->AccessRoute->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add()
    {
        $this->view="edit";
        $this->layout = "popup";
        if ($this->request->is('post')) {
            $this->AccessRoute->create();
            $data = $this->request->data;

            $data['Modifier']['id'] = $data['Creator']['id'] = $this->Auth->user('id');
            if ($this->AccessRoute->save($data)) {
                $this->Flash->success(__('The access route has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The access route could not be saved. Please, try again.'));
            }
        }

        $this->loadModel("Role");
        $roles = $this->Role->find('list');

        $this->set(compact('roles'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit()
    {
        $id = @$this->request->query['url'];
        if (!$this->AccessRoute->exists($id)) {
            throw new NotFoundException(__('Invalid access route'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->AccessRoute->save($this->request->data)) {
                $this->Flash->success(__('The access route has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The access route could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('AccessRoute.' . $this->AccessRoute->primaryKey => $id));
            $this->request->data = $this->AccessRoute->find('first', $options);
        }
        $this->layout="popup";
        $this->loadModel('Role');
        $this->set('roles', $this->Role->find('list'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete()
    {
        $this->AccessRoute->id = @$this->request->query['url'];
        if (!$this->AccessRoute->exists()) {
            throw new NotFoundException(__('Invalid access route'));
        }
        if ($this->AccessRoute->delete()) {
            $this->Flash->success(__('The access route has been deleted.'));
        } else {
            $this->Flash->error(__('The access route could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
