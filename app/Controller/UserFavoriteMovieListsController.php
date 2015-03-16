<?php
class UserFavoriteMovieListsController extends AppController {

	public $uses = array('Movie' , 'UserFavoriteMovieList');
	/*
	*ビューは使わない
	*/
	public $autoRender = false;

	//MoviesControllerの中でログイン無しで入れるところの設定

    public function isAuthorized($user) {
    	//contributorに権限を与えております。
        if (isset($user['role']) && $user['role'] === 'contributor') {
        	if(in_array($this->action, array('add'))) {
        		return true;
        	}
        }
        return parent::isAuthorized($user);
    }

	/*
	*お気に入り追加のメソッド
	*/
	public function add() {
		/*
		*パラメータでリクエストを受ける
		*/
		pr($this->request['pass'][0]);

		$data['movie_id'] = $this->request['pass'][0];

		/*
		*ユーザー情報を受ける
		*/
		$data['user_id'] = $this->Auth->user('id');
		$data['created_user_id'] = $this->Auth->user('id');
		$data['modified_user_id'] = $this->Auth->user('id');

		/*
		*お気に入りデータの登録
		*/
		$this->UserFavoriteMovieList->create();
		$flg = $this->UserFavoriteMovieList->save($data);

		/*
		*エラーのハンドリング
		*/
		if($flg){
			$this->Session->setFlash('お気に入りに登録しました');
			return $this->redirect(array('controller' => 'Movies', 'action' => 'view' , $data['movie_id']));
		} else {
			$this->Session->setFlash('お気に入りに登録に失敗しました');
			return $this->redirect(array('controller' => 'Movies', 'action' => 'view' , $data['movie_id']));
		}

	}



}