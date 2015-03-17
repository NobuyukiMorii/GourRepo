<?php

class MoviesController extends AppController {
	/*
	*利用するモデル
	*/
	public $uses = array('Movie' , 'User' , 'Restaurant' , 'TagRelation' , 'UserFavoriteMovieList' , 'UserWatchMovieList' , 'Tag' , 'TagRelation' , 'UserProfile');

	/*
	*利用するコンポーネント
	*/
	public $components = array('Gurunabi' , 'YouTube' , 'Paginator');

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
        /*
        *ムービーを検索する
        */
		$data = $this->Movie->find('all' ,array(
			'limit' => 3,
			'conditions' => array('Movie.del_flg' => 0),
			'order' => array('Movie.count' => 'DESC')
		));
		$this->set(compact('data'));
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
			$this->set(compact('movie' , 'movies_in_same_restaurant'));

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
			//同じぐるなびidがあれば新規にsaveする
			$existent_restraunt = $this->Restaurant->find('all' , array(
				'conditions' => array('Restaurant.gournabi_id' => $option['id'])
			));
			//レストランが未登録の場合
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
				$flg_restaurant = $this->Restaurant->save($rest_save_data);
				//エラーハンドリング
				if($flg_restaurant === false){
					$this->Session->setFlash('レストランの登録に失敗しました。改めて登録しなおして下さい。');
					return $this->redirect(array('controller' => 'Movies', 'action' => 'selectMovieForAdd'));
				}
			}
			//既にレストランが登録してある場合
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
			$movie_save_data['thumbnails_url'] = $this->request->data['thumbnails_url'];
			$movie_save_data['created_user_id'] = $this->userSession['id'];
			$movie_save_data['modified_user_id'] = $this->userSession['id'];
			$this->Movie->create();
			$flg_movie = $this->Movie->save($movie_save_data);

			if($flg_movie === false){
				$this->Session->setFlash('動画の登録に失敗しました。改めて登録しなおして下さい。');
				return $this->redirect(array('controller' => 'Movies', 'action' => 'selectMovieForAdd'));
			}

			//保存する（タグ関係）
			$tag_save_data['created_user_id'] = $this->userSession['id'];
			$tag_save_data['modified_user_id'] = $this->userSession['id'];
			$tag_save_data['name'] = $this->request->data['tag'];
			$tag_save_data['name'] = mb_convert_kana($tag_save_data['name'], 's');
			$tag_save_data['name'] = preg_split('/[\s]+/', $tag_save_data['name'] , -1, PREG_SPLIT_NO_EMPTY);

			$tag_relation_save_data['created_user_id'] = $this->userSession['id'];
			$tag_relation_save_data['modified_user_id'] = $this->userSession['id'];
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

			//保存の判定（成功時）
			$this->Session->setFlash('登録に成功しました。');
			$this->redirect(array('controller' => 'Movies', 'action' => 'view' , $tag_relation_save_data['movie_id']));
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

		// select * from movies where id = 9;とおなじ
		$this->User->unbindModel(
		            array('hasMany' =>array('Movie' , 'UserFavoriteMovieList', 'UserWatchMovieList'))
		        );
		$this->Restaurant->unbindModel(
		            array('hasMany' =>array('Movie','UserProfile'))
		        );
        // $this->UserProfile->find(
        // array('conditions' =>array('UserProfile','user_name' === $_POST['areaname']))
        // );

        $UserName = $this->UserProfile->find('all',array(
        'conditions'=>
        array( '`UserProfile`.`name` LIKE ' => '%'.$_POST['areaname'].'%'
        ),
        'fields' =>array('user_id','name')
        ));

        if(!empty($UserName)){
	        //echo var_dump($UserName);

	        //キーワードに合致したuser_idだけの配列を作成する
	        $user_id_array = array();

	        foreach ($UserName as $key => $value) {
	        //debug($value);
	        //配列に値を追加する
	        $user_id_array[] = $value['UserProfile']['user_id'];

	        }

	        //echo var_dump($user_id_array);


			// $this->User->recursive=2;
			$results = $this->Movie->find('all',array(
				'conditions'=>
					array(
					'OR' =>
						array( 
							'`Movie`.`title` LIKE '     => '%'.$_POST['areaname'].'%',
							'`Movie`.`description` LIKE '     => '%'.$_POST['areaname'].'%',
							'`Restaurant`.`name` LIKE '          => '%'.$_POST['areaname'].'%',
							'`Restaurant`.`access_line` LIKE '  => '%'.$_POST['areaname'].'%',
							'`Restaurant`.`access_station` LIKE '=> '%'.$_POST['areaname'].'%',
							'`Restaurant`.`category` LIKE '      => '%'.$_POST['areaname'].'%',
							'`Restaurant`.`address` LIKE '      => '%'.$_POST['areaname'].'%',
							'`Movie`.`user_id` IN '        => $user_id_array
						)
					),
				'recursive' => 2
				)
			);
		}

		if(empty($UserName)){

		    // $this->User->recursive=2;
			$results = $this->Movie->find('all',array(
				'conditions'=>
				array(
					'OR' =>
						array( 
							'`Movie`.`title` LIKE '     => '%'.$_POST['areaname'].'%',
							'`Movie`.`description` LIKE '     => '%'.$_POST['areaname'].'%',
							'`Restaurant`.`name` LIKE '          => '%'.$_POST['areaname'].'%',
							'`Restaurant`.`access_line` LIKE '  => '%'.$_POST['areaname'].'%',
							'`Restaurant`.`access_station` LIKE '=> '%'.$_POST['areaname'].'%',
							'`Restaurant`.`category` LIKE '      => '%'.$_POST['areaname'].'%',
							'`Restaurant`.`address` LIKE '      => '%'.$_POST['areaname'].'%',
						)
					),
					'recursive' => 2
				)
			);

		} 
		// exit;

		$this->set('results',$results);
		//echo var_dump($_POST['areaname']);
	}
	/*
	*お気に入りのムービーリスト
	*/
	public function userFavoriteMovieList(){
		/*
		*ユーザーのお気に入りの動画を検索する（ページネーション）
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
		$this->Paginator->settings =array(
			'conditions' => array('UserFavoriteMovieList.user_id' => $this->userSession['id']),
			'order' => array('UserFavoriteMovieList.created' => 'DESC'),
			'limit' => 5,
			'recursive' => 3
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
		$this->Movie->unbindModel(
            array('belongsTo' =>array('User'))
        );
		$this->Restaurant->unbindModel(
            array('hasMany' =>array('Movie'))
        );
		$this->TagRelation->unbindModel(
            array('belongsTo' =>array('Movie'))
        );
		$this->Paginator->settings =array(
			'conditions' => array('UserWatchMovieList.user_id' => $this->userSession['id']),
			'order' => array('UserWatchMovieList.created' => 'DESC'),
			'limit' => 5,
			'recursive' => 3
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
	            $this->Session->setFlash(__('動画の編集が完了しました.'));
	            return $this->redirect(array('controller' => 'Movies', 'action' => 'myMovieIndex'));
	        }
	        $this->Session->setFlash(__('申し訳ございません。動画の編集に失敗しました。'));
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
			 'limit' => 5,
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