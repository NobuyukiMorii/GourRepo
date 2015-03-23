<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>GourRepo</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('layout/header'); ?>
    <?php echo $this->Html->css('layout/serch-input.css'); ?>
    <?php echo $this->Html->css('layout/flash'); ?>
    <?php echo $this->Html->css('layout/body.css'); ?>
    <?php echo $this->Html->css('layout/footer.css'); ?>
    <?php echo $this->Html->css('users-login/users-login'); ?>
    <style>
    .input-group-addon {
    }
    </style>
  </head>
  <body>

  <!-- CONTENT ============-->
	<div class="container margin-login">

		<div class="row hitokoto">
			<div class="col-md-10 col-md-offset-2">
				<h1>行きたいお店がもっとよくわかる</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<?php echo $this->Html->image('GourRepo.png', array('alt' => 'GourRepo Logo' , 'class' => 'logo')); ?>
			</div>
			<div class="col-md-4 form-margin">
				<?php echo $this->Form->create('User', array(
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control input-lg'
					),
					'class' => 'form-signin'
				)); ?>

				<label for="inputEmail" class="sr-only">Email address</label>
				<?php echo $this->Form->input('email', array(
					'label' => false,
					'placeholder' => 'メールアドレス',
					'class' => 'form-control',
				)); ?>
				<label for="inputPassword" class="sr-only">Password</label>
				<?php echo $this->Form->input('password', array(
					'label' => false,
					'placeholder' => 'パスワード',
					'class' => 'form-control',
				)); ?>
				<?php echo $this->Form->hidden('User.role', array(
					'value' => 'contributor',
				)); ?>
				<?php echo $this->Form->hidden('UserProfile.name', array(
				)); ?>
				<?php echo $this->Form->hidden('UserProfile.like_food', array(
				)); ?>
				<?php echo $this->Form->hidden('UserProfile.like_genre', array(
				)); ?>
				<?php echo $this->Form->hidden('UserProfile.like_price_zone', array(
				)); ?>
				<?php echo $this->Form->hidden('UserProfile.near_station', array(
				)); ?>
				<?php echo $this->Form->hidden('UserProfile.living_area', array(
				)); ?>
				<?php echo $this->Form->hidden('UserProfile.introduction', array(
				)); ?>
				<?php echo $this->Form->hidden('UserProfile.avatar_file_name', array(
				)); ?>
				<button class="btn btn-lg btn-primary btn-block" type="submit">サインアップ</button>
				<div class="aida"></div>
				<a class="btn btn-lg btn-info btn-block" href="<?php echo $this->Html->url(array('controller' => 'Users' , 'action' => 'login')); ?>">ログイン</a>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
  <!-- CONTENT ============-->



  <!-- script references -->
  <?php echo $this->Html->script('jquery-1.11.2.min');?>
  <?php echo $this->Html->script('bootstrap');?>
  <?php echo $this->Html->script('input-keypress');?>
  </body>
</html>