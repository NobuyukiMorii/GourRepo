<?php echo $this->Form->create('Movie', array('class' => 'form-horizontal' , 'type' => 'post' , 'action' => 'edit')); ?>
	<fieldse>
		<?php echo $this->Form->text('Movie.id' , array('value' => $movie['Movie']['id'] , 'type' => 'hidden'));?>
		<?php echo $this->Form->input('Movie.title', array(
			'label' => 'タイトル',
			'type' => 'text',
			'class' => 'input-xlarge',
			'helpBlock' => 'Movieのタイトルをご記入下さい。',
			'value' => $movie['Movie']['title']
		)); ?>
		<?php echo $this->Form->error('Movie.title');?>

		<?php echo $this->Form->input('Movie.description', array(
			'label' => '紹介文',
			'type' => 'text',
			'class' => 'input-xlarge',
			'helpBlock' => 'Movieの感想をご記入下さい。',
			'value' => $movie['Movie']['description']
		)); ?>
		<?php echo $this->Form->error('Movie.description');?>


		<?php echo $this->Form->submit('登録する', array(
			'div' => false,
			'class' => 'btn btn-orange',
		)); ?>
<?php echo $this->Form->end(); ?>