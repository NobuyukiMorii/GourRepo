<!-- //app/View/Users/login.ctp-->
<?php echo $this->Session->flash('auth'); ?>

<?php echo $this->Form->create('User', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control input-lg'
	),
	'class' => 'well'
)); ?>
	<fieldset>
		<legend>メルアド・パスワードを入力してログイン！</legend>
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
		<?php echo $this->Form->submit('ログイン', array(
			'div' => 'form-group',
			'class' => 'btn btn-default'
		)); ?>
	</fieldset>
<?php echo $this->Form->end(); ?>