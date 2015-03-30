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
    <style>
    .input-group-addon {
    }
    </style>
  </head>
  <body>
  <!-- HEADER ============-->
  <div class="top">
      <?php echo $this->Form->create('Movie', array('type' => 'post' , 'action' => 'serchResult', 'class' => 'FORM-MARGIN')); ?>

      <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'index')) ;?>">
        <?php echo $this->Html->image('GourRepo.png', array('alt' => 'GourRepo Logo' , 'class' => 'header-logo')); ?>
      </a>

        <?php if(empty($areaname)) :?>
          <input type="text" name="areaname" placeholder="エリア・ジャンル・料理" aria-describedby="sizing-addon1" id="form-input">
        <?php endif ; ?>
        <?php if(!empty($areaname)) :?>
          <input type="text" name="areaname" aria-describedby="sizing-addon1" id="form-input" value="<?php echo $areaname ;?>" >
        <?php endif ; ?>
        <input type="submit" class="btn btn-info btn-xs serch-button" value="Serch">

        <a class="btn btn-info btn-xs serch-button" type="button" href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'selectRestForAddMovie')) ;?>">Upload</a>

      <?php echo $this->Form->end() ;?>
    </div>
  <!-- /HEADER ============-->
  
  <!-- CONTENT ============-->
  <?php echo $this->Session->flash(); ?>
  <?php echo $this->fetch('content'); ?>

  <!-- CONTENT ============-->



  <!-- FOOTER ============-->
  <div class="bottom" style="margin-top:20px;">
    <?php echo $this->Html->image('GourRepo.png', array('alt' => 'GourRepo Logo' , 'class' => 'footer-logo')); ?>
    <span class="concept-message">行きたいお店がもっとよくわかる</span>
    <a href="#"><span class="concept-message">利用規約</span></a>
    <a href="#"><span class="concept-message">ぐるれぽについて</span></a>
    <a href="http://www.gnavi.co.jp/"> 
      <?php echo $this->Html->image('GourNaviLogo.gif', array('alt' => 'GourNavi Logo' , 'class' => 'GourNaviLogo')); ?>
    </a>
  </div>
  <!-- /FOOTER ============-->

  <!-- script references -->
  <?php echo $this->Html->script('jquery-1.11.2.min');?>
  <?php echo $this->Html->script('bootstrap');?>
  <?php echo $this->Html->script('input-keypress');?>
  </body>
</html>
