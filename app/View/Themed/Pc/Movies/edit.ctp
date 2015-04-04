<?php echo $this->Html->css('bootstrap');?>
 <?php echo $this->Form->create('Movie', array('class' => 'form-horizontal' , 'type' => 'post' , 'action' => 'edit' , 'novalidate' => true)); ?>

<div class="row">
	<div class="form-group" style="margin-top:50px;">
		<div class="col-md- col-md-offset-2">
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
				'value' => $movie['Movie']['title'],
				'maxlength' => 50,
				'placeholder' => '1文字以上、50文字以下でご記入下さい',
			)); ?>
			
      	</div>
    </div>
<?php echo $this->Form->error('Movie.title');?>
    <div class="form-group">
      <label class="col-md-2 control-label">紹介文</label>
      <div class="col-md-8">
		<?php echo $this->Form->input('Movie.description', array(
			'label' => false,
			'type' => 'textarea',
			'class' => 'form-control',
			'rows' => 10,
			'value' => $movie['Movie']['description'],
			'maxlength' => 200,
			'placeholder' => '1文字以上、200文字以下でご記入下さい',
		)); ?>
		<?php echo $this->Form->error('Movie.description');?>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">タグの追加</label>
      <div class="col-md-8">
		<?php echo $this->Form->input('Tag.name', array(
			'label' => false,
			'type' => 'text',
			'class' => 'form-control input-lg',
			'required' => false,
			'placeholder' => '１料理ごとに30文字以内で、スペースで区切ってご記入下さい。',
		)); ?>
		<?php echo $this->Form->error('Tag.name');?>
      </div>
    </div>

	<div class="form-group">
		<div class="col-md-2 col-md-offset-2">
  			<button type="submit" class="btn btn-default btn-lg">編集する</button>
  		</div>
	</div>
 <?php echo $this->Form->end(); ?>

</div>
</div>
</div>