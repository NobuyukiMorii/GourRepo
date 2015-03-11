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
		<?php echo $this->Form->input('email', array(
			'label' => '',
			'placeholder' => 'メールアドレス',
			// 'after' => '<span style="color:#FF0000">必須入力</span>'
		)); ?>
		<?php echo $this->Form->input('password', array(
			'label' => '',
			'placeholder' => 'パスワード',
			// 'after' => '<span style="color:#FF0000">必須入力</span>'
		)); ?>
		<?php echo $this->Form->hidden('role', array(
			'value' => 'admin',
		)); ?>
		<?php echo $this->Form->submit('登録', array(
			'div' => 'form-group',
			'class' => 'btn btn-default'
		)); ?>
	</fieldset>
<?php echo $this->Form->end(); ?>