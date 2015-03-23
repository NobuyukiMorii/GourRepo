<?php

class PpostsController extends AppController{

	public $uses = array('Ppost');
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Gurunabi');
	public function beforeFilter() {
    	   parent::beforeFilter();
        // $this->Auth->allow('signup', 'login', 'logout');
    }
     public function isAuthorized($user) {
        //contributorに権限を与えております。
        if (isset($user['role']) && $user['role'] === 'contributor') {
            //ここにindex,view,add,api_addを記入することで、画面表示ができる
            //indexに飛んで、viewやaddに飛ぶので、全てに権限を与える必要がある
            if(in_array($this->action, array('index'))) {
                return true;
            }
        }
		return parent::isAuthorized($user);
    }





	public function index(){
		// $params = array(
		// 	//ソートの仕方を指定
		// 	'order' => 'modified desc',
		// 	//データを取得する件数の指定
		// 	'limit' => 2
		// 	);
		$this->set('pposts', $this->Ppost->find('all'));
	}


	public function view($id = null){
		$this->Ppost->id = $id;
		$this->set('ppost', $this->Ppost->read());
	}


}
	