<?php echo $this->Html->css('users-password/users-password'); ?>

<div class="row margin">
	<div class="col-md-6 col-md-offset-2">
		<?php echo $this->Form->create('User', array('type' => 'post' , 'action' => 'passwordedit')); ?>
		  <div class="form-group">
		    <label class="col-md-3 control-label" for="inputtext">新しいパスワード</label>
		    <div class="col-md-9">
		    	<?php echo $this->Form->input('User.password', array('value' => '', 'label' => false , 'class' => 'form-control' , 'type' => 'password')); ?>
		    	<button class="btn btn-info" type="submit">送信</button>
		    </div>
		  </div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
