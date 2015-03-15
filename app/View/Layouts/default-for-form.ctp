<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>GourRepo</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php echo $this->Html->css('view-default/bootstrap'); ?>
    <?php echo $this->Html->css('view-default/header'); ?>
    <?php echo $this->Html->css('view-default/flash'); ?>
    <?php echo $this->Html->css('view-default/body.css'); ?>
    <?php echo $this->Html->css('view-default/footer.css'); ?>
  </head>
  <body>
  <!-- HEADER ============-->
  <div class="row">
    <div class="col-md-2 header">
      <?php echo $this->element('headerLogo'); ?>
      <?php echo $this->element('dropDownButton'); ?>
    </div>
    
    <div class="col-md-9"></div>
    <?php echo $this->element('profileImage'); ?>

  </div>
  <!-- /HEADER ============-->
  
  <!-- CONTENT ============-->
  <?php echo $this->Session->flash(); ?>
  <?php echo $this->fetch('content'); ?>

  <!-- 開発用に追加 -->
  <?php pr($userSession['role']) ;?>
  <?php pr($userSession['email']) ;?>
  <!-- CONTENT ============-->

  <!-- FOOTER ============-->
  <div class="row footer-area">
    <div class="col-md-1 footer-logo-div">
      <?php echo $this->Html->image('GourRepo.png', array('alt' => 'GourRepo Logo' , 'class' => 'footer-logo')); ?>
    </div>
    <div class="col-md-5 footer-message-div">
      お店がもっとよくわかる
    </div>
    <div class="col-md-6 copyright-div">
      Copyright (c) <a href="">GourRepo.com</a>, Inc. All Rights Reserved. 無断転載禁止
    </div>
  </div>
  <!-- /FOOTER ============-->

  <!-- script references -->
  <?php echo $this->Html->script('jquery-1.11.2.min');?>
  <?php echo $this->Html->script('bootstrap');?>
  </body>
</html>

