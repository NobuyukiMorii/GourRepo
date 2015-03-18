<?php

class UsersController extends AppController {

    public $helpers = array('Html', 'Form', 'Session', 'UploadPack.Upload');
    public $uses = array('User', 'Group', 'UserProfile');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('signup', 'login', 'logout');

    }

    public function isAuthorized($user) {

        //contributorに権限を与えております。
        if (isset($user['role']) && $user['role'] === 'contributor') {
            if(in_array($this->action, array('dashboard', 'profileedit', 'passwordedit', 'delete'))) {
                return true;
            }
        }

        
        return parent::isAuthorized($user);
    }


    public function signup() {

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('controller' => 'users', 'action' => 'login'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        $this->Session->setFlash(__('ログアウトしました'));        
        $this->redirect($this->Auth->logout());
    }

    public function dashboard() {
        $this->set('dashboard', $this->User->findById($this->Auth->user('id'))
            );

        if ($this->request->is('post')) {
            $this->UserProfile->id = $this->userSession['UserProfile']['id'];
            if ($this->UserProfile->save($this->request->data)) {
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
                // $this->Session->setFlash(__('The user has been saved'));
            } else {
                // $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }

        // pr($this->User->find('all',
        //     array('conditions' => array('User.id' => $this->Auth->user('id')))
        //     ));
    }

    public function profileedit() {

    }

    public function passwordedit() {

    }

    public function delete() {

    }

}   

?>