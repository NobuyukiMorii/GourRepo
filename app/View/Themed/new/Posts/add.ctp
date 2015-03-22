<h1>Add Post</h1>





<?php
//createでformダグの作成
//id=PostAddForm - method=post - action=/posts/add 
echo $this->Form->create('Post');
//input()でフォーム要素の作成
//titleフォームの作成	
echo $this->Form->input('title');
//bodyフォームの作成(rows => 3で行数の指定)
echo $this->Form->input('body',array('rows' => '3'));
//$this->Form->end()の呼び出してsubmitボタン(Save Postという名前)とフォームの終了部分が出力される
echo $this->Form->end('Save Post');

?>