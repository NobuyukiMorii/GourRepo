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


		<div class="row">

			<div class="col-xs-12">
				<?php echo $this->Form->create('User', array(
					'inputDefaults' => array(
						'div' => 'form-group',
						'wrapInput' => false,
						'class' => 'form-control input-lg',
					),
					'class' => 'form-signin'
				)); ?>
				<label for="inputEmail" class="sr-only">Email address</label>
				<?php echo $this->Form->input('email', array(
					'label' => false,
					'placeholder' => 'メールアドレス',
					'class' => 'form-control',
					'maxLength' => 50
				)); ?>
				<label for="inputPassword" class="sr-only">User name</label>
				<?php echo $this->Form->input('UserProfile.name', array(
					'label' => false,
					'placeholder' => 'ユーザーネーム',
					'class' => 'form-control',
					'maxLength' => 50
				)); ?>
				<label for="inputPassword" class="sr-only">Password</label>
				<?php echo $this->Form->input('password', array(
					'label' => false,
					'placeholder' => 'パスワード',
					'class' => 'form-control',
					'maxLength' => 50
				)); ?>
				<?php echo $this->Form->hidden('role', array(
					'label' => false,
					'value' => 'contributor'
				)); ?>
				<button class="btn btn-lg btn-primary btn-block" type="submit" formnovalidate="formnovalidate">サインアップ</button>
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