<?php


class UsersController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
    public $uses = array('User', 'Group');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'signUp');

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
                $this->redirect(array('controller' => 'movies', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

}

?>