<?php


class UsersController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $uses = array('User', 'Group');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('signup', 'login', 'logout');

    }

    public function dashBoard() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
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
                // pr($this->request->data);
                $this->redirect($this->Auth->redirect());
            } else {
                 // pr($this->request->data);
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

}

?>