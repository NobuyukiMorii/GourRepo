<?php
class UserFavoriteMovieListsController extends AppController {

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
		$rest_data = $this->request['pass'][0];

		/*
		*ユーザー情報を受ける
		*/
		$user_data = $this->auth->user();


	}



}