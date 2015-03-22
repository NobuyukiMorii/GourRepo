<!-- app/View/Users/signUp.ctp -->

<?php echo $this->Form->create('User', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control input-lg'
	),
	'class' => 'well'
)); ?>
	<fieldset>
		<legend>メルアド・パスワードを入力して登録！</legend>
		<?php echo $this->Form->input('User.email', array(
			'label' => '',
			'placeholder' => 'メールアドレス',
			// 'after' => '<span style="color:#FF0000">必須入力</span>'
		)); ?>
		<?php echo $this->Form->input('User.password', array(
			'label' => '',
			'placeholder' => 'パスワード',
			// 'after' => '<span style="color:#FF0000">必須入力</span>'
		)); ?>
		<?php echo $this->Form->hidden('User.role', array(
			'value' => 'contributor',
		)); ?>
		<?php echo $this->Form->submit('登録', array(
			'div' => 'form-group',
			'class' => 'btn btn-default'
		)); ?>
		<?php echo $this->Form->hidden('UserProfile.name', array(
		)); ?>
		<?php echo $this->Form->hidden('UserProfile.like_food', array(
		)); ?>
		<?php echo $this->Form->hidden('UserProfile.like_genre', array(
		)); ?>
		<?php echo $this->Form->hidden('UserProfile.like_price_zone', array(
		)); ?>
		<?php echo $this->Form->hidden('UserProfile.near_station', array(
		)); ?>
		<?php echo $this->Form->hidden('UserProfile.living_area', array(
		)); ?>
		<?php echo $this->Form->hidden('UserProfile.introduction', array(
		)); ?>
		<?php echo $this->Form->hidden('UserProfile.avatar_file_name', array(
		)); ?>
	</fieldset>
<?php echo $this->Form->end(); ?>