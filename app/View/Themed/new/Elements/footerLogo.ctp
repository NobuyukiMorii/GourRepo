<div class="col-md-1 footer-logo-div">
	<?php if($this->action !== 'add') : ?>
		<a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'index')) ;?>">
	  		<?php echo $this->Html->image('GourRepo.png', array('alt' => 'GourRepo Logo' , 'class' => 'footer-logo')); ?>
	  	</a>
	<?php endif ;?>
</div>