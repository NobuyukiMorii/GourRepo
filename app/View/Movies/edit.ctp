 <?php echo $this->Form->create('Movie', array('class' => 'form-horizontal' , 'type' => 'post' , 'action' => 'edit')); ?>

    <!-- input -->
	<div class="form-group">
		<div class="col-md-8 col-md-offset-2">
  			<h4>動画の情報を編集して下さい</h4>
  		</div>
	</div>

    <div class="form-group">
      	<label class="col-md-2 control-label">タイトル</label>
      	<div class="col-md-8">
			<?php echo $this->Form->input('Movie.title', array(
				'label' => false,
				'type' => 'text',
				'class' => 'form-control input-lg',
				'value' => $movie['Movie']['title']
			)); ?>
			<?php echo $this->Form->error('Movie.title');?>
      	</div>
    </div>

    <!-- textarea -->
    <div class="form-group">
      <label class="col-md-2 control-label">紹介文</label>
      <div class="col-md-8">
		<?php echo $this->Form->input('Movie.description', array(
			'label' => false,
			'type' => 'textarea',
			'class' => 'form-control',
			'rows' => 10,
			'value' => $movie['Movie']['description'],
		)); ?>
		<?php echo $this->Form->error('Movie.description');?>
      </div>
    </div>

	<div class="form-group">
		<div class="col-md-2 col-md-offset-2">
  			<button type="submit" class="btn btn-default btn-lg">編集する</button>
  		</div>
	</div>
 <?php echo $this->Form->end(); ?>