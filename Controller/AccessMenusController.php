<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
App::uses("FontAwesome", "Model");
/**
 * AccessMenus Controller
 *
 * @property AccessMenu $AccessMenu
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AccessMenusController extends AppController
{
    /**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator', 'Session');

    public function beforeFilter()
    {
        $this->Auth->allow();
        parent::beforeFilter();
    }
/**
 * index method
 *
 * @return void
 */
    public function index()
    {
        $conditions = [];
        $parent_id= @$this->request->query['parent_id'];

        if (!empty($parent_id)) {
            $conditions[]['AccessMenu.parent_id']=$parent_id;
        } else {
            $conditions[]['AccessMenu.parent_id']=null;
        }
        if (isset($this->request->query['table_search'])) {
            $table_search = $this->request->query['table_search'];
            $conditions['OR'][]="LOWER(AccessMenu.access_route_id) LIKE '%".strtolower($table_search)."%'";
            $conditions['OR'][]="LOWER(AccessMenu.name) LIKE '%".strtolower($table_search)."%'";
        }
        $id= @$this->request->query['id'];
        $action = @$this->request->query['action'];
        if ($id && $action) {
            $step = (isset($this->request->query['step']))?abs($this->request->query['step']):1;
            switch (strtolower($action)) {
              case 'up':
                $success = $this->AccessMenu->moveUp($id, $step);
                break;
              case 'down':
                $success = $this->AccessMenu->moveDown($id, $step);
                break;
            }
            if ($this->request->query['format']=='json'&&isset($success)) {
                die(json_encode(['data'=>($success)?'success':'error']));
                return;
            }
        }

        $order=['AccessMenu.position'];
        $this->Paginator->settings=compact('conditions', 'order');
        $this->AccessMenu->recursive = 0;
        $this->AccessMenu->unBindModel(array('belongsTo'=>array('Parent')));
        $this->loadModel('Role');
        $this->set('roles', $this->Role->find('list'));
        $this->set('accessMenus', $this->Paginator->paginate());
        $this->set("parent_id", $parent_id);
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
            unset($this->request->data['AccessMenu']['id']);
            $this->AccessMenu->create();
            $save = $this->AccessMenu->save($this->request->data);
            // debug($save);
            if ($save) {
                $this->Flash->success(__('The access menu has been saved.'));
                // debug($this->request->data);
                // die;
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The access menu could not be saved. Please, try again.'));
            }
        }
        $routes["#"]="** No Routes **";

        $routes = array_merge($routes, $this->AccessMenu->Route->find('list', ['fields'=>['id', 'id'], 'order'=>'id']));
        $parents = $this->AccessMenu->Parent->find('list', ['fields'=>['id', 'name' ], 'recursive'=>-1, 'conditions'=>['Parent.parent_id'=>null]]);
        $parents[0]="** No Parent **";
        ksort($parents);
        $this->loadModel("Role");
        $roles = $this->Role->find('list');

        $this->set(compact('routes', 'parents', 'roles'));
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
        if (!$this->AccessMenu->exists($id)) {
            throw new NotFoundException(__('Invalid access menu'));
        }
        $this->layout="popup";
        if ($this->request->is(array('post'))) {
            if ($this->AccessMenu->save($this->request->data)) {
                $this->Flash->success(__('The access menu saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The access menu could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('AccessMenu.' . $this->AccessMenu->primaryKey => $id));
            $this->request->data = $this->AccessMenu->find('first', $options);
        }
        $routes["#"]="** No Routes **";

        $routes = array_merge($routes, $this->AccessMenu->Route->find('list', ['fields'=>['id', 'id'], 'order'=>'id']));
        $parents = $this->AccessMenu->Parent->find('list', ['fields'=>['id', 'name' ], 'recursive'=>-1, 'conditions'=>['Parent.parent_id'=>null]]);
        $parents[0]="** No Parent **";
        ksort($parents);
        $this->loadModel("Role");
        $roles = $this->Role->find('list');

        $this->set(compact('routes', 'parents', 'roles'));
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
        $this->AccessMenu->id = @$this->request->query['id'];
        if (!$this->AccessMenu->exists()) {
            throw new NotFoundException(__('Invalid access menu'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->AccessMenu->delete()) {
            $this->Session->setFlash(__('The access menu has been deleted.'));
        } else {
            $this->Session->setFlash(__('The access menu could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function recover()
    {
        $this->autoRender = false;
        // $this->AccessMenu->verify();
        // $this->AccessMenu->reorder();
        $ams = $this->AccessMenu->find('all', [
          'conditions'=>['AccessMenu.parent_id IS NULL']
        ]);

        $model = [];
        $position = 0;
        foreach ($ams as $am) {
            $position++;
            $am['AccessMenu']['position']=$position;
            $model[] = $am['AccessMenu'];
            foreach ($am['Child'] as $i=>$child) {
                $child['position']=$i+1;
                $model[] = $child;
            }
        }


        debug($this->AccessMenu->saveMany($model, [
          'atomic'=>true, 'validate'=>false
        ]));
        // // debug($this->AccessMenu->invalidFields());
        // debug($model[110]);
        // debug($ams);
        // die;
        // $this->AccessMenu->recover('parent');
        return  $this->redirect(['action'=>'index']);
    }
}
