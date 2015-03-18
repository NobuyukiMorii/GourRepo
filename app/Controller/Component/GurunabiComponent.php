<?php
 
class GurunabiComponent extends Component {

    /*
    *xml→連想配列への変換
    */
    public function parseXmlToArray($query) {
			//ぐるなびURLにアクセスしてxmlを読み込む
			$xml = simplexml_load_file($query);
			//xml形式のデータを連想配列に変換する
			$xml = get_object_vars($xml);
			//残ったSimpleXMLElementオブジェクトをarrayにキャストする
			$data = json_decode(json_encode($xml), true);
			//値を返す
			return $data;
    }

	/*
	*都道府県マスタを取得する
	*/
	public function prefSearch(){
		/*
		*URLの定義
		*/
		$base_url = 'http://api.gnavi.co.jp/ver1/PrefSearchAPI/?keyid=';
		$key = '6f13d54e08f1c5397b1aaa3091cab074';
		$access_url = $base_url . $key;
		/*
		*データの取得+連想配列への変換
		*/
		$pref_serch_array = $this->parseXmlToArray($access_url);
		/*
		*セレクトボックス用の配列に変換
		*/
		foreach ($pref_serch_array['pref'] as $key => $value) {
			$pref_serch_info[$value['pref_code']] = $value['pref_name'];
		}
		/*
		*指定なしの場合の配列を追加
		*/
		$not_specified_array[0] = "指定なし";
		array_unshift($pref_serch_info, $not_specified_array[0]);
		return $pref_serch_info;
	}

	/*
	*カテゴリーマスタを取得する
	*/
	public function categoryLargeSearch(){
		/*
		*URLの定義
		*/
		$base_url = 'http://api.gnavi.co.jp/ver1/CategoryLargeSearchAPI/?keyid=';
		$key = '6f13d54e08f1c5397b1aaa3091cab074';
		$access_url = $base_url . $key;
		/*
		*データの取得+連想配列への変換
		*/
		$category_serch_large_array = $this->parseXmlToArray($access_url);
		/*
		*セレクトボックス用の配列に変換
		*/
		foreach ($category_serch_large_array['category_l'] as $key => $value) {
			$category_serch_large_info[$value['category_l_code']] = $value['category_l_name'];
		}
		/*
		*指定なしの場合の配列を追加
		*/
		$not_specified_array[0] = "指定なし";
		array_unshift($category_serch_large_info, $not_specified_array[0]);
		return $category_serch_large_info;

	}

	/*
	*店舗情報を取得するapi
	*/
	public function RestSearch($data = null){
		/*
		*URLの定義
		*/
		$base_url = 'http://api.gnavi.co.jp/ver1/RestSearchAPI/?keyid=';
		$key = '6f13d54e08f1c5397b1aaa3091cab074';
		/*
		*アクセスurlの作成（基本）
		*/
		$format = '&format=xml';
		$hit_per_page = '&hit_per_page=30';
		$sort = '&sort=2'; //1が店舗名順、2が業態順
		$access_url = $base_url . $key . $format . $hit_per_page . $sort;
		/*
		*アクセスurlの作成（オプション）
		*/
		if($data !== null){
			foreach ($data as $key => $value) {
				if($value !== '0'){
					$access_url = $access_url . '&' . $key . '=' . $value;
				}
			}
		}
		/*
		*データの取得+連想配列への変換
		*/
		$rest_search_array = $this->parseXmlToArray($access_url);
		/*
		*エラーハンドリング
		*該当のお店がない場合は、restキーにnullを代入sるう
		*/
		if(isset($rest_search_array['error'])){
			$rest_search_array['rest'] = null;
		}
		return $rest_search_array;
	}

	/*
	*ぐるなびapiの情報にバリデーションをかける
	*/
	public function ValidateRestInfo($rest_search_info){

		foreach ($rest_search_info['rest'] as $key => $value) {
			// //画像URLのチェック
			// $url = $value['image_url']['shop_image1'];
			// $response = @file_get_contents($url, NULL, NULL, 0, 1);
			// if($value['image_url']['shop_image1'] == array()) {
			// 	$rest_search_info['rest'][$key]['image_url']['shop_image1'] = FULL_BASE_URL . '/GourRepo/img/NoImage.jpg';
			// } elseif($response == false){
			// 	$rest_search_info['rest'][$key]['image_url']['shop_image1'] = FULL_BASE_URL . '/GourRepo/img/NoImage.jpg';
			// }
			//店名のバリデーション
			if($value['name'] === array()){
				$rest_search_info['rest'][$key]['name'] = '-';
			}
			//カテゴリーのバリデーション
			if($value['category'] === array()){
				$rest_search_info['rest'][$key]['category'] = '-';
			}
			//住所のバリデーション
			if($value['address'] === array()){
				$rest_search_info['rest'][$key]['address'] = '-';
			}
		}
		return $rest_search_info;

	}

	/*
	*ぐるなびapiの情報をぐるれぽのDBに保存するためのコード
	*/
	public function ParseArrayForDB($GourNaviData){

		$rest_save_data['gournabi_id'] 							= $GourNaviData['rest']['id'];
		$rest_save_data['name'] 								= $GourNaviData['rest']['name'];
		$rest_save_data['tel'] 									= $GourNaviData['rest']['tel'];
		$rest_save_data['address'] 								= $GourNaviData['rest']['address'];
		$rest_save_data['latitude'] 							= $GourNaviData['rest']['latitude'];
		$rest_save_data['longitude'] 							= $GourNaviData['rest']['longitude'];
		$rest_save_data['category'] 							= $GourNaviData['rest']['category'];
		$rest_save_data['url'] 									= $GourNaviData['rest']['url'];
		$rest_save_data['url_mobile'] 							= $GourNaviData['rest']['url_mobile'];
		$rest_save_data['opentime'] 							= $GourNaviData['rest']['opentime'];
		$rest_save_data['holiday'] 								= $GourNaviData['rest']['holiday'];
		$rest_save_data['access_line'] 							= $GourNaviData['rest']['access']['line'];
		$rest_save_data['access_station'] 						= $GourNaviData['rest']['access']['station'];
		$rest_save_data['access_station_exit'] 					= $GourNaviData['rest']['access']['station_exit'];
		$rest_save_data['access_walk'] 							= $GourNaviData['rest']['access']['walk'];
		$rest_save_data['access_note'] 							= $GourNaviData['rest']['access']['note'];
		$rest_save_data['parking_lots'] 						= $GourNaviData['rest']['parking_lots'];
		$rest_save_data['pr'] 									= $GourNaviData['rest']['pr']['pr_short'] ;
		$rest_save_data['code_areacode'] 						= $GourNaviData['rest']['code']['areacode'];
		$rest_save_data['code_areaname'] 						= $GourNaviData['rest']['code']['areaname'];
		$rest_save_data['code_prefname'] 						= $GourNaviData['rest']['code']['prefname'];
		$rest_save_data['budget'] 								= $GourNaviData['rest']['budget'];
		$rest_save_data['party'] 								= $GourNaviData['rest']['party'];
		$rest_save_data['lunch'] 								= $GourNaviData['rest']['lunch'];
		$rest_save_data['credit_card'] 							= $GourNaviData['rest']['credit_card'];
		$rest_save_data['equipment']							= $GourNaviData['rest']['equipment'];

		return $rest_save_data;
	}

	/*
	*ぐるなびapi保存の前のバリデーション
	*/
	public function ValidationBeforeSave($rest_save_data){

		foreach ($rest_save_data as $key => $value) {
			if(empty($value)){
				$rest_save_data[$key] = null;
			}
			if (is_array($value)) {
				$rest_save_data[$key] = null;
			}
		}
		return $rest_save_data;
		
	}





}