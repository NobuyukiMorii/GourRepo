<div class="col-md-1 header text-align-center">
	<?php if($this->action !== 'add') : ?>
		<?php if(!empty($userSession)) : ?>
			<a href="<?php echo $this->html->url(array('controller' => 'Users' , 'action' => 'dashboard')) ;?>">
				<?php echo $this->upload->uploadImage($userSession['UserProfile'],'UserProfile.avatar',array('style'=>'thumb'),array('class'=>'header-profile-photo img-circle')); ?>
			</a>
		<?php endif ; ?>
	<?php endif ; ?>
</div>