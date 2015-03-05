<?php
class MoviesController extends Controller {
	/*
	*利用するモデル
	*/
	public $uses = array('Movie' , 'User' , 'Restaurant' , 'TagRelation');

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
		*ただいま研究中
		*/
	}

	/*
	*検索結果画面
	*/
	public function serch_result(){
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
	public function user_favorite_movie_list(){
		/*
		*①user_idを取得する
		*②user_idをキーに、$this->UserFavoriteMovieList->findで検索する
		*③ビューに渡す
		*/
	}

	/*
	*閲覧履歴
	*/
	public function user_watch_movie_list(){
		/*
		*①user_idを取得する
		*②user_idをキーに、$this->user_watch_movie_list->findで検索する
		*③ビューに渡す
		*/
	}

	/*
	*ムービー編集画面
	*/
	public function movie_edit(){
		/*
		*①フォームからムービーのidが送られてくる。
		*②idをキーにMovieをfindする。それをviewに渡す。
		*③フォームからmoviesの値が送られてくる。
		*④umovieにsaveする
		*⑤saveに成功したらUserDashBordにリダイレクトする、失敗したらMovie.movie_editにリダイレクトする
		*/
	}

	public function movie_delete(){
		/*
		*①フォームからムービーのidが送られてくる
		*②idをキーにmovieの論理削除カラムをアップデートする
		*/
	}



}
