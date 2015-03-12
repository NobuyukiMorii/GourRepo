<?php
class UserFavoriteMovieListsController extends AppController {

	public $uses = array('Movie' , 'UserFavoriteMovieList');
	/*
	*ビューは使わない
	*/
	 public $autoRender = false;
	/*
	*お気に入り追加のメソッド
	*/
	public function add() {
		/*
		*パラメータでリクエストを受ける
		*/
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