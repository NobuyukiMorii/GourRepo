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
	*お店の個別画面
	*/
	public function view(){

	}

	/*
	*「アップロードボタン」が押された時のムービーの選択画面
	*/
	public function selectMovieForAdd(){

		//都道府県マスタ取得
		$pref_search_info = $this->Gurunabi->prefSearch();
		//大業態マスタ取得
		$category_large_search_info = $this->Gurunabi->categoryLargeSearch();
		//お店情報の取得
		if(!empty($this->request->data)){
			$rest_search_info = $this->Gurunabi->RestSearch($this->request->data);
		} else {
			$rest_search_info = $this->Gurunabi->RestSearch();
		}
		//お店情報のバリデーション
		$rest_search_info = $this->Gurunabi->ValidateRestInfo($rest_search_info);

		$this->set(compact('pref_search_info' , 'category_large_search_info' , 'rest_search_info'));
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
		if(empty($this->request->data)){
			$this->set('gournabi_id' , $this->params['pass'][0]);
		}

		if(!empty($this->request->data)){
			//ぐるなびidを取得する
			$option['id'] = $this->request->data['gournabi_id'];

			//レストランをぐるなびから検索して取得する
			$rest_search_info = $this->Gurunabi->RestSearch($option);
			//DBに保存出来る形に配列を整理する
			$rest_save_data = $this->Gurunabi->ParseArrayForDB($rest_search_info);

			//バリデーションする
			$rest_save_data = $this->Gurunabi->ValidationBeforeSave($rest_save_data);



			//登録時の基本情報を追加する
			$rest_save_data['created_user_id'] = 1;
			$rest_save_data['modified_user_id'] = 1;
			//保存する
			$this->Restaurant->create();
			$flg = $this->Restaurant->save($rest_save_data);
			//保存の判定

			pr($flg);
			exit;
		}


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