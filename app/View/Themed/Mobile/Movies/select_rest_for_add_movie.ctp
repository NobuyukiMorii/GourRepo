<?php echo $this->Html->css('movies-selectRestForAddMovie/movies-selectRestForAddMovie'); ?>


<div class="Position">
	<h5>お食事レポートしたお店を選択してください。</h5>
	<div style="margin-top:10px;"></div>

	<?php
	foreach ($LargeCategory as $key => $value) {
		$options[$value['LargeCategory']['code']] = $value['LargeCategory']['name'];
	}
	?>

	<?php
	echo $this->Form->create('Movie', array(
		'type' => 'Post',
		'action' => 'selectRestForAddMovie',
		'class' => "form-inline"
	));
	?>

	<div class="form-group">
		<?php
		echo $this->Form->input('LargeCategory', array( 
		    'type' => 'select', 
		    'options' => $options,
		    'id' => 'LargeCategory',
		    'label' => false,
		    'class' => 'form-control SELECT-SHAPE'
		));
		?>
	</div>

	<div class="form-group">
		<?php 
		echo $this->Form->input('SmallCategory', array( 
		    'type' => 'select', 
		    'options' => null,
		    'id' => 'SmallCategory',
		    'label' => false,
		    'class' => 'form-control SELECT-SHAPE'
		));
		?>
	</div>

	<div class="form-group">
		<?php 
		echo $this->Form->input('name', array( 
		    'type' => 'text',
		    'label' => false,
		    'class' => 'form-control INPUT-SHAPE',
		    'placeholder' => '店名'
		));
		?>
	</div>

	<?php
	echo $this->Form->submit('お店を探す', array(
		'div' => false,
		'class' => 'btn btn-default'
	));
	?>
	<?php echo $this->Form->end(); ?>
</div>

<?php if(isset($restaurants)) : ?>
	<div class="container2">
		<table class="table table-bordered font-size">
			<?php for ($i = 0; $i < count($restaurants); ++$i): ?>
			<tr onclick="location.href='<?php echo $this->Html->url(array("controller" => "movies","action" => "add",$restaurants[$i]['Restaurant']['id']));?>'" class="cursor">
				<td>
					<img src="<?php echo $restaurants[$i]['Restaurant']['image_url'] ;?>"  class="img-thumbnail";>
				</td>
				<td><?php echo $restaurants[$i]['Restaurant']['name'] ;?></td>
				<td><?php echo $restaurants[$i]['Restaurant']['address'] ;?></td>
			</tr>
			<?php endfor; ?>
		</table>
	</div>
<?php endif ;?>

<!-- JS -->
<?php echo $this->Html->script('jquery-1.11.2.min');?>
<script>
$("#LargeCategory").change(function () {
      var str = "";
      var value = "";
      //セレクトボックスの内容を削除
      $('select#SmallCategory option').remove();
      //新しい値を描く込み
      $("#LargeCategory option:selected").each(function () {
        value = $(this).context.value;

        $.ajax({
            url: 'http://<?php echo $host ;?>/GourRepo/Api/getSmallCategory/' + value + '.json',
            success: function(json) {
            	var info = json.SmallCategories;

				for (i = 0; i < info.length; i++) { 
					var code = info[i]['SmallCategory']['code'];
					var name = info[i]['SmallCategory']['name'];
					console.log(name);
					console.log(code);
					$("#SmallCategory").append($("<option>").val(code).text(name));
				}
            },
            error: function(json) {
                alert('データが読み込まれませんでした。')
            }
        });
      });

}).change();
</script>