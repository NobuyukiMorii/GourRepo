<?php
class UsersController extends Controller {
	/*
	*利用するモデル
	*/
	public $uses = array('User' , 'UserProfile' , 'Movie' , 'Restaurant' , 'UserFavoriteMovieList' , 'UserWatchMovieList');

	/*
	*サインアップ（ユーザー登録処理）
	*/
	public function signnup(){
		/*
		*①フォームからusersとuser_profilesテーブルの項目の内容が送信されてくる。
		*②パスワードのみsha1にハッシュ化する
		*③データを保存する（usersとuser_profilesデーブルの双方にsaveをします。）
		*④データの保存が失敗したら、エラーのメッセージを出力してsignupのviewに戻す、成功したら成功のメッセージを出力してMovies/indexにリダイレクトする。
		* ※画像はupload pluginを入れてアップロードする
		*/
	}

	/*
	*サインイン（ログイン処理）
	*/
	public function signin(){
		/*
		*①フォームからemailとpasswordが送られてくる。
		*②$this->Auth->login($this->request->data)をする
		*③だめだったら、エラーを出してもう一度ログイン画面に。OKなら、元の画面（Movie.view）にリダイレクトする。
		*/

	}

	/*
	*サインアウト（ログアウト処理）
	*/
	public function signout(){
		/*
		*以下のコードを記述する。
		*/
		$this->redirect($this->Auth->logout());
	}

	/*
	*ダッシュボード
	*/
	public function user_dashbord(){
		/*
		*①ログインしているユーザーのidを取得する
		*②users、user_profile,user_watch_movie_listの情報をfindで検索する
		*③ビューに渡す
		*/
	}

	/*
	*プロフィール・エディット（ユーザー情報編集ページ）
	*/
	public function profile_edit(){
		/*
		*①ログインしているユーザーのidを取得する
		*②idをキーにUserをfindする。それをviewに渡す。
		*③フォームからuser_profilesの値が送られてくる。
		*④userとuser_profileにそれぞれsaveする
		*⑤saveに成功したらUser.dashvordにリダイレクトする、失敗したらUser.profilesにリダイレクトする
		*/
	}

	/*
	*パスワード編集画面
	*/
	public function password_edit(){
		/*
		*①フォームから送られてくるパスワードを保存する
		*②saveに成功したらUser.dashvordにリダイレクトする、失敗したらUser.profilesにリダイレクトする
		*/
	}

	/*
	*ユーザーの退会処理
	*/
	public function delete(){
		/*
		*①自分のユーザーidを取得する
		*②usersテーブルの論理削除カラムにflagをたてる
		*/
	}

}