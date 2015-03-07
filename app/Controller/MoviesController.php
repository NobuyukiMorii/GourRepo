<?php
class MoviesController extends AppController {
	/*
	*利用するモデル
	*/
	public $uses = array('Movie' , 'User' , 'Restaurant' , 'TagRelation');

	/*
	*利用するコンポーネント
	*/
	public $components = array('Gurunabi');

	/*
	*トップ画面
	*/
	public function index(){
		/*
		*①広告とする動画を検索する
		*②オススメ動画として、東京のお店を、moviesのcount順に検索する。その際に、論理削除済みのデータは除外する。
		*③user_idを取得する
		*④user_idをキーにして、閲覧履歴を取得する
		*⑤user_idをキーにして、お気に入り動画を取得する
		*⑥ビューに渡す
		*/
	}

	/*
	*動画投稿画面
	*/
	public function add(){
		/*
		*①formからレストラン情報が送られてくる
		*②formから動画のurlが送られてくる
		*③送られてきた情報をsaveする
		*/

	}
	/*
	*検索結果画面
	*/
	public function serchResult(){
		/*
		*①キーワードを空欄で区切って配列に変換する
		*②moviesのname、description、restaurantsのname、access_line、access_station、category、投稿したユーザーのカラムからfindする
		*その際に、論理削除済みを除外し、moviesテーブルのcount順とする
		*③検索したデータをビューに表示する
		*/
	}
	/*
	*お気に入りのムービーリスト
	*/
	public function userFavoriteMovieList(){
		/*
		*①user_idを取得する
		*②user_idをキーに、$this->UserFavoriteMovieList->findで検索する
		*③ビューに渡す
		*/
	}
	/*
	*閲覧履歴
	*/
	public function userWatchMovieList(){
		/*
		*①user_idを取得する
		*②user_idをキーに、$this->user_watch_movie_list->findで検索する
		*③ビューに渡す
		*/
	}

	/*
	*「アップロードボタン」が押された時のムービーの選択画面
	*/
	public function myMovieIndex(){
		/*
		*①ユーザーがformに検索項目を書いて、送信する
		*②ぐるなびのapiに接続して、jsonでデータをダウンロードしてくる
		*③ビューに表示する
		*④ビューの中のテーブルにボタンをつけて、そのボタンを押された店のデータをmovie_addにポストする
		*/

		//都道府県マスタ取得
		$pref_search_info = $this->Gurunabi->prefSearch();
		//大業態マスタ取得
		$category_large_search_info = $this->Gurunabi->categoryLargeSearch();
		$this->set(compact('pref_search_info' , 'category_large_search_info'));
	}

	/*
	*ムービー編集画面
	*/
	public function movieEdit(){
		/*
		*①フォームからムービーのidが送られてくる。
		*②idをキーにMovieをfindする。それをviewに渡す。
		*③フォームからmoviesの値が送られてくる。
		*④umovieにsaveする
		*⑤saveに成功したらUserDashBordにリダイレクトする、失敗したらMovie.movie_editにリダイレクトする
		*/
	}
	public function movieDelete(){
		/*
		*①フォームからムービーのidが送られてくる
		*②idをキーにmovieの論理削除カラムをアップデートする
		*/
	}
}