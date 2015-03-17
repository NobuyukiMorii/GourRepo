<form action="/GourRepo/Movies/selectMovieForAdd" method="post" accept-charset="utf-8">
<?php
echo $this->Form->input('name');
?>

<?php
echo $this->Form->input(
    'pref',
    array('options' => $pref_search_info, 'default' => '0' , 'id' => 'pref')
);
?>



<?php
echo $this->Form->input(
    'category_l',
    array('options' => $category_large_search_info, 'default' => '0' , 'id' => 'category_l')
);
?>

<input type="submit" value="送信する">
</form>

<table>
	<tr>
		<th>写真</th>
		<th>店名</th>
		<th>カテゴリー</th>
		<th>選択</th>
	</tr>
	<?php for ($i = 0; $i < count($rest_search_info['rest']); ++$i): ?>
	<tr>
		<td>
			<a href="
			<?php
				echo $this->Html->url(array(
			    "controller" => "movies",
			    "action" => "add",
			    $rest_search_info['rest'][$i]['id']
			));
			?>
			" class="btn btn-default">
			選択ボタン
			</a>
		</td>
		<td>
			<img src="<?php echo $rest_search_info['rest'][$i]['image_url']['shop_image1'] ;?>" width='150px';>
		</td>
		<td><?php echo $rest_search_info['rest'][$i]['name'] ;?></td>
		<td><?php echo $rest_search_info['rest'][$i]['category'] ;?></td>
		<td><?php echo $rest_search_info['rest'][$i]['address'] ;?></td>
	<?php endfor; ?>
	</tr>
</table>