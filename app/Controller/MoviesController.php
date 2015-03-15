<?php
class MoviesController extends AppController {
	/*
	*利用するモデル
	*/
	public $uses = array('Movie' , 'User' , 'Restaurant' , 'TagRelation' , 'UserFavoriteMovieList' , 'UserWatchMovieList' , 'Tag' , 'TagRelation');

	/*
	*利用するコンポーネント
	*/
	public $components = array('Gurunabi' , 'Paginator');

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

		if(isset($this->request['pass'][0])){
				if(!empty(($this->userSession))) {
				/*
				*UserWatchMovieListの登録
				*/
				$data['user_id'] = $this->userSession['id'];
				$data['created_user_id'] = $this->userSession['id'];
				$data['modified_user_id'] = $this->userSession['id'];
				$data['movie_id'] = $this->request['pass'][0];
				$this->UserWatchMovieList->create();
				$flg = $this->UserWatchMovieList->save($data);
			}
			/*
			*Movieの検索
			*/
			$this->Restaurant->unbindModel(
	            array('hasMany' =>array('Movie'))
	        );
			$this->TagRelation->unbindModel(
	            array('belongsTo' =>array('Movie'))
	        );
			$this->User->unbindModel(
	            array('hasMany' =>array('Movie' , 'UserFavoriteMovieList' , 'UserWatchMovieList'))
	        );
			$movie = $this->Movie->find('first', array(
				'conditions' => array('Movie.id' => $this->request['pass'][0]),
				'recursive' => 2

			));
			/*
			*Movieの再生回数をUpdate
			*/
			$streaming_count = $movie['Movie']['count'] + 1;
			$this->Movie->id = $this->request['pass'][0];  
			$this->Movie->saveField('count', $streaming_count);
			/*
			*viewに表示
			*/
			$this->set(compact('movie'));
		} else {
			$this->Session->setFlash('お探しの動画はありませんでした。申し訳ございません。');
			return $this->redirect(array('controller' => 'Movies', 'action' => 'index'));
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
			$rest_save_data['user_id'] = $user = $this->userSession['id'];
			$rest_save_data['created_user_id'] = $user = $this->userSession['id'];
			$rest_save_data['modified_user_id'] = $user = $this->userSession['id'];
			$this->Restaurant->create();
			$flg_restaurant = $this->Restaurant->save($rest_save_data);

			//保存する（ムービー）
			$movie_save_data['restaurant_id'] = $flg_restaurant['Restaurant']['id'];
			$movie_save_data['user_id'] = $user = $this->userSession['id'];
			$movie_save_data['title'] = $this->request->data['title'];
			$movie_save_data['description'] = $this->request->data['description'];
			$movie_save_data['youtube_url'] = 'https://www.youtube.com/watch?v=' . $this->request->data['youtube_url'];
			$movie_save_data['thumbnails_url'] = $this->request->data['thumbnails_url'];
			$movie_save_data['created_user_id'] = $user = $this->userSession['id'];
			$movie_save_data['modified_user_id'] = $user = $this->userSession['id'];
			$this->Movie->create();
			$flg_movie = $this->Movie->save($movie_save_data);

			//保存する（タグ関係）
			$tag_save_data['created_user_id'] = $user = $this->userSession['id'];
			$tag_save_data['modified_user_id'] = $user = $this->userSession['id'];
			$tag_save_data['name'] = $this->request->data['tag'];
			$tag_save_data['name'] = mb_convert_kana($tag_save_data['name'], 's');
			$tag_save_data['name'] = preg_split('/[\s]+/', $tag_save_data['name'] , -1, PREG_SPLIT_NO_EMPTY);

			$tag_relation_save_data['created_user_id'] = $user = $this->userSession['id'];
			$tag_relation_save_data['modified_user_id'] = $user = $this->userSession['id'];
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
		*ユーザーのお気に入りの動画を検索する（ページネーション）
		*/
		$this->Paginator->settings =array(
			'conditions' => array('UserFavoriteMovieList.user_id' => $this->userSession['id']),
			'order' => array('UserFavoriteMovieList.created' => 'DESC'),
			'limit' => 1
		);
		$UserFavoriteMovieList = $this->Paginator->paginate('UserFavoriteMovieList');
		/*
		*viewにセット
		*/
		$this->set(compact('UserFavoriteMovieList'));
	}

	/*
	*ユーザーの閲覧履歴
	*/
	public function userWatchMovieList(){
		/*
		*ユーザーが過去に見た動画を検索する（ページネーション）
		*/
		$this->Paginator->settings =array(
			'conditions' => array('UserWatchMovieList.user_id' => $this->userSession['id']),
			'order' => array('UserWatchMovieList.created' => 'DESC'),
			'limit' => 1
		);
		$UserWatchMovieList = $this->Paginator->paginate('UserWatchMovieList');
		/*
		*viewにセット
		*/
		$this->set(compact('UserWatchMovieList'));
	}

	/*
	*ムービー編集画面
	*/
	public function edit($id = null){
		/*
		*引数にidが指定してあるかどうかをチェックする
		*/
	    if (!$id) {
			$this->Session->setFlash('申し訳ございません。こちらの動画はございませんでした');
			return $this->redirect(array('controller' => 'Users', 'action' => 'dashBoard'));
	    }

	    /*
	    *ムービを検索する
	    */
	    $movie = $this->Movie->findById($id);
	    if (!$movie) {
			$this->Session->setFlash('申し訳ございません。こちらの動画はございませんでした');
			return $this->redirect(array('controller' => 'Users', 'action' => 'dashBoard'));
	    }

	    /*
	    *ムービーの投稿者と一致しているかを判定する
	    */
	    if($movie['Movie']['user_id'] !== $this->userSession['id']){
			$this->Session->setFlash('申し訳ございません。こちらの動画は投稿したご本人様にのみご編集頂けます');
			return $this->redirect(array('controller' => 'Users', 'action' => 'dashBoard'));
	    }

	    /*
	    *フォームが送信されていなければ、formの初期値をviewに渡してあげる
	    */
	    if (!$this->request->data) {
	        $this->request->data = $movie;
	        $this->set(compact('movie'));
	        return;
	    }

	    /*
	    *フォームが送信されていれば、動画をアップデートする
	    */
	    if ($this->request->is(array('post', 'put'))) {

	    	/*
	    	*一部項目のみアップデート
	    	*/
			$data = array('Movie' => array('id' => $id, 'title' => $this->request->data['Movie']['title'] , 'description' => $this->request->data['Movie']['description']));
			$fields = array('title' , 'description'); 
			$this->Movie->save($data, false, $fields);

	        if ($this->Movie->save($this->request->data)) {
	            $this->Session->setFlash(__('動画の編集が完了しました.'));
	            return $this->redirect(array('controller' => 'Users', 'action' => 'dashBoard'));
	        }
	        $this->Session->setFlash(__('申し訳ございません。動画の編集に失敗しました。'));
	        return $this->redirect(array('controller' => 'Movies', 'action' => 'edit'));
	    }

	}
	public function delete(){
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
		$this->Movie->unbindModel(
            array('belongsTo' =>array('User'))
        );
		$this->Restaurant->unbindModel(
            array('hasMany' =>array('Movie'))
        );
		$this->TagRelation->unbindModel(
            array('belongsTo' =>array('Movie'))
        );
		$this->Paginator->settings = array(
			 'conditions' => array(
			 	'Movie.user_id' => $this->userSession['id'],
			 	'Movie.del_flg' => 0
			 ),
			 'limit' => 1,
			 'order' => array('Movie.created' => 'DESC'),
			 'recursive' => 2
		);
		$userMoviePostHistory = $this->Paginator->paginate('Movie');
		/*
		*登録した動画がまだない場合
		*/
		if(empty($userMoviePostHistory)){
			$this->Session->setFlash('投稿した動画はまだありません。');
			return $this->redirect(array('controller' => 'Users', 'action' => 'dashBoard'));
		}
		/*
		*ビューに渡す
		*/
		$this->set(compact('userMoviePostHistory'));
	}

}