<?php echo $this->Html->css('view-view/common-setting'); ?>
  <?php echo $this->Html->css('view-view/place-title.css'); ?>
  <?php echo $this->Html->css('view-view/main-movie.css'); ?>
  <?php echo $this->Html->css('view-view/main-movie-description.css'); ?>
  <?php echo $this->Html->css('view-view/select-page-button-main.css'); ?>
  <?php echo $this->Html->css('view-view/fundamental-place-info.css'); ?>
  <?php echo $this->Html->css('view-view/view-reccomend-movie-for-main.css'); ?>

  <!-- CONTENT ============-->
  <div class="row main-content">
      <!-- お店の概要 ============-->
    <div class="row">
      <div class="col-md-8 view-header-place-name-div">
          <span class="view-header-place-name">
            <?php echo $movie['Restaurant']['name'] ;?>
          </span>
          <div class="view-header-label-div">
            <div class="col-md-9">
              <span class="label label-default">エリア</span> <?php echo $movie['Restaurant']['code_prefname'] ;?>
              &nbsp;&nbsp;
              <span class="label label-default">ジャンル</span> <?php echo $movie['Restaurant']['category'] ;?>
              &nbsp;&nbsp;

              <?php echo $this->Html->image('day.png', array('alt' => 'Day' , 'class' => 'view-header-day-image')); ?>
              ￥<?php echo $movie['Restaurant']['budget'] ;?>
              &nbsp;&nbsp;
              <span class="label label-default">定休日</span> <?php echo $movie['Restaurant']['holliday'] ;?>
              <br>
              <?php for ($j = 0; $j < count($movie['TagRelation']); ++$j): ?>
                    <span class="label label-default">
                      <?php echo $movie['TagRelation'][$j]['Tag']['name'] ;?>
                    </span>&nbsp;
              <?php endfor ;?>
            </div>
        </div>
      </div>

      <div class="col-md-3 view-header-place-tel-number-div">
        <div class="row">
          <?php echo $this->Html->image('phone.png', array('alt' => 'Day' , 'class' => 'header-phone-image')); ?>
          <span class="view-header-place-tel-number">
            <?php echo $movie['Restaurant']['tel'] ;?>
          </span>

          <?php

              if ($same_movie == 0){ 
          ?>
          <?php if(empty($userfavorite)): ?>

          <a href="<?php echo $this->html->url(array('controller' => 'UserFavoriteMovieLists' , 'action' => 'add', $movie['Movie']['id'])) ;?>" class="header-favorite-image-ahref">
            <?php echo $this->Html->image('star.png', array('alt' => 'Favorite' , 'class' => 'header-favorite-image')); ?>
          </a>
          <a href="<?php echo $this->html->url(array('controller' => 'UserFavoriteMovieLists' , 'action' => 'add' , $movie['Movie']['id'])) ;?>" class="view-header-favorite-text">
            favorite
          </a>
          <?php } ?>

          <?php endif ;?>

        </div>
      </div>
  </div>
  <!-- /お店の概要 ============-->

  <!-- 動画とお店の詳細 ============-->
  <div class="row">
    <div class="col-md-8">
      <div class="row">
        <!-- 動画 ============-->
        <div class="movie-div">
          <iframe src="<?php echo $movie['Movie']['youtube_iframe_url'] ;?>" frameborder="0" class="movie"></iframe>
          <div class="movie-detail-div">
            <div class="col-md-1 movie-reporter-photo-div">
              <?php echo $this->Html->image('AsukaMoko.jpeg', array('alt' => 'Day' , 'class' => 'movie-reporter-photo img-circle')); ?>
            </div>
            <div class="col-md-9">
              <span class="movie-name"><?php echo $movie['Movie']['title'] ;?></span><br>
              <div class="movie-description">
                <?php echo $movie['Movie']['description'] ;?>
              </div>
            </div>
          </div>
        </div>
        <!-- /動画 ============-->

        <!-- お店基本情報 ============-->
        <div class="col-md-12 info-detail">
          <div class="info-title-first-div">
            <span class="info-title-first-text">お店の基本情報</span>
          </div>
          <table class="table table table-bordered fundamental-info-table">
            <tr>
              <td class="table-heading">店名</td>
              <td>
                <span class="text-bold">
                  <?php echo $movie['Restaurant']['name'] ;?>
                </span>
              </td>
            </tr>
            <tr>
              <td class="table-heading">ジャンル</td>
              <td><?php echo $movie['Restaurant']['category'] ;?></td>
            </tr>
            <tr>
              <td class="table-heading">TEL・予約</td>
              <td>
                <span class="tel-number">
                  <?php echo $movie['Restaurant']['tel'] ;?>
                </span>
                <br>
                <span class="tel-note-of-caution">※お問い合わせの際は「ぐるれぽを見た」とお伝えいただければ幸いです。</span>
              </td>
            </tr>
            <tr>
              <td class="table-heading">最寄駅</td>
              <td><?php echo $movie['Restaurant']['access_station'] ;?> <?php echo $movie['Restaurant']['access_station_exit'] ;?></td>
            </tr>


            <tr>
              <td class="table-heading">住所</td>
              <td><?php echo $movie['Restaurant']['address'] ;?>
                <iframe src="https://www.google.com/maps/embed/v1/search?key=AIzaSyCgCauF4jrJHZxT41rZ6NocFHSuOMbA6UY&q=<?p... echo $movie['Restaurant']['latitude'] ;?>,<?php echo $movie['Restaurant']['longitude'] ;?>&zoom=16&q=%E9%A3%B2%E9%A3%9F%E5%BA%97" frameborder="0" class="map"></iframe>
              </td>
            </tr>
            <tr>
              <td class="table-heading">営業時間</td>
              <td>
                <?php echo $movie['Restaurant']['opentime'] ;?>
              </td>
            </tr>
            <tr>
              <td class="table-heading">定休日</td>
              <td>
                <?php echo $movie['Restaurant']['holliday'] ;?>
              </td>
            </tr>
            <tr>
              <td class="table-heading">予算（ユーザーより）</td>
              <td>
                <?php echo $this->Html->image('day.png', array('alt' => 'Day' , 'class' => 'day-image')); ?>
                <?php echo $movie['Restaurant']['budget'] ;?>
              </td>
            </tr>
            <tr>
              <td class="table-heading">カード</td>
              <td>
                <?php echo $movie['Restaurant']['credit_card'] ;?>
              </td>
            </tr>
            <tr>
              <td class="table-heading">設備</td>
              <td>
                <?php echo $movie['Restaurant']['equipment'] ;?>
              </td>
            </tr>
            <tr>
              <td class="table-heading">駐車場</td>
              <td>
                <?php echo $movie['Restaurant']['parking_lots'] ;?>台
              </td>
            </tr>
          </table>

        </div>
        <!-- お店基本情報 ============-->
      </div>
    </div>
    <!-- /動画とお店の詳細 ============-->

      <!-- その他のお店のレコメンド ============-->
      <div class="col-md-4 recommend-movie-sidebar">

        <?php if(isset($movies_in_same_restaurant)): ?>

        <table class="reccomend-movie-table">

          <?php for ($i = 0; $i < count($movies_in_same_restaurant); ++$i): ?>

          <tr class="tr-for-reccomend-movie">
            <td class="reccomend-movie-photo-td">
              <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $movies_in_same_restaurant[$i]['Movie']['id'])) ;?>">
                <img src="<?php echo $movies_in_same_restaurant[$i]['Movie']['thumbnails_url'] ;?>"  class="reccomend-movie-photo">
              </a>
            </td>
            <td class="recommend-movie-detail-td" valign="top">
              <div class="reccomend-movie-name-div">
                <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $movies_in_same_restaurant[$i]['Movie']['id'])) ;?>" class="a_href_for_reccomend-movie-td">
                  <span class="reccomend-movie-name text-bold"><?php echo $movies_in_same_restaurant[$i]['Movie']['title'] ;?></span><br>
                  <span class="reccomend-movie-name text-bold"><?php echo $movies_in_same_restaurant[$i]['Movie']['description'] ;?></span><br>
                </a>
              </div>    
            </td>
          </tr>

          <tr class="between-reccomend-movie-tr"></tr>

          <?php endfor ;?>

        </table>
        <?php endif; ?>
      </div>
    </div>

  </div>
<!-- /CONTENT ============-->