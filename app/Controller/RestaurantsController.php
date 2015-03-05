<?php
class RestaurnatsController extends Controller {
	/*
	*利用するモデル
	*/
	public $uses = array('Restaurant' , 'Movie');

	/*
	*レストランの投稿画面
	*/
	public function add(){
		/*
		*http://book.cakephp.org/2.0/ja/tutorials-and-examples/blog/part-two.html
		*上記urlを参考に作成
		*/
	}

	/*
	*レストランの編集画面
	*/
	public function edit(){
		/*
		*http://book.cakephp.org/2.0/ja/tutorials-and-examples/blog/part-two.html
		*上記urlを参考に作成
		*/
	}

	/*
	*開発ように準備（最後に削除する）
	*/
	public function index() {
		/*
		*http://book.cakephp.org/2.0/ja/tutorials-and-examples/blog/part-two.html
		*上記urlを参考に作成
		*/
	}

	/*
	*開発用に準備（最後に削除する）
	*/
	public function delete() {
		/*
		*http://book.cakephp.org/2.0/ja/tutorials-and-examples/blog/part-two.html
		*上記urlを参考に作成
		*/
	}

}
