<?php echo $this->Html->css('bootstrap');?>
<style>
input {
	height: 30px !important;
}
.screen-wide {
	width:100%;
	padding-right: 5%;
	padding-left: 5%;
}
</style>

<div class="screen-wide">
	<h3>レストランの登録フォーム</h3>
	<div class="col-md-6">
		<?php
		echo $this->Form->create('Restaurant', array('type' => 'file' , 'controller' => 'Restaurant' , 'action' => 'addRestaurants' , 'id' => 'add'));
		?>

		<?php
		echo $this->Form->input('name', 
			array(
				'type' => 'text', 
				'label' => 'レストラン名',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 100,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('tel', 
			array(
				'type' => 'tel', 
				'label' => '電話番号',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 15,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('address', 
			array(
				'type' => 'text', 
				'label' => '住所',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 200,
				'required' => false,
				'placeholder' => '',
			)
		);
		?>
		<?php
		echo $this->Form->input('category_code_l', 
			array( 
			    'type' => 'select', 
			    'options' => $options_category_name_l,
			    'label' => 'カテゴリー（大）',
			    'class' => 'form-control'
			)
		);
		?>
		<?php
		echo $this->Form->input('category_code_s', 
			array( 
			    'type' => 'select', 
			    'options' => $options_category_name_s,
			    'label' => 'カテゴリー（小）',
			    'class' => 'form-control'
			)
		);
		?>
		<?php
		echo $this->Form->input('opentime', 
			array(
				'type' => 'text', 
				'label' => '営業時間',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 200,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('holiday', 
			array(
				'type' => 'text', 
				'label' => '休業日',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 200,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('areacode', 
			array( 
			    'type' => 'select', 
			    'options' => $options_areaname,
			    'label' => 'エリア',
			    'class' => 'form-control'
			)
		);
		?>
		<?php
		echo $this->Form->input('prefcode', 
			array( 
			    'type' => 'select', 
			    'options' => $options_prefname,
			    'label' => '都道府県',
			    'class' => 'form-control'
			)
		);
		?>
		<?php
		echo $this->Form->input('avatar', array('type' => 'file', 'label' => '画像'));
		?>

	</div>

	<div class="col-md-6">
		<?php
		echo $this->Form->input('access_line', 
			array(
				'type' => 'text', 
				'label' => '路線名',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 100,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('access_station', 
			array(
				'type' => 'text', 
				'label' => '最寄駅名',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 100,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('access_station_exit', 
			array(
				'type' => 'text', 
				'label' => '最寄出口',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 100,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('access_walk', 
			array(
				'type' => 'text', 
				'label' => '駅からの移動時間',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 100,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('access_note', 
			array(
				'type' => 'text', 
				'label' => '移動に関する備考',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 100,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('budget', 
			array(
				'type' => 'text', 
				'label' => '平均予算',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 100,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('url', 
			array(
				'type' => 'url', 
				'label' => 'HPのURL',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 200,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('pr', 
			array(
				'type' => 'textarea', 
				'label' => '紹介文',
				'class' => 'form-control',
				'value' => false,
				'maxlength' => 100,
				'col' => 10,
				'required' => false,
			)
		);
		?>
		<?php
		echo $this->Form->input('RedirectUrl', 
			array(
				'type' => 'hidden', 
				'value' => false,
				'id' => 'RedirectUrl'
			)
		);
		?>
	</div>
	<div class="col-md-6 col-md-offset-6">
		<button type="submit" class="btn btn-default btn-lg" style="margin-top:30px;">送信する</button>
		<?php
			echo $this->Form->end();
		?>
	</div>
</div>

<?php echo $this->Html->script('jquery-1.11.2.min');?>
<script>
$("#add").submit(function() {
	if (confirm('このまま動画を保存しますか？')) {
		$("#RedirectUrl").val('Movie-Add');
	} else {
		$("#RedirectUrl").val('Movie-Index');
	}
});
</script>