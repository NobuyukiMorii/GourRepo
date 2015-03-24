<?php

class RestaurantsController extends AppController{
	public $uses = array('Restaurant' , 'Preference' , 'LargeCategory' , 'SmallCategory' , 'LargeArea' , 'MiddleArea' , 'SmallArea');
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Gurunabi');
	public function beforeFilter() {
    	   parent::beforeFilter();
        // $this->Auth->allow('signup', 'login', 'logout');
    }
     public function isAuthorized($user) {
        //contributorに権限を与えております。
        if (isset($user['role']) && $user['role'] === 'contributor') {
            //ここにindex,view,add,api_addを記入することで、画面表示ができる
            //indexに飛んで、viewやaddに飛ぶので、全てに権限を与える必要がある
            if(in_array($this->action, array('api_add2'))) {
                return true;
            }
        }
		return parent::isAuthorized($user);
    }
	





	public function api_add2(){
		//ビューを使わない
		$this->autoRender = false;
		//カテテゴリーを全部取得する
		$categories = $this->Gurunabi->categoryLargeSearch();
		array_shift($categories);
		//urlを作成する
		$page_number = 20;
		$url = 'http://api.gnavi.co.jp/ver2/RestSearchAPI/?keyid=ca96f7d6d44f10f53e2cfde38f182b7f&hit_per_page=500&pref=PREF13&offset_page='.$page_number;
		$i = 0;
		

		foreach ($categories as $key => $value) {
			$url2[$i] = $url.'&category_l='.$key;
			$i++;
		}
		
		
		//urlにアクセスして取得する
		for($i = 0; $i < count($url2); $i++){
			$data[$i] = $this->Gurunabi->parseXmlToArray($url2[$i]);
				/*
				*DB保存用の配列を作成する
				*/	
				$save_data = null;
				for($j = 0; $j < count($data[$i]['rest']); $j++){
					$save_data['gournabi_id']		 					= $data[$i]['rest'][$j]['id'];
			 		$save_data['image_url'] 							= $data[$i]['rest'][$j]['image_url']['thumbnail'];
			 		$save_data['name'] 									= $data[$i]['rest'][$j]['name']['name'];
			 		$save_data['tel'] 									= $data[$i]['rest'][$j]['contacts']['tel'];
					$save_data['address'] 								= $data[$i]['rest'][$j]['contacts']['address'];
		 			$save_data['latitude'] 								= $data[$i]['rest'][$j]['location']['latitude'];
		 			$save_data['longitude'] 							= $data[$i]['rest'][$j]['location']['longitude'];
			 		$save_data['category'] 								= $data[$i]['rest'][$j]['categories']['category_name_l']['0'];
			 		$save_data['url'] 									= $data[$i]['rest'][$j]['url'];
			 		$save_data['url_mobile'] 							= $data[$i]['rest'][$j]['url_mobile'];
		 			$save_data['opentime'] 								= $data[$i]['rest'][$j]['business_hour'];
		 			$save_data['holiday'] 								= $data[$i]['rest'][$j]['holiday'];
					$save_data['access_line'] 							= $data[$i]['rest'][$j]['access'];
					$save_data['access_station'] 						= $data[$i]['rest'][$j]['location']['area']['areaname_s'];
					$save_data['access_station_exit'] 					= null;
					$save_data['access_walk'] 							= null;
					$save_data['access_note'] 							= null;
					$save_data['parking_lots'] 							= null;
					$save_data['pr'] 									= $data[$i]['rest'][$j]['sales_points']['pr_short'] ;
					$save_data['code_areacode'] 						= $data[$i]['rest'][$j]['location']['area']['district'];
					$save_data['code_areaname'] 						= $data[$i]['rest'][$j]['location']['area']['areaname_s'];
					$save_data['code_prefname'] 						= $data[$i]['rest'][$j]['location']['area']['prefname'];
					$save_data['budget'] 								= $data[$i]['rest'][$j]['budget'];
					$save_data['party'] 								= null;
					$save_data['lunch'] 								= null;
					$save_data['credit_card'] 							= null;
					$save_data['equipment']								= null;
						

						try {
							$this->Restaurant->create();
				 			$this->Restaurant->save($save_data);	
						} catch (Exception $e) {
							echo 'gournabi_id:'.$save_data['gournabi_id'].'を無視しました';				
						}



			 		pr($save_data);	
			 	}

		}
		
	}



	// public function reutaurants_add(){
	// 	if ($this->request->is('post')){
	// 		$this->Restaurant->create();
	// 		if ($this->Restaurants->save($this->request->data)){
	// 			$this->Session->setFlash(__('Your post has been saved.'));
	// 			return $this->redirect(array('action' => 'index'));
	// 		}
	// 		$this->Session->setFlash(__('Unable to add your post.'));
	// 	}
	// }


	/*
	*ここから先のファンクションにアクセスすると、カテゴリーやエリアのDBが更新されてしまいます。基本的にアクセスしないでください。
	*/


	/*
	*都道府県を取得する
	*/
	public function getPrefDB(){
		$this->autoRender = false;
		//都道府県マスタ取得
		$pref_search_info = $this->Gurunabi->prefSearch();
		array_shift($pref_search_info);

		foreach ($pref_search_info as $key => $value) {
			$data['code'] = $key;
			$data['name'] = $value;
			$this->Preference->create();
			$this->Preference->save($data);
		}
	}

	/*
	*カテゴリーを取得する（大）
	*/
	public function getCategoryLarge(){
		$this->autoRender = false;
		//カテゴリーマスタ取得
		$category_large_search_info = $this->Gurunabi->categoryLargeSearch();
		array_shift($category_large_search_info);

		foreach ($category_large_search_info as $key => $value) {
			$data['code'] = $key;
			$data['name'] = $value;
			$this->LargeCategory->create();
			$this->LargeCategory->save($data);
		}
	}

	/*
	*カテゴリーを取得する（小）
	*/
	public function getCategorySmall(){
		$this->autoRender = false;
		//カテゴリーマスタ取得
		$category_small_search_info = $this->Gurunabi->categorySmallSearch();
		array_shift($category_small_search_info);

		foreach ($category_small_search_info as $key => $value) {
			$data['code'] = $key;
			$data['name'] = $value['name'];
			$data['l_code'] = $value['l_code'];
			$this->SmallCategory->create();
			$this->SmallCategory->save($data);
		}
	}

	/*
	*エリアマスタ（大）を取得する
	*/
	public function getAreaLargeSearch(){
		$this->autoRender = false;
		//カテゴリーマスタ取得
		$areas = $this->Gurunabi->AreaLargeSearch();
		array_shift($areas);

		foreach ($areas as $key => $value) {
			$data['code'] = $key;
			$data['name'] = $value['name'];
			$data['pref_code'] = $value['pref_code'];
			$data['pref_name'] = $value['areaname_l'];
			$this->LargeArea->create();
			$this->LargeArea->save($data);
		}
	}

	/*
	*エリアマスタ（小）を取得する
	*/
	public function getAreaSmallSearch(){
		$this->autoRender = false;
		//カテゴリーマスタ取得
		$areas = $this->Gurunabi->AreaSmallSearch();
		array_shift($areas);

		foreach ($areas as $key => $value) {
			$data['code'] = $key;
			$data['name'] = $value['name'];
			$data['l_name'] = $value['l_name'];
			$data['l_code'] = $value['l_code'];
			$data['m_name'] = $value['m_name'];
			$data['m_code'] = $value['m_code'];
			$data['pref_code'] = $value['pref_code'];
			$data['pref_name'] = $value['pref_name'];
			$this->SmallArea->create();
			$this->SmallArea->save($data);
		}
	}

}