<h1>Blog posts</h1>

<?php echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add')); //"Add Postというタイトル" "URL-/posts/addに飛ぶ"?>





<table>
	<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Created</th>
	</tr>




	<!-- PostsControllerで定義した$postsを$postとして連想配列にする -->
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo $post['Post']['id']; //配列postの[Post]配列の[id]=?を表示 ?></td>
		<td>
			<?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts', 'action'=>'view', $post['Post']['id'])); //Postのtitleを表示し、かつ、リンクをつける そして、view画面にリンクを飛ばす ?>
		</td>
		<td><?php echo $post['Post']['created']; //Post配列のcreatedを表示 ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($post); ?>
</table>



<?php

echo $this->Html->link('API', array('controller' => 'posts', 'action' => 'api'))."<br />";



echo $this->Html->link('API_ADD', array('controller' => 'posts', 'action' => 'api_add')); 


?>

