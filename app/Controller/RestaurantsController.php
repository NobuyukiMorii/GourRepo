<?php

class RestaurantsController extends AppController{
	public $uses = array('Restaurant');
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

}