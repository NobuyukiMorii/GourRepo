<fieldset>
	<legend>ユーザーパスワード</legend>
	<div class="row">
		<div class="col-md-2">
			新パスワード
		</div>
		 	<?php echo $this->Form->create('User'); ?>
		<div class="col-md-10">
			<?php echo $this->Form->input('User.password', array('value' => '', 'label' => false)); ?>
		</div>
	</div>
	<?php echo $this->Form->end(__('変更')); ?>
</fieldset>