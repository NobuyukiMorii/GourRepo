<!DOCTYPE html>
<<<<<<< HEAD
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('bootstrap-responsive');

        echo $this->Html->script('bootstrap');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
<!-- 			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1> -->
		</div>
		<div id="content">
=======
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>GourRepo</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('header'); ?>
    <?php echo $this->Html->css('footer.css'); ?>
  </head>
  <body>
  <!-- HEADER ============-->
  <div class="row">
    <div class="col-md-2 header">
      <div class="col-md-6 header">
        <img src="http://192.168.33.200/GC5Team/GourRepo/img/GourRepo.png"  class="header-logo">
      </div>
      <div class="col-md-6 header">
        <div class="btn-group header-drop-button">
          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span class="glyphicon glyphicon-align-justify"></span> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">アカウントを作成</a></li>
            <li><a href="#">過去に投稿した動画を見る</a></li>
            <li><a href="#">プロフィールを編集する</a></li>
            <li class="divider"></li>
            <li><a href="#">ログアウト</a></li>
          </ul>
        </div>
      </div>  
    </div>
    <div class="col-md-8 header">
      <div class="input-group input-group-sm header-margin header-form">
        <span class="input-group-addon" id="sizing-addon1">Search</span>
        <input type="text" class="form-control" placeholder="エリア・ジャンル" aria-describedby="sizing-addon1">
      </div>
    </div>
    <div class="col-md-1 header">
      <p class="header-margin">
        <button type="button" class="btn btn-default btn-sm header-upload-button">お食事動画を投稿</button>
      </p>
    </div>
    <div class="col-md-1 header text-align-center">
      <img src="http://192.168.33.200/GC5Team/GourRepo/img/girl.png"  class="header-profile-photo img-circle">
    </div>
  </div>
  <!-- /HEADER ============-->

  <?php echo $this->fetch('content'); ?>
>>>>>>> 8c0b57ea00a33bc2ca054869c13986af582be939

  <!-- FOOTER ============-->
    <div class="row footer-area">
        <div class="col-md-1 footer-logo-div">
          <img src="http://192.168.33.200/GC5Team/GourRepo/img/GourRepo.png"  class="footer-logo">
        </div>
        <div class="col-md-5 footer-message-div">
          お店がもっとよくわかる
        </div>
        <div class="col-md-6 copyright-div">
          Copyright (c) <a href="">GourRepo.com</a>, Inc. All Rights Reserved. 無断転載禁止
        </div>
    </div>
  <!-- /FOOTER ============-->

<<<<<<< HEAD
			<?php echo $this->fetch('content'); ?>
		</div>
<!-- 		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div> -->
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
=======
  <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min');?>
  </body>
</html>
>>>>>>> 8c0b57ea00a33bc2ca054869c13986af582be939
