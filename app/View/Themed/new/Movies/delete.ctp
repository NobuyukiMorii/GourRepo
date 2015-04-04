<?php echo $this->Form->create('Movie', array('class' => 'form-horizontal' , 'type' => 'post' , 'action' => 'delete')); ?>
	<fieldse>
		<?php echo $this->Form->text('Movie.id' , array('value' => 6 , 'type' => 'text'));?>

		<?php echo $this->Form->submit('削除する', array(
			'div' => false,
			'class' => 'btn btn-orange',
		)); ?>
<?php echo $this->Form->end(); ?>