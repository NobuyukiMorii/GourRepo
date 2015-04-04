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
    <?php echo $this->Html->css('movies-view/common-setting'); ?>
    <?php echo $this->Html->css('movies-view/place-title.css'); ?>
    <?php echo $this->Html->css('movies-view/main-movie.css'); ?>
    <?php echo $this->Html->css('movies-view/main-movie-description.css'); ?>
    <?php echo $this->Html->css('movies-view/select-page-button-main.css'); ?>
    <?php echo $this->Html->css('movies-view/fundamental-place-info.css'); ?>
    <?php echo $this->Html->css('movies-view/view-reccomend-movie-for-main.css'); ?>
    <?php echo $this->Html->css('movies-view/movies-view.css'); ?>
    <?php echo $this->Html->css('movies-view/new-css'); ?>
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
  
  <?php echo $this->Session->flash(); ?>

  <!-- CONTENT ============-->

      <!-- お店の概要 ============-->
    <div class="row midashi">
      <div class="col-xs-12">

          <a href ="<?php echo $movie['Restaurant']['url'] ;?>" target=”_blank”>
            <img src="<?php echo $movie['Restaurant']['image_url'] ;?>" class='img-thumbnail rest-image'>
          </a>

          <span class="">
            <?php echo $movie['Restaurant']['name'] ;?>
          </span>

          <div class="view-header-label-div">
            <div class="col-xs-9">
              <?php for ($j = 0; $j < count($movie['TagRelation']); ++$j): ?>
                    <span class="label label-info">
                      <?php echo $movie['TagRelation'][$j]['Tag']['name'] ;?>
                    </span>&nbsp;
              <?php endfor ;?>
            </div>
          </div>

      </div>
    </div>
  <!-- /お店の概要 ============-->


    <!-- Page Content -->
    <div class="container2">

      <div class="thumbnail">
        <iframe src="<?php echo $movie['Movie']['youtube_iframe_url'] ;?>" frameborder="0" class="movie-new"></iframe>
      </div>

      <!-- お店基本情報 ============-->
      <div class="col-xs-12 info-detail-font">
        <div class="info-title-first-div">
          <span class="info-title-first-text">お店について</span>
        </div>
        <table class="table table table-bordered fundamental-info-table">
          <tr>
            <td class="table-heading2">店名</td>
            <td>
              <span class="text-bold">
                <?php echo $movie['Restaurant']['name'] ;?>
              </span>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">ジャンル</td>
            <td><?php echo $movie['Restaurant']['category_name_s'] ;?></td>
          </tr>
          <tr>
            <td class="table-heading2">TEL・予約</td>
            <td>
              <span class="tel-number">
                <?php echo $movie['Restaurant']['tel'] ;?>
              </span>
              <br>
              <span class="tel-note-of-caution">※お問い合わせの際は「ぐるれぽを見た」とお伝えいただければ幸いです。</span>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">最寄駅</td>
            <td><?php echo $movie['Restaurant']['access_station'] ;?> <?php echo $movie['Restaurant']['access_station_exit'] ;?></td>
          </tr>


          <tr>
            <td class="table-heading2">住所</td>
            <td><?php echo $movie['Restaurant']['address'] ;?>
              <iframe src="https://www.google.com/maps/embed/v1/search?key=AIzaSyCgCauF4jrJHZxT41rZ6NocFHSuOMbA6UY&q=<?php echo $movie['Restaurant']['latitude'] ;?>,<?php echo $movie['Restaurant']['longitude'] ;?>&zoom=16&q=%E9%A3%B2%E9%A3%9F%E5%BA%97" frameborder="0" scrolling="no"  class="map"></iframe>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">営業時間</td>
            <td>
              <?php echo $movie['Restaurant']['opentime'] ;?>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">予算（ユーザーより）</td>
            <td>
              平均<?php echo $movie['Restaurant']['budget'] ;?>円
            </td>
          </tr>
          <tr>
            <td class="table-heading2">ぐるなびを見る</td>
            <td>
              <a class="btn btn-default" href="<?php echo $movie['Restaurant']['url'] ;?>" role="button" target=”_blank”>ぐるなび</a>
            </td>
          </tr>
        </table>

        <div class="info-title-first-div">
          <span class="info-title-first-text">レポートについて</span>
        </div>
        <table class="table table table-bordered fundamental-info-table">
          <tr>
            <td class="table-heading2">タイトル</td>
            <td>
              <span class="text-bold">
                <?php echo $movie['Movie']['title'] ;?>
              </span>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">紹介文</td>
            <td>
              <span class="text-bold">
                <?php echo $movie['Movie']['description'] ;?>
              </span>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">再生回数</td>
            <td>
              <span class="text-bold">
                <?php echo $movie['Movie']['count'] ;?>回再生
              </span>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">レポーター名</td>
            <td>
              <span class="text-bold">
                <?php echo $movie['User']['UserProfile']['name'] ;?>
              </span>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">住んでいる地域</td>
            <td>
                <?php echo $movie['User']['UserProfile']['living_area'] ;?>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">好きな食べ物</td>
            <td>
                <?php echo $movie['User']['UserProfile']['like_food'] ;?>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">好きなジャンル</td>
            <td>
                <?php echo $movie['User']['UserProfile']['like_genre'] ;?>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">よく使う金額</td>
            <td>
                <?php echo $movie['User']['UserProfile']['like_price_zone'] ;?>
            </td>
          </tr>
          <tr>
            <td class="table-heading2">紹介文</td>
            <td>
                <?php echo $movie['User']['UserProfile']['introduction'] ;?>
            </td>
          </tr>
        </table>
      </div>
      <!-- お店基本情報 ============-->
    </div>
    
  <!-- /CONTENT ============-->

  <!-- FOOTER ============-->
  <div class="col-xs-12" style="margin-top:20px;">
    <?php echo $this->Html->image('GourRepo.png', array('alt' => 'GourRepo Logo' , 'class' => 'footer-logo')); ?>
    <span class="concept-message">行きたいお店がもっとよくわかる</span>
    <a href="#"><span class="concept-message">利用規約</span></a>
  </div>
  <!-- /FOOTER ============-->

  <!-- script references -->
  <?php echo $this->Html->script('jquery-1.11.2.min');?>
  <?php echo $this->Html->script('bootstrap');?>
  </body>
</html>