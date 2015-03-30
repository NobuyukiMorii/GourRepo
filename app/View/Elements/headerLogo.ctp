<div class="col-md-6 header">
	<?php if($this->action !== 'add') : ?>
		<a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'index')) ;?>">
	<?php endif ;?>

	<?php echo $this->Html->image('GourRepo.png', array('alt' => 'GourRepo Logo' , 'class' => 'header-logo')); ?>

	<?php if($this->action !== 'add') : ?>
		</a>
	<?php endif ;?>
</div>