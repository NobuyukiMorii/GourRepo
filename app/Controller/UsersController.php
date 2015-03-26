<?php

class UsersController extends AppController {

    public $components = array('Gurunabi' , 'YouTube' , 'Paginator');
    public $helpers = array('Html', 'Form', 'Session', 'UploadPack.Upload');
    public $uses = array('Movie' , 'User' , 'Restaurant' , 'TagRelation' , 'UserFavoriteMovieList' , 'UserWatchMovieList' , 'Tag' , 'TagRelation' , 'UserProfile');

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

        if (!$this->request->is('post')) {
            return;
        }

        //usersテーブルのautoincrementの次回値を取得
        $query = $this->User->query("SHOW TABLE STATUS LIKE 'users'");
        $this->request->data['User']['created_user_id'] = $query['Auto_increment'];
        $this->request->data['User']['modified_user_id'] = $query['Auto_increment'];
        $this->request->data['UserProfile']['created_user_id'] = $query['Auto_increment'];
        $this->request->data['UserProfile']['modified_user_id'] = $query['Auto_increment'];

        $this->User->create();
        if ($this->User->save($this->request->data)) {
            $this->Session->setFlash(__('The user has been saved'));
        } else {
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }

        $id = $this->User->getLastInsertID();
        $this->UserProfile->create();
        $this->request->data['UserProfile']['user_id'] = $id;
        if ($this->UserProfile->save($this->request->data)) {
            $this->Session->setFlash(__('The user has been saved'));
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        } else {
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }

    public function login() {

        if ($this->request->is('post')) {

            if ($this->Auth->login()) {
                if ($this->Auth->user('del_flg') == 1) {
                $this->Session->setFlash(__('削除されています。'));
                $this->redirect(array('controller' => 'users', 'action' => 'logout'));
                }
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
        //プロフィール表示
        $this->set('user', $this->User->findById($this->Auth->user('id'))
            );
        //閲覧履歴、お気に入り動画、マイムービーの表示
        /*
        *ユーザーが過去に見た動画を検索する（ページネーション）
        */
        $this->User->unbindModel(
            array('hasMany' =>array('Movie', 'UserFavoriteMovieList' , 'UserWatchMovieList'))
        );
        $this->Restaurant->unbindModel(
            array('hasMany' =>array('Movie'))
        );
        $this->TagRelation->unbindModel(
            array('belongsTo' =>array('Movie'))
        );
        $UserWatchMovieList = $this->UserWatchMovieList->find('all', array(
            'conditions' => array('UserWatchMovieList.user_id' => $this->userSession['id']),
            'order' => array('UserWatchMovieList.created' => 'DESC'),
            'limit' => 4,
            'recursive' => 3
        ));
        /*
        *viewにセット
        */
        $this->set('UserWatchMovieList', $UserWatchMovieList);

        /*
        *ユーザーのお気に入りの動画を検索する（ページネーション）
        */
        $this->User->unbindModel(
            array('hasMany' =>array('Movie', 'UserFavoriteMovieList' , 'UserWatchMovieList'))
        );
        $this->Restaurant->unbindModel(
            array('hasMany' =>array('Movie'))
        );
        $this->TagRelation->unbindModel(
            array('belongsTo' =>array('Movie'))
        );
        $UserFavoriteMovieList = $this->UserFavoriteMovieList->find('all', array(
            'conditions' => array('UserFavoriteMovieList.user_id' => $this->userSession['id']),
            'order' => array('UserFavoriteMovieList.created' => 'DESC'),
            'limit' => 4,
            'recursive' => 3
        ));
        /*
        *viewにセット
        */
        $this->set('UserFavoriteMovieList', $UserFavoriteMovieList);

        /*
        *ユーザー情報を取得する
        */
        $userMoviePostHistory = $this->Movie->find('all', array(
             'conditions' => array(
                'Movie.user_id' => $this->userSession['id'],
                'Movie.del_flg' => 0
             ),
             'limit' => 4,
             'order' => array('Movie.created' => 'DESC'),
             'recursive' => 2
        ));
        
        /*
        *ビューに渡す
        */
        $this->set('userMoviePostHistory', $userMoviePostHistory);


    }

    public function profileedit() {
        $this->set('user', $this->User->findById($this->Auth->user('id')));

        if ($this->request->is('post')) {


            $this->UserProfile->id = $this->userSession['UserProfile']['id'];

            if ($this->UserProfile->save($this->request->data)) {
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
                // $this->Session->setFlash(__('The user has been saved'));
            } else {
                // $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }



    }

    public function passwordedit() {

        $this->set('password', $this->User->findById($this->Auth->user('id')));

        if ($this->request->is('post')) {

            $this->User->id = $this->userSession['id'];

            if ($this->User->save($this->request->data)) {
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
                // $this->Session->setFlash(__('The user has been saved'));
            } else {
                // $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }

    }

    public function delete() {

       if ($this->request->is('post')) {

            $this->User->id = $this->userSession['id'];

            if ($this->User->save($this->request->data)) {
                $this->redirect(array('controller' => 'users', 'action' => 'logout'));
                $this->Session->setFlash(__('ご利用ありがとうございました。'));
            }
        }
    }

}   

?>