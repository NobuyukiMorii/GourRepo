<?php echo $this->Html->css('bootstrap');?>
<style>
input {
	height: 30px !important;
}
.screen-wide {
	width:100%;
	padding-right: 20%;
	padding-left: 20%;
}
</style>


<div class="screen-wide">
<?php
echo $this->Form->create('Restaurant', array('type' => 'file' , 'controller' => 'Restaurant' , 'action' => 'addRestaurants'));

echo $this->Form->input('gournabi_id', 
	array(
		'type' => 'hidden', 
		'value' => ''
	)
);

echo $this->Form->input('image_url',
	array(
		'type' => 'hidden', 
		'value' => '',
	)
);

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

echo $this->Form->input('latitude', 
	array(
		'type' => 'number', 
		'label' => '緯度',
		'class' => 'form-control',
		'value' => false,
		'required' => false,
	)
);

echo $this->Form->input('longitude', 
	array(
		'type' => 'number', 
		'label' => '経度',
		'class' => 'form-control',
		'value' => false,
		'required' => false,
	)
);

echo $this->Form->input('category_code_l', 
	array( 
	    'type' => 'select', 
	    'options' => $options_category_name_l,
	    'label' => 'カテゴリー（大）',
	    'class' => 'form-control'
	)
);

echo $this->Form->input('category_code_s', 
	array( 
	    'type' => 'select', 
	    'options' => $options_category_name_s,
	    'label' => 'カテゴリー（小）',
	    'class' => 'form-control'
	)
);

echo $this->Form->input('url', 
	array(
		'type' => 'url', 
		'label' => 'ぐるなびのurl（PC）',
		'class' => 'form-control',
		'value' => false,
		'maxlength' => 200,
		'required' => false,
	)
);

echo $this->Form->input('url_mobile', 
	array(
		'type' => 'url', 
		'label' => 'ぐるなびのurl（Mobile）',
		'class' => 'form-control',
		'value' => false,
		'maxlength' => 200,
		'required' => false,
	)
);

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

echo $this->Form->input('access_station_exit', 
	array(
		'type' => 'text', 
		'label' => '最寄駅名',
		'class' => 'form-control',
		'value' => false,
		'maxlength' => 100,
		'required' => false,
	)
);

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

echo $this->Form->input('parking_lots', 
	array(
		'type' => 'text', 
		'label' => '駐車場台数',
		'class' => 'form-control',
		'value' => false,
		'maxlength' => 100,
		'required' => false,
	)
);

echo $this->Form->input('pr', 
	array(
		'type' => 'text', 
		'label' => '紹介文',
		'class' => 'form-control',
		'value' => false,
		'maxlength' => 100,
		'required' => false,
	)
);

echo $this->Form->input('pr', 
	array(
		'type' => 'text', 
		'label' => '紹介文',
		'class' => 'form-control',
		'value' => false,
		'maxlength' => 100,
		'required' => false,
	)
);

echo $this->Form->input('areacode', 
	array( 
	    'type' => 'select', 
	    'options' => $options_areaname,
	    'label' => 'エリアコード',
	    'class' => 'form-control'
	)
);

echo $this->Form->input('prefcode', 
	array( 
	    'type' => 'select', 
	    'options' => $options_prefname,
	    'label' => '都道府県コード',
	    'class' => 'form-control'
	)
);

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

echo $this->Form->input('party', 
	array(
		'type' => 'text', 
		'label' => '宴会・パーティー平均予算',
		'class' => 'form-control',
		'value' => false,
		'maxlength' => 100,
		'required' => false,
	)
);

echo $this->Form->input('lunch', 
	array(
		'type' => 'text', 
		'label' => 'ランチ平均予算',
		'class' => 'form-control',
		'value' => false,
		'maxlength' => 100,
		'required' => false,
	)
);

echo $this->Form->input('credit_card', 
	array(
		'type' => 'text', 
		'label' => 'クレジットカード平均予算',
		'class' => 'form-control',
		'value' => false,
		'maxlength' => 100,
		'required' => false,
	)
);

echo $this->Form->input('equipment', 
	array(
		'type' => 'text', 
		'label' => '設備',
		'class' => 'form-control',
		'value' => false,
		'maxlength' => 100,
		'required' => false,
	)
);

echo $this->Form->input('avatar', array('type' => 'file', 'label' => false));
?>

<button type="submit" class="btn btn-default btn-lg">送信する</button>

<?php
echo $this->Form->end();
?>


<!-- 

<?php //echo $this->Form->create('Restaurant', array('type' => 'file')); ?>
<?php //echo $this->Form->input('avatar', array('type' => 'file', 'label' => false)); ?>
<?php //echo $this->Form->end(__('変更/登録')); ?> -->