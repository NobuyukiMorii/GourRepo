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
  <div class="row">
    <?php echo $this->Session->flash(); ?>
    <div class="col-md-2 header">
      <?php echo $this->element('headerLogo'); ?>
      <?php echo $this->element('dropDownButton'); ?>
    </div>
    
    <?php echo $this->element('serchInput'); ?>
    <?php echo $this->element('movieUploadButton'); ?>
    <?php echo $this->element('profileImage'); ?>

  </div>
  <!-- /HEADER ============-->
  
  <!-- CONTENT ============-->
  <?php echo $this->fetch('content'); ?>

  <!-- CONTENT ============-->

  <!-- FOOTER ============-->
  <div class="row footer-area">
    <?php echo $this->element('footerLogo'); ?>
    <?php echo $this->element('footerConcept'); ?>
    <?php echo $this->element('footerCopyright'); ?>
  </div>
  <!-- /FOOTER ============-->

  <!-- script references -->
  <?php echo $this->Html->script('jquery-1.11.2.min');?>
  <?php echo $this->Html->script('bootstrap');?>
  <?php echo $this->Html->script('input-keypress');?>
  </body>
</html>

