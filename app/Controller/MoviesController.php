<?php
class MoviesController extends AppController {
	/*
	*利用するモデル
	*/
	public $uses = array('Movie' , 'User' , 'Restaurant' , 'TagRelation' , 'UserFavoriteMovieList' , 'UserWatchMovieList' , 'Tag' , 'TagRelation');

	/*
	*利用するコンポーネント
	*/
	public $components = array('Gurunabi');

	//MoviesControllerの中でログイン無しで入れるところの設定
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'serchResult', 'view');
    }

    public function isAuthorized($user) {

    	//contributorに権限を与えております。
        if (isset($user['role']) && $user['role'] === 'contributor') {
        	if(in_array($this->action, array('add', 'selectMovieForAdd', 'userFavoriteMovieList', 'userWatchMovieList', 'movieEdit', 'movieDelete', 'myMovieIndex'))) {
        		return true;
        	}
        }

        
        return parent::isAuthorized($user);
    }

	/*
	*トップ画面
	*/
	public function index(){
		/*
		*１）広告とする動画を検索する
		*２）オススメ動画として、東京のお店を、moviesのcount順に検索する。その際に、論理削除済みのデータは除外する。
		*３）user_idを取得する
		*４）user_idをキーにして、閲覧履歴を取得する
		*５）user_idをキーにして、お気に入り動画を取得する
		*６）ビューに渡す
		*/
	}

	/*
	*お店の個別画面
	*/
	public function view(){
		/*
		*ユーザーの閲覧履歴の登録
		*/
		//ユーザー情報の取得
		$data['user_id'] = $this->Auth->user('id');
		$data['created_user_id'] = $data['user_id'];
		$data['modified_user_id'] = $data['user_id'];

		//レストランidの取得
		if(isset($this->request['pass'][0])){
			$data['movie_id'] = $this->request['pass'][0];
			/*閲覧履歴データの登録*/
			$this->UserWatchMovieList->create();
			$flg = $this->UserWatchMovieList->save($data);
		}

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

			//保存する（レストラン）
			$rest_save_data['user_id'] = $this->Auth->user('id');
			$rest_save_data['created_user_id'] = $this->Auth->user('id');
			$rest_save_data['modified_user_id'] = $this->Auth->user('id');
			$this->Restaurant->create();
			$flg_restaurant = $this->Restaurant->save($rest_save_data);

			//保存する（ムービー）
			$movie_save_data['restaurant_id'] = $flg_restaurant['Restaurant']['id'];
			$movie_save_data['user_id'] = $this->Auth->user('id');
			$movie_save_data['title'] = $this->request->data['title'];
			$movie_save_data['description'] = $this->request->data['description'];
			$movie_save_data['youtube_url'] = 'https://www.youtube.com/watch?v=' . $this->request->data['youtube_url'];
			$movie_save_data['thumbnails_url'] = $this->request->data['thumbnails_url'];
			$movie_save_data['created_user_id'] = $this->Auth->user('id');
			$movie_save_data['modified_user_id'] = $this->Auth->user('id');
			$this->Movie->create();
			$flg_movie = $this->Movie->save($movie_save_data);

			//保存する（タグ関係）
			$tag_save_data['created_user_id'] = $this->Auth->user('id');
			$tag_save_data['modified_user_id'] = $this->Auth->user('id');
			$tag_save_data['name'] = $this->request->data['tag'];
			$tag_save_data['name'] = mb_convert_kana($tag_save_data['name'], 's');
			$tag_save_data['name'] = preg_split('/[\s]+/', $tag_save_data['name'] , -1, PREG_SPLIT_NO_EMPTY);

			$tag_relation_save_data['created_user_id'] = $this->Auth->user('id');
			$tag_relation_save_data['modified_user_id'] = $this->Auth->user('id');
			$tag_relation_save_data['movie_id'] = $this->Movie->getLastInsertID();

			foreach($tag_save_data['name'] as $key => $val){
				//タグそのもの
				$this->Tag->create();
				$tag_save_data['name'] = $val;
				$this->Tag->save($tag_save_data);
				//保存する（タグリレーションズ）
				$tag_relation_save_data['tag_id'] = $this->Tag->getLastInsertID();
				$this->TagRelation->create();
				$this->TagRelation->save($tag_relation_save_data);
			}

			//保存の判定（失敗時）
			if($flg_restaurant === false || $flg_movie === false){
				$this->Session->setFlash('登録に失敗しました。改めて登録しなおして下さい。');
				return $this->redirect(array('controller' => 'Movies', 'action' => 'selectMovieForAdd'));
			}

			//保存の判定（成功時）
			$this->Session->setFlash('登録に成功しました。');
			$this->redirect(array('controller' => 'Movies', 'action' => 'view' , $flg_restaurant['Restaurant']['id']));
		}
	}

	/*
	*検索結果画面
	*/
	public function serchResult(){
		/*
		*１）キーワードを空欄で区切って配列に変換する
		*２）moviesのname、description、restaurantsのname、access_line、access_station、category、投稿したユーザーのカラムからfindする
		*３）その際に、論理削除済みを除外し、moviesテーブルのcount順とする
		*４）検索したデータをビューに表示する
		*/
	}
	/*
	*お気に入りのムービーリスト
	*/
	public function userFavoriteMovieList(){
		/*
		*１）user_idを取得する
		*２）user_idをキーに、$this->UserFavoriteMovieList->findで検索する
		*３）ビューに渡す
		*/
	}

	/*
	*ムービー編集画面
	*/
	public function movieEdit(){
		/*
		*１）フォームからムービーのidが送られてくる。
		*２）idをキーにMovieをfindする。それをviewに渡す。
		*３）フォームからmoviesの値が送られてくる。
		*４）umovieにsaveする
		*５）saveに成功したらUserDashBordにリダイレクトする、失敗したらMovie.movie_editにリダイレクトする
		*/
	}
	public function movieDelete(){
		/*
		*１）フォームからムービーのidが送られてくる
		*２）idをキーにmovieの論理削除カラムをアップデートする
		*/
	}

	/*
	*自分の投稿したムービーの管理画面
	*/
	public function myMovieIndex(){
		/*
		*ユーザー情報を取得する
		*/
		$user = $this->Auth->user('id');
		$data = $this->UserFavoriteMovieList->find('all' , array(
			 'recursive' => 2
		));
		/*
		*お気に入りの登録がない場合
		*/
		if(empty($data)){
			$this->Session->setFlash('お気に入りはまだありません。');
		}
		/*
		*ビューに渡す
		*/
		$this->set(compact('data'));
	}

}