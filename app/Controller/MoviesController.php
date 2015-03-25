<?php

class MoviesController extends AppController {
	/*
	*利用するヘルパー
	*/
	public $helpers = array('UploadPack.Upload');
	/*
	*利用するモデル
	*/
	public $uses = array('Movie' , 'User' , 'Restaurant' , 'TagRelation' , 'UserFavoriteMovieList' , 'UserWatchMovieList' , 'Tag' , 'TagRelation' , 'UserProfile' , 'Preference' , 'LargeCategory' , 'SmallCategory' , 'LargeArea' , 'MiddleArea' , 'SmallArea');

	/*
	*利用するコンポーネント
	*/
	public $components = array('Gurunabi' , 'YouTube' , 'Paginator');

	//MoviesControllerの中でログイン無しで入れるところの設定
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'serchResult', 'view' , 'reporterMovieList');
    }

    public function isAuthorized($user) {
    	//contributorに権限を与えております。
        if (isset($user['role']) && $user['role'] === 'contributor') {
        	if(in_array($this->action, array('add', 'selectMovieForAdd', 'selectRestForAddMovie' , 'userFavoriteMovieList', 'userWatchMovieList', 'edit', 'delete', 'myMovieIndex', 'selectRestForAddMovie'))) {
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
		*動画情報を取得する
		*/
		$this->User->unbindModel(
            array('hasMany' =>array('Movie' , 'UserFavoriteMovieList' , 'UserWatchMovieList'))
        );
		$this->TagRelation->unbindModel(
            array('belongsTo' =>array('Movie'))
        );
		$this->Restaurant->unbindModel(
            array('hasMany' =>array('Movie'))
        );
		$this->TagRelation->unbindModel(
            array('belongsTo' =>array('Movie'))
        );
        /*
        *ムービーを検索する
        */
		$data = $this->Movie->find('all' ,array(
			'limit' => 3,
			'conditions' => array('Movie.del_flg' => 0),
			'order' => array('Movie.count' => 'DESC'),
			'recursive' => 2
		));
		$this->set(compact('data'));
	}

	/*
	*お店の個別画面
	*/
	public function view(){

		$this->autoLayout = false; 

		if(isset($this->request['pass'][0])){
			if(!empty($this->userSession)) {
				/*
				*20分以上前までに動画を見ていなければ閲覧履歴に登録
				*/
				$last_watch_time =  date('Y-m-d H:i:s',strtotime( "-1 minute"));
				$recent_watch = $this->UserWatchMovieList->find('count' , array(
					'conditions' => array(
						'UserWatchMovieList.movie_id' => $this->request['pass'][0],
						'UserWatchMovieList.user_id' => $this->userSession['id'],
						'UserWatchMovieList.created >' => $last_watch_time
					)
				));
				/*
				*動画を保存
				*/
				if($recent_watch > 0){
					$data['user_id'] = $this->userSession['id'];
					$data['created_user_id'] = $this->userSession['id'];
					$data['modified_user_id'] = $this->userSession['id'];
					$data['movie_id'] = $this->request['pass'][0];
					$this->UserWatchMovieList->create();
					$flg = $this->UserWatchMovieList->save($data);
				}
			}

			/*
			*Movieの検索（メインの動画）
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
			*Movieの検索（レコメンドの動画）
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
			$movies_in_same_restaurant = $this->Movie->find('all' , array(
				'conditions' => array(
					'Movie.restaurant_id' => $movie['Restaurant']['id'],
					'Movie.del_flg' => 0,
					'not' => array('Movie.id' => $this->request['pass'][0])
				),
				'recursive' => 2,
				'limit' => 5
			));

			/*
			*Movieの再生回数をUpdate
			*/
			$streaming_count = $movie['Movie']['count'] + 1;

			// 更新する内容を設定
			$count_data = array('Movie' => array('id' => $this->request['pass'][0] , 'count' => $streaming_count));
			// 更新する項目（フィールド指定）
			$fields = array('count');
			$this->Movie->id = $this->request['pass'][0];
			try {
				$flg_movie_count = $this->Movie->save($count_data, false, $fields);
			} catch (Exception $e) {
				$this->Session->setFlash('カウント回数の更新に失敗しました。');
			}
			if(empty($flg_movie_count)){
				$this->Session->setFlash('なんか変だったよ。');
			}

			/*
			*viewに表示
			*/
			$this->set(compact('movie' , 'movies_in_same_restaurant'));

		} else {
			$this->Session->setFlash('お探しの動画はありませんでした。申し訳ございません。');
			return $this->redirect(array('controller' => 'Movies', 'action' => 'index'));
		}
	}

	/*
	*「アップロードボタン」が押された時のムービーの選択画面（DB利用しない）
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
	*「アップロードボタン」が押された時のムービーの選択画面（DB利用）
	*/
	public function selectRestForAddMovie(){
		/*
		*リクエストが送られてきた場合、レストランを検索する
		*/
		if($this->request->data){
			$restaurants = $this->Restaurant->find('all' , array(
				'conditions' => array(
					'Restaurant.name LIKE ' => '%'.$this->request->data['Movie']['name'].'%',
					'Restaurant.category_code_s' => $this->request->data['Movie']['SmallCategory']
				),
			));

		}

		/*
		*カテゴリー（大）の検索
		*/
		$LargeCategory = $this->LargeCategory->find('all');
		/*
		*現在のうrlを取得
		*/
		$host = $_SERVER["HTTP_HOST"];
		$this->set(compact('LargeCategory','host'));
	}

	/*
	*動画投稿画面
	*/
	public function add(){
		/*
		*レイアウトを変更
		*/
		$this->layout = 'default-for-form';

		/*
		*$this->request->dataがない時
		*/
		if(empty($this->request->data)){
			$this->set('gournabi_id' , $this->params['pass'][0]);
		}

		if(!empty($this->request->data)){

			//ぐるなびidを取得する
			$option['id'] = $this->request->data['gournabi_id'];
			//同じぐるなびidがなければ新規にsaveする
			$existent_restraunt = $this->Restaurant->find('all' , array(
				'conditions' => array('Restaurant.gournabi_id' => $option['id'])
			));
			//レストランが未登録の場合、レストランを登録する
			if(empty($existent_restraunt)){
				//レストランをぐるなびから検索して取得する
				$rest_search_info = $this->Gurunabi->RestSearch($option);
				//DBに保存出来る形に配列を整理する
				$rest_save_data = $this->Gurunabi->ParseArrayForDB($rest_search_info);
				//バリデーションする
				$rest_save_data = $this->Gurunabi->ValidationBeforeSave($rest_save_data);
				//保存する（レストラン）
				$rest_save_data['user_id'] = $this->userSession['id'];
				$rest_save_data['created_user_id'] = $this->userSession['id'];
				$rest_save_data['modified_user_id'] = $this->userSession['id'];
				$this->Restaurant->create();
				try {
					$flg_restaurant = $this->Restaurant->save($rest_save_data);
				} catch (Exception $e) {
					$this->Session->setFlash('レストランの登録に失敗しました。改めて登録しなおして下さい。');
					return $this->redirect(array('controller' => 'Movies', 'action' => 'selectMovieForAdd'));
				}
				//エラーハンドリング
				if($flg_restaurant === false){
					$this->Session->setFlash('レストランの登録に失敗しました。改めて登録しなおして下さい。');
					return $this->redirect(array('controller' => 'Movies', 'action' => 'selectMovieForAdd'));
				}
			}
			//既にレストランが登録してある場合、レストランを登録しないで、動画だけ登録する
			if(!empty($existent_restraunt)){
				$flg_restaurant['Restaurant']['id'] = $existent_restraunt[0]['Restaurant']['id'];
			}

			//保存する（ムービー）
			$movie_save_data['restaurant_id'] = $flg_restaurant['Restaurant']['id'];
			$movie_save_data['user_id'] = $this->userSession['id'];
			$movie_save_data['title'] = $this->request->data['title'];
			$movie_save_data['description'] = $this->request->data['description'];
			$movie_save_data['youtube_url'] = 'https://www.youtube.com/watch?v=' . $this->request->data['youtube_url'];
			$movie_save_data['youtube_iframe_url'] = $this->YouTube->get_youtube_iframe_url($movie_save_data['youtube_url']);
			if(empty($movie_save_data['youtube_iframe_url'])){
				$this->Session->setFlash('こちらの動画は登録出来ません。');
				return $this->redirect(array('controller' => 'Movies', 'action' => 'selectMovieForAdd'));
			}
			$movie_save_data['thumbnails_url'] = $this->request->data['thumbnails_url'];
			$movie_save_data['created_user_id'] = $this->userSession['id'];
			$movie_save_data['modified_user_id'] = $this->userSession['id'];
			$this->Movie->create();

			//エラーの判定（ムービー）
			try {
				$flg_movie = $this->Movie->save($movie_save_data);
			} catch (Exception $e) {
				$this->Session->setFlash('動画の登録に失敗しました。改めて登録しなおして下さい。');
				return $this->redirect(array('controller' => 'Movies', 'action' => 'selectMovieForAdd'));
			}

			//保存する（タグ関係）
			$tag_save_data['created_user_id'] = $this->userSession['id'];
			$tag_save_data['modified_user_id'] = $this->userSession['id'];
			$tag_save_data['name'] = $this->request->data['tag'];
			$tag_save_data['name'] = mb_convert_kana($tag_save_data['name'], 's');
			$tag_save_data['name'] = preg_split('/[\s]+/', $tag_save_data['name'] , -1, PREG_SPLIT_NO_EMPTY);
			$tag_save_data['name'] = array_unique($tag_save_data['name']);
			$tag_save_data['name'] = array_merge($tag_save_data['name']);

			$tag_relation_save_data['created_user_id'] = $this->userSession['id'];
			$tag_relation_save_data['modified_user_id'] = $this->userSession['id'];
			$tag_relation_save_data['movie_id'] = $this->Movie->getLastInsertID();

			foreach($tag_save_data['name'] as $key => $val){
				//タグそのもの
				$this->Tag->create();
				$tag_save_data['name'] = $val;
				try {
					$this->Tag->save($tag_save_data);
				} catch(Exception $e) {
					$this->Session->setFlash('タグの登録に失敗しました。改めて登録しなおして下さい。');
					return $this->redirect(array('controller' => 'Movies', 'action' => 'selectMovieForAdd'));
				}
				//保存する（タグリレーションズ）
				$tag_relation_save_data['tag_id'] = $this->Tag->getLastInsertID();
				$this->TagRelation->create();
				try {
					$this->TagRelation->save($tag_relation_save_data);
				} catch(Exception $e) {
					$this->Session->setFlash('タグの登録に失敗しました。改めて登録しなおして下さい。');
					return $this->redirect(array('controller' => 'Movies', 'action' => 'selectMovieForAdd'));
				}
			}

			//保存の判定（成功時）
			$this->Session->setFlash('登録に成功しました。');
			$this->redirect(array('controller' => 'Movies', 'action' => 'view' , $tag_relation_save_data['movie_id']));
		}
	}

	/*
	*検索結果画面
	*/
	public function serchResult(){

		//ポストされた場合
		if(!empty($this->request->data['areaname'])){

			//送信されてきたデータをviewに渡す
			$areaname = $this->request->data['areaname'];

			$this->set('areaname',$areaname);

			//ユーザープロフィールを検索する
			$this->User->unbindModel(
	            array('hasMany' =>array('Movie' , 'UserFavoriteMovieList', 'UserWatchMovieList'))
	        );
			$this->Restaurant->unbindModel(
	            array('hasMany' =>array('Movie','UserProfile'))
	        );
	        $UserName = $this->UserProfile->find('all',array(
	        	'conditions'=>
	        		array( '`UserProfile`.`name` LIKE ' => '%'.$this->request->data['areaname'].'%'
	        			),
	        	'fields' =>array('user_id','name')
	        ));

	        //ユーザープロフィールがあるかどうかを判定する
	        if(!empty($UserName)){

		        //キーワードに合致したuser_idだけの配列を作成する
		        $user_id_array = array();
		        foreach ($UserName as $key => $value) {
			        $user_id_array[] = $value['UserProfile']['user_id'];

		        }

		        //条件おw設定する
	        	$conditions = array(
					'OR' =>
					array(	
						'`Movie`.`title` LIKE '			     =>	'%'.$this->request->data['areaname'].'%',
						'`Movie`.`description` LIKE '	     => '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`name` LIKE '          => '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`access_line` LIKE '   => '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`access_station` LIKE '=> '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`category_name_s` LIKE '      => '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`category_name_l` LIKE '      => '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`address` LIKE '       => '%'.$this->request->data['areaname'].'%',
						'`Movie`.`user_id` IN '        		 => $user_id_array
					),
					'Movie.del_flg' => 0
				);
			}

			if(empty($UserName)){

		        //条件おw設定する
	        	$conditions = array(
					'OR' =>
					array(	
						'`Movie`.`title` LIKE '			     =>	'%'.$this->request->data['areaname'].'%',
						'`Movie`.`description` LIKE '	     => '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`name` LIKE '          => '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`access_line` LIKE '   => '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`access_station` LIKE '=> '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`category_name_s` LIKE '      => '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`category_name_l` LIKE '      => '%'.$this->request->data['areaname'].'%',
						'`Restaurant`.`address` LIKE '       => '%'.$this->request->data['areaname'].'%',
					),
					'Movie.del_flg' => 0
				);
			}


			$this->Paginator->settings = array(
				 'conditions' => $conditions,
				 'limit' => 10,
				 'order' => array('Movie.count' => 'DESC'),
				 'recursive' => 2
			);
			$results = $this->Paginator->paginate('Movie');

		}

		//ポストされなかった場合
		if(empty($this->request->data['areaname'])){
			$conditions = array(
				'Movie.del_flg' => 0
			);
			$this->Paginator->settings = array(
				 'conditions' => $conditions,
				 'limit' => 10,
				 'order' => array('Movie.count' => 'DESC'),
				 'recursive' => 2
			);
			$results = $this->Paginator->paginate('Movie');
		}

		if(empty($results)){
			$this->Session->setFlash('お探しの動画はありませんでした。');
		}

		//最新の動画を検索する
		$this->Movie->unbindModel(
            array('belongsTo' =>array('User'))
        );
		$this->Restaurant->unbindModel(
            array('hasMany' =>array('Movie'))
        );
		$this->TagRelation->unbindModel(
            array('belongsTo' =>array('Movie'))
        );
		$new_movies = $this->Movie->find('all' , array(
			 'conditions' => array(
			 	'Movie.del_flg' => 0
			 ),
			 'limit' => 10,
			 'order' => array('Movie.created' => 'DESC'),
			 'recursive' => 2
		));
		
		$this->set(compact('results' , 'new_movies'));
	}

	/*
	*お気に入りのムービーリスト
	*/
	public function userFavoriteMovieList(){
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
		$this->Paginator->settings =array(
			'conditions' => array(
				'UserFavoriteMovieList.user_id' => $this->userSession['id'],
				'Movie.del_flg' => 0
			),
			'order' => array('UserFavoriteMovieList.created' => 'DESC'),
			'limit' => 20,
			'recursive' => 2
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
		$this->User->unbindModel(
            array('hasMany' =>array('Movie', 'UserFavoriteMovieList' , 'UserWatchMovieList'))
        );
		$this->Restaurant->unbindModel(
            array('hasMany' =>array('Movie'))
        );
		$this->TagRelation->unbindModel(
            array('belongsTo' =>array('Movie'))
        );
		$this->Paginator->settings =array(
			'conditions' => array(
				'UserWatchMovieList.user_id' => $this->userSession['id'],
				'Movie.del_flg' => 0
			),
			'order' => array('UserWatchMovieList.created' => 'DESC'),
			'limit' => 50,
			'recursive' => 2
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
		*レイアウトを変更
		*/
		$this->layout = 'default-for-form';
		/*
		*引数にidが指定してあるかどうかをチェックする
		*/
	    if (!$id) {
			$this->Session->setFlash('申し訳ございません。こちらの動画はございませんでした');
			return $this->redirect(array('controller' => 'Movies', 'action' => 'myMovieIndex'));
	    }

	    /*
	    *ムービを検索する
	    */
	    $movie = $this->Movie->findById($id);
	    if (!$movie) {
			$this->Session->setFlash('申し訳ございません。こちらの動画はございませんでした');
			return $this->redirect(array('controller' => 'Movies', 'action' => 'myMovieIndex'));
	    }

	    /*
	    *ムービーの投稿者と一致しているかを判定する
	    */
	    if($movie['Movie']['user_id'] !== $this->userSession['id']){
			$this->Session->setFlash('申し訳ございません。こちらの動画は投稿したご本人様にのみご編集頂けます');
			return $this->redirect(array('controller' => 'Movies', 'action' => 'myMovieIndex'));
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
			$flg = $this->Movie->save($data, false, $fields);

		    /*
		    *タグを保存する
		    */
			$tag_save_data['created_user_id'] = $this->userSession['id'];
			$tag_save_data['modified_user_id'] = $this->userSession['id'];
			$tag_save_data['name'] = $this->request->data['Tag']['name'];
			$tag_save_data['name'] = mb_convert_kana($tag_save_data['name'], 's');
			$tag_save_data['name'] = preg_split('/[\s]+/', $tag_save_data['name'] , -1, PREG_SPLIT_NO_EMPTY);
			$tag_save_data['name'] = array_unique($tag_save_data['name']);
			$tag_save_data['name'] = array_merge($tag_save_data['name']);

			$tag_relation_save_data['created_user_id'] = $this->userSession['id'];
			$tag_relation_save_data['modified_user_id'] = $this->userSession['id'];
			$tag_relation_save_data['movie_id'] = $flg['Movie']['id'];

			foreach($tag_save_data['name'] as $key => $val){
				//タグそのもの
				$this->Tag->create();
				$tag_save_data['name'] = $val;
				$flg = $this->Tag->save($tag_save_data);
				//保存する（タグリレーションズ）
				$tag_relation_save_data['tag_id'] = $this->Tag->getLastInsertID();
				$this->TagRelation->create();
				$this->TagRelation->save($tag_relation_save_data);
			}

	        if ($flg) {
	            $this->Session->setFlash(__('動画の編集が完了しました.'));
	            return $this->redirect(array('controller' => 'Movies', 'action' => 'myMovieIndex'));
	        }

	        $this->Session->setFlash(__('申し訳ございません。動画の編集に失敗しました。'));
	        return $this->redirect(array('controller' => 'Movies', 'action' => 'edit'));
	    }

	}
	public function delete(){

 		if ($this->request->is(array('post', 'put'))) {
		    /*
		    *ムービを検索する
		    */
		    $movie = $this->Movie->findById($this->request->data['Movie']['id']);
		    if (!$movie) {
				$this->Session->setFlash('申し訳ございません。こちらの動画はございませんでした');
				return $this->redirect(array('controller' => 'Movies', 'action' => 'myMovieIndex'));
		    }

		    /*
		    *ムービーの投稿者と一致しているかを判定する
		    */
		    if($movie['Movie']['user_id'] !== $this->userSession['id']){
				$this->Session->setFlash('申し訳ございません。こちらの動画は投稿したご本人様にのみご編集頂けます');
				return $this->redirect(array('controller' => 'Movies', 'action' => 'myMovieIndex'));
		    }

	    	/*
	    	*del_flgのみアップデート
	    	*/
			$data = array('Movie' => array('id' => $this->request->data['Movie']['id'], 'del_flg' => 1));
			$fields = array('del_flg'); 
			$flg = $this->Movie->save($data, false, $fields);

			/*
			*エラーのハンドリング
			*/
	        if ($flg) {
	            $this->Session->setFlash(__('動画を削除しました.'));
	            return $this->redirect(array('controller' => 'Movies', 'action' => 'myMovieIndex'));
	        }
	        $this->Session->setFlash(__('申し訳ございません。動画の削除に失敗しました。'));
	        return $this->redirect(array('controller' => 'Movies', 'action' => 'edit'));
	    }

	}

	/*
	*自分の投稿したムービーの管理画面
	*/
	public function myMovieIndex(){
		/*
		*ユーザー情報を取得する
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
		$this->Paginator->settings = array(
			 'conditions' => array(
			 	'Movie.user_id' => $this->userSession['id'],
			 	'Movie.del_flg' => 0
			 ),
			 'limit' => 20,
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

	/*
	*レポーターの動画を一覧で見る画面
	*/
	public function reporterMovieList($id){
		/*
		*ムービーの取得
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
		$this->Paginator->settings = array(
			 'conditions' => array(
			 	'Movie.user_id' => $id,
			 	'Movie.del_flg' => 0
			 ),
			 'limit' => 20,
			 'order' => array('Movie.created' => 'DESC'),
			 'recursive' => 2
		);
		$movie = $this->Paginator->paginate('Movie');
		/*
		*レポーターの検索
		*/
		$this->Movie->unbindModel(
            array('belongsTo' =>array('User'))
        );
		$this->User->unbindModel(
            array('hasMany' =>array('Movie', 'UserFavoriteMovieList' , 'UserWatchMovieList'))
        );
		$user = $this->User->findById($id);
		/*
		*ビューに送る
		*/
		$this->set(compact('movie' , 'user'));
	}

}