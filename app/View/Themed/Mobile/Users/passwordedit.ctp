<?php echo $this->Html->css('users-password/users-password'); ?>
<style>
.input {
	height:30px !important;
	margin-bottom: 10px;
}
</style>

<div class="row margin">
	<div class="col-xs-6 col-xs-offset-2">
		<?php echo $this->Form->create('User', array('type' => 'post' , 'action' => 'passwordedit')); ?>
		  <div class="form-group">
		    <label class="col-xs-3 control-label" for="inputtext">新しいパスワード</label>
		    <div class="col-xs-9">
		    	<?php echo $this->Form->input('User.password', array('value' => '', 'label' => false , 'class' => 'form-control input' , 'type' => 'password')); ?>
		    	<button class="btn btn-info" type="submit">送信</button>
		    </div>
		  </div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
