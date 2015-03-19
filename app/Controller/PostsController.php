<?php

class PostsController extends AppController{
	public $helpers = array('Html', 'Form', 'Session');
	//public $components = array(' Session');

	public function index(){ //indexアクション
		//viewのindex.ctpで$postsとして利用出来る
		$this->set('posts', $this->Post->find('all'));
	}




	public function view($id = null){
		if (!$id){
			throw new NotFoundException(__('Invalid post'));
		}
		$post = $this->Post->findById($id);
		if (!$post){
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('post', $post);
	}





	public function add(){
		//フォームからpost送信されたデータがあるかどうかの確認
		if ($this->request->is('post')){
			//createによって、save()メソッドをinsertとして使用すると言う意味
			$this->Post->create();
			//save()でデータのセーブ
			//$this->request->dataにユーザーがフォームを使ってPOSTしたデータが格納されている
			if ($this->Post->save($this->request->data)){
				//setFlash()メソッドでリダイレクト後のページでこれを表示する
				$this->Session->setFlash(__('Your post has been saved.'));
				//redirectでindex画面に遷移する
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your post.'));
		}
	}







	public function api_add(){
	//public function api(){
		//ViewフォルダのLayoutsのdefault.ctpを使って表示したくない時にautoRenderを使用
		$this->autoRender = false;


		//$shohei = 'http://api.gnavi.co.jp/ver1/RestSearchAPI/?keyid=ca96f7d6d44f10f53e2cfde38f182b7f&hit_per_page=99&category_l=RSFST09000';
		$shohei = 'http://api.gnavi.co.jp/ver1/RestSearchAPI/?keyid=ca96f7d6d44f10f53e2cfde38f182b7f&hit_per_page=1&category_l=RSFST09000';

		// //APIの基本URLを$urlに入れる
		// $url = 'http://api.gnavi.co.jp/ver1irer2/RestSearchAPI/?keyid=ca96f7d6d44f10f53e2cfde38f182b7f&hit_per_page=99';
		// $options['category_l']['RSFST09000'] = '&category_l=RSFST09000';
		// // var_dump($options);
		// // echo "<br />";
		// // echo "<br />";
	
		
		// foreach ($options as $key => $value) {
		// 	echo "$key"."<br />";
		// 	var_dump($value);
		// 	echo "<br />";
		// 	echo "<br />";
		// 	foreach ($value as $key2 => $value2) {
		// 		echo "$key2"."<br />";
		// 		echo "$value2"."<br />";
		// 		echo "<br />";
		// 		$url2 = $url.$value2;
		// 		echo $url2;
		// 	}
		// }














		//	foreach ($key as $key2 => $value2) {
		//	echo "$key2"."<br />";
		//	echo "$value2";
			//$i = 0;
			//$url2[$key2] = $url.$value
			//echo $url2[$key2];
			//}
		//}



		//$options['category_l']['RSFST02000'] = '&category_l=RSFST02000';
		 //$i = 0;
		 //foreach ($options as $option) {
		 	//foreach ($option as $key => $value) {
		//	$i = $i +1;
		// 	$url2[$key] = $url.$value;
		// 	}
		// }



		$xml = simplexml_load_file($shohei);

		$xml = get_object_vars($xml);
		$data = json_decode(json_encode($xml), true);
		//pr($data);
		//exit;
		
		$save_data['Resutaurant']['id'] = $data['rest']['id'];
		$save_data['Resutaurant']['name'] = $data['rest']['name'];
		$save_data['Resutaurant']['tel'] = $data['rest']['tel'];
		// $save_data['Resutaurant']['address'] = $data['rest']['address'];
		// $save_data['Resutaurant']['latitude'] = $data['rest']['latitude'];
		// $save_data['Resutaurant']['longitude'] = $data['rest']['longitude'];
		
		pr($save_data);
		exit;

		//add_apiのなかて$save_dataとしてデータを使用できる
		//$this->set('save_data', $this->Post->find('all'));


		
		// $save_data['Resaurant']['sagsadfa'] = $data['rest'][0]['vzvdsa'];

		// $flg = $this->Restaurant->save($save_data);
		// if($flg){
		// } else {
		// }
		

		//セレクトボックスの作成
		//Viewのapi.ctpで$areanameが使用できる
		//$this->set('areaname',$this->Post->find('list',array('area' => array('id','prefecture')
		//	)));


		//apiのURLを作る
		//$url = 'http://api.gnavi.co.jp/ver1/RestSearchAPI/?keyid=2988999&area=AREA110';
		//apiから取得できた１０００件のレストランデータを配列に格納
		// loop 始まり
			// レストランデータを取り出し、保存しやすい形の配列にセット
			// debug
			//save function
		//loopおわり



	

	//public function api_add(){
		//フォームからpost送信されたデータがあるかどうかの確認
		if ($this->request->is('post')){
			//createによって、save()メソッドをinsertとして使用すると言う意味
			$this->Post->create();
			//save()でデータのセーブ
			//$this->request->dataにユーザーがフォームを使ってPOSTしたデータが格納されている
			if ($this->Post->save($this->request->data)){
				//setFlash()メソッドでリダイレクト後のページでこれを表示する
				$this->Session->setFlash(__('Your post has been saved.'));
				//redirectでindex画面に遷移する
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your post.'));
		}
	}
}
