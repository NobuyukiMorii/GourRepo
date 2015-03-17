<?php echo $this->Html->css('view-index/common-setting'); ?>
<?php echo $this->Html->css('view-index/place-title.css'); ?>
<?php echo $this->Html->css('view-index/main-movie.css'); ?>
<?php echo $this->Html->css('view-index/main-movie-description.css'); ?>
<?php echo $this->Html->css('view-index/select-page-button-main.css'); ?>
<?php echo $this->Html->css('view-index/fundamental-place-info.css'); ?>
<?php echo $this->Html->css('view-index/view-reccomend-movie-for-main.css'); ?>
<?php echo $this->Html->css('view-index/movie_index.css'); ?>
<style type="text/css">
  p.example { font-weight: bold; }
</style>
<!-- CONTENT ============-->

<div class="row main-content">

  <div class="row reccomend-div2">
    <div class="row">
      <div class="col-md-12">
        <iframe src=" https://www.youtube.com/embed/aV-8Dc4uPRQ?autoplay=1" frameborder="0" class="movie"></iframe>
      </div>
    </div>
  </div>

  <?php for ($i = 0; $i < count($data); ++$i): ?>
    <div class="row reccomend-div0 well">
      <div class="col-md-4 col-md-offset-2">

        <p class="example"><font size="5"></font></p>
        <p>
          <font size="3">
            <?php echo $data[$i]['Restaurant']['access_line'] ;?>
          </font>
        </p>
        <p>
          <font size="3" color="FF6928">
            <span class="label label-warning">
              昼の予算
            </span>
             <?php echo $data[$i]['Restaurant']['budget'] ;?>
           </font>
        </p>
        <?php echo $data[$i]['Restaurant']['pr'] ;?>
      </div>
      <div class="col-md-4 recommend-div">
          <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $data[$i]['Movie']['id'])) ;?>">
            <img src="https://i.ytimg.com/vi_webp/31eHmMs5uCQ/mqdefault.webp"  class="reccomend-movie-photo">
          </a>
      </div>
    </div>
  <?php endfor ; ?>

</div>
<!-- /CONTENT ============-->