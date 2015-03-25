<?php echo $this->Form->create('Movie', array('type' => 'get' ,'action' => 'selectRestForAddMovie')) ;?>

<?php
foreach ($LargeCategory as $key => $value) {
	$options[$value['LargeCategory']['code']] = $value['LargeCategory']['name'];
}
?>
<?php 
echo $this->Form->input('LargeCategory', array( 
    'type' => 'select', 
    'options' => $options,
    'id' => 'LargeCategory'
));
?>

<?php 
echo $this->Form->input('SmallCategory', array( 
    'type' => 'select', 
    'options' => null,
    'id' => 'SmallCategory'
));
?>












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