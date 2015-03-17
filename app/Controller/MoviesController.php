<?php
class MoviesController extends AppController {
	/*
	*利用するモデル
	*/
	public $uses = array('Movie' , 'User' , 'Restaurant' , 'TagRelation','UserProfile');

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
		$rest_save_data['user_id'] = 1; //後ほど削除
		$rest_save_data['created_user_id'] = 1; //後ほど削除
		$rest_save_data['modified_user_id'] = 1; //後ほど削除
		$this->Restaurant->create();
		$flg_restaurant = $this->Restaurant->save($rest_save_data);

		//保存する（ムービー）
		$movie_save_data['restaurant_id'] = $flg_restaurant['Restaurant']['id'];
		$movie_save_data['user_id'] = 1;
		$movie_save_data['title'] = $this->request->data['title'];
		$movie_save_data['description'] = $this->request->data['description'];
		$movie_save_data['youtube_url'] = 'https://www.youtube.com/watch?v=' . $this->request->data['youtube_url'];
		$movie_save_data['thumbnails_url'] = $this->request->data['thumbnails_url'];
		$movie_save_data['created_user_id'] = 1; //後ほど削除
		$movie_save_data['modified_user_id'] = 1; //後ほど削除
		$this->Movie->create();
		$flg_movie = $this->Movie->save($movie_save_data);

		//保存の判定（失敗時）
		if($flg_restaurant === false || $flg_movie === false){
		$this->Session->setFlash('お店と動画の登録に失敗しました。改めて登録しなおして下さい。');
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
		*①キーワードを空欄で区切って配列に変換する
		*②moviesのtitle、description、restaurantsのname、access_line、access_station、category、投稿したユーザーのカラムからfindする
		*その際に、論理削除済みを除外し、moviesテーブルのcount順とする
		*③検索したデータをビューに表示する
		*/

		// select * from movies where id = 9;とおなじ
		$this->User->unbindModel(
            array('hasMany' =>array('Movie' , 'UserFavoriteMovieList', 'UserWatchMovieList'))
        );
		$this->Restaurant->unbindModel(
            array('hasMany' =>array('Movie','UserProfile'))
        );
        // $this->UserProfile->find(
        // 	array('conditions' =>array('UserProfile','user_name' === $_POST['areaname']))
        // );

        $UserName = $this->UserProfile->find('all',array(
        	'conditions'=>
        		array( '`UserProfile`.`name` LIKE ' => '%'.$_POST['areaname'].'%'
        			),
        	'fields' =>array('user_id','name')
        	));
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
					array(	'`Movie`.`title` LIKE '			     =>	'%'.$_POST['areaname'].'%',
						 	'`Movie`.`description` LIKE '	     => '%'.$_POST['areaname'].'%',
						 	'`Restaurant`.`name` LIKE '          => '%'.$_POST['areaname'].'%',
							'`Restaurant`.`access_line` LIKE '   => '%'.$_POST['areaname'].'%',
							'`Restaurant`.`access_station` LIKE '=> '%'.$_POST['areaname'].'%',
							'`Restaurant`.`category` LIKE '      => '%'.$_POST['areaname'].'%',
							'`Restaurant`.`address` LIKE '       => '%'.$_POST['areaname'].'%',
							'`Movie`.`user_id` IN '        		 => $user_id_array
						)
					),
				'recursive' => 2
				)
		);

		// pr($results);
		// exit;
																
															

													
		$this->set('results',$results);
		//echo var_dump($_POST['areaname']);


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

	/*
	*自分の投稿したムービーの管理画面
	*/
	public function myMovieIndex(){



	}

}