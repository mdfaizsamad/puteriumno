<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController
{
    public function beforeFilter()
    {
        $this->Auth->allow(array('login', 'view', 'edit', 'disable', 'logout'));
        parent::beforeFilter();
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    public function test()
    {
        $output = [
          "nationality_id"=>"MY",
          "first_name"=>"Nama Pertama",
          "last_name"=>"Nama Kedua",
          "ic_ppt_no"=>88888888,
          "is_malaysian"=>true,
          "password"=>"abc123"
      ];
        debug($output);
        $this->loadModel('Users.Applicant');
        $this->Applicant->save($output);
        die;
    }
    public function out()
    {
        $this->response->type('pdf');
        $this->layout = "pdf";
    }
    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        if (isset($this->request->query['table_search'])) {
            $table_search = $this->request->query['table_search'];
            $conditions['OR'][]="LOWER(User.username) LIKE '%".strtolower($table_search)."%'";
            $conditions['OR'][]="LOWER(User.email) LIKE '%".strtolower($table_search)."%'";

            $this->Paginator->settings=compact('conditions');
        }

        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (empty($id)) {
            $id = $this->Auth->user('id');
        }

        if (!$this->User->exists($id)) {
            $this->Session->setFlash('Invalid user id.');
            return $this->redirect('/users/index');
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        $title_for_layout = 'Create User';
        $this->layout = 'popup';

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $roles = $this->User->Role->find('list');
        $study_centres = $this->User->StudyCentre->find('list'
          //, array(
          //'conditions' => array('StudyCentre.academic_group_id' => 2)
          //)
        );
        $this->set(compact('roles','study_centres','title_for_layout'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        $title_for_layout = 'Edit User';
        $this->layout = 'popup';

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);

            $roles = $this->User->Role->find('list');
            $study_centres = $this->User->StudyCentre->find('list'
            //, array(
              //'conditions' => array('StudyCentre.academic_group_id' => 2)
            //)
            );
            $this->set(compact('roles','study_centres','title_for_layout'));
        }


    }

    /**
     * disableDelete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function disable($id = null)
    {
        if (empty($this->User->findByIdAndActive($id, "1"))) {
            $this->Flash->error(__('Invalid or disabled user'));
            return $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is(array('post'))) {
            $this->User->id = $id;
            if ($this->User->saveField("active", 0)) {
                $this->Flash->success(__('The user has been disabled.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be disabled. Please, try again.'));
            }
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            // throw new NotFoundException(__('Invalid user'));
            $this->Flash->error(__('Invalid user'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * logout method
     *
     * @return void
     */
    public function logout($change_password='no')
    {
        $this->Auth->logout();

        if($change_password =='yes')
          $this->Flash->success('Password has been successfully change. Please login with your new password.');
        elseif($change_password =='no')
          $this->Flash->success('You are logged out.');

        return $this->redirect('/users/login');
    }

    public function login()
    {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            if (!isset($this->request->data['Role']['id'])) {
                $this->request->data = [];
                return $this->Flash->error("Invalid roles.");
            }
            $u = isset($this->request->data['User']['username'])?$this->request->data['User']['username']:'';
            $p = isset($this->request->data['User']['password'])?$this->request->data['User']['password']:'';

            switch (intval($this->request->data['Role']['id'])) {
                case Role::Staff:
                  $data = $this->User->login($u, $p);
                  if (empty($data) || !empty($this->User->ldapError) || !$this->Auth->login($data)) {
                      $this->Flash->error("Invalid username or password.");
                  } else {
                      $this->Flash->success('Signed in successfully.');
                      return $this->redirect($this->Auth->redirect());
                  }

                  break;
                  case Role::Student:
                  $this->loadModel('Users.Student');
                  $data = $this->Student->login($u, $p);
                  if (empty($data) || !$this->Auth->login($data)) {
                      $this->Flash->error("Invalid username or password.");
                  } else {
                      $this->Flash->success('Signed in successfully.');
                      return $this->redirect($this->Auth->redirect());
                  }
                  break;
                  case Role::RegisteredApplicant:

                  $this->loadModel('Users.Applicant');
                  $data = $this->Applicant->login($u, $p);
                  if (empty($data) || !$this->Auth->login($data)) {
                      $this->Flash->error("Invalid username or password.");
                  } else {
                      $this->Flash->success('Signed in successfully.');
                      return $this->redirect($this->Auth->redirect());
                  }
                  break;
                  default:
                  $this->request->data = [];
                  return $this->Flash->error("Invalid login role");
                  break;
              }
        }
    }

    public function login_acca()
    {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            if (!isset($this->request->data['Role']['id'])) {
                $this->request->data = [];
                return $this->Flash->error("Invalid roles.");
            }
            $u = isset($this->request->data['User']['username'])?$this->request->data['User']['username']:'';
            $p = isset($this->request->data['User']['password'])?$this->request->data['User']['password']:'';

            switch (intval($this->request->data['Role']['id'])) {
                case Role::Staff:
                  $data = $this->User->login($u, $p);
                  if (empty($data) || !empty($this->User->ldapError) || !$this->Auth->login($data)) {
                      $this->Flash->error("Invalid username or password.");
                  } else {
                      $this->Flash->success('Signed in successfully.');
                      return $this->redirect($this->Auth->redirect());
                  }

                  break;
                case Role::AccaApplicant:
                  $this->loadModel('Users.AccaApplicant');
                  $data = $this->AccaApplicant->login($u, $p);

                  if (empty($data) || !$this->Auth->login($data)) {
                      $this->Flash->error("Invalid username or password.");
                  } else {
                      $this->Flash->success('Signed in successfully.');
                      return $this->redirect($this->Auth->redirect());
                  }

                  break;

                  default:
                  $this->request->data = [];
                  return $this->Flash->error("Invalid login role");
                  break;
              }
        }
    }
}
