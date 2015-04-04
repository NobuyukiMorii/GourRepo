	<?php if($this->action !== 'addManual') : ?>
	<?php if($this->action !== 'add') : ?>
		<?php if(!empty($userSession['UserProfile']['avatar_file_name'])) : ?>
			<a href="<?php echo $this->html->url(array('controller' => 'Users' , 'action' => 'dashboard')) ;?>">
				<?php echo $this->upload->uploadImage($userSession['UserProfile'],'UserProfile.avatar',array('style'=>'thumb'),array('class'=>'header-profile-photo img-circle')); ?>
			</a>
		<?php endif ; ?>
	<?php endif ; ?>
	<?php endif ; ?>
