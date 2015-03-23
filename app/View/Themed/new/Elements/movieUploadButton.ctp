<div class="col-md-1 header">
	<?php if($this->action !== 'add') : ?>

		<?php if($this->action !== 'view') : ?>
		  	<p class="header-margin">
		    	<a class="btn btn-default btn-sm header-upload-button" type="button" href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'selectMovieForAdd')) ;?>">お食事動画を投稿</a>
		  	</p>
		<?php endif ;?>

		<?php if($this->action == 'view') : ?>
		  	<p class="header-margin">
		    	<a class="btn btn-default btn-sm header-upload-button" type="button" href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'add' , $gurunabi_id)) ;?>">このお店をレポート</a>
		  	</p>
		<?php endif ;?>

  	<?php endif ;?>
</div>