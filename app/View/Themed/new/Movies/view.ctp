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
  <div class="row">
    <?php echo $this->Session->flash(); ?>
    <div class="col-md-2 header">
      <?php echo $this->element('headerLogo'); ?>
      <?php echo $this->element('dropDownButton'); ?>
    </div>
    
    <?php echo $this->element('serchInput'); ?>
    <?php echo $this->element('movieUploadButton' ,array('gurunabi_id' => $movie['Restaurant']['gournabi_id'])); ?>
    <?php echo $this->element('profileImage'); ?>
  </div>
  <!-- /HEADER ============-->
  
  <!-- CONTENT ============-->
  <?php echo $this->Session->flash(); ?>

    <div class="margin-left-new-2">
      <!-- CONTENT ============-->
      <div class="row main-content">
          <!-- お店の概要 ============-->
        <div class="row margin-bottom">
          <div class="col-md-7 col-md-offset-1">

              <a href ="<?php echo $movie['Restaurant']['url'] ;?>" target=”_blank”>
                <img src="<?php echo $movie['Restaurant']['image_url'] ;?>" class='img-thumbnail reporter-img'>
              </a>

              <span class="view-header-place-name">
                <?php echo $movie['Restaurant']['name'] ;?>
              </span>

              <div class="view-header-label-div">
                <div class="col-md-9">
                  <?php for ($j = 0; $j < count($movie['TagRelation']); ++$j): ?>
                        <span class="label label-info">
                          <?php echo $movie['TagRelation'][$j]['Tag']['name'] ;?>
                        </span>&nbsp;
                  <?php endfor ;?>
                </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="row">
              <?php echo $this->Html->image('phone.png', array('alt' => 'Day' , 'class' => 'header-phone-image')); ?>
              <span class="view-header-place-tel-number">
                <?php echo $movie['Restaurant']['tel'] ;?>
              </span>

              <?php if(!empty($userSession)) : ?>
                <a href="<?php echo $this->html->url(array('controller' => 'UserFavoriteMovieLists' , 'action' => 'add', $movie['Movie']['id'])) ;?>" class="header-favorite-image-ahref">
                  <?php echo $this->Html->image('star.png', array('alt' => 'Favorite' , 'class' => 'header-favorite-image')); ?>
                </a>
                <a href="<?php echo $this->html->url(array('controller' => 'UserFavoriteMovieLists' , 'action' => 'add' , $movie['Movie']['id'])) ;?>" class="view-header-favorite-text">
                favorite
                </a>
              <?php endif ; ?>
              
            </div>
          </div>
      </div>
      <!-- /お店の概要 ============-->
    </div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

          <div class="col-md-9">

            <div class="thumbnail">
                <iframe src="<?php echo $movie['Movie']['youtube_iframe_url'] ;?>" frameborder="0" class="movie-new"></iframe>
                <div class="caption-full">
                    <h4 class="pull-right"><?php echo $movie['Movie']['count'] ;?>回再生</h4>
                    <h4 class="movie-title-new">
                      <small>タイトル</small>
                      <?php echo $movie['Movie']['title'] ;?><br>
                    </h4>
                    <h6 class="movie-title-new">
                      <small>紹介文</small><br>
                      <?php echo $movie['Movie']['description'] ;?>
                    </h6>
                    <div align="right">
                    <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'reporterMovieList', $movie['User']['id'])) ;?>" class="reporter">
                    <h6 class="movie-title-new">
                      <small>レポーター</small>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $movie['User']['UserProfile']['name'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo $this->upload->uploadImage($movie['User']['UserProfile'],'UserProfile.avatar',array('style'=>'thumb'),array('class' => 'img-circle reporter-img')); ?>
                    </h6>
                    </a>
                  </div>
                    
                </div>
            </div>

            <!-- お店基本情報 ============-->
            <div class="col-md-12 info-detail">
              <div class="info-title-first-div">
                <span class="info-title-first-text">お店について</span>
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
                    <iframe src="https://www.google.com/maps/embed/v1/search?key=AIzaSyCgCauF4jrJHZxT41rZ6NocFHSuOMbA6UY&q=<?php echo $movie['Restaurant']['latitude'] ;?>,<?php echo $movie['Restaurant']['longitude'] ;?>&zoom=16&q=%E9%A3%B2%E9%A3%9F%E5%BA%97" frameborder="0" class="map"></iframe>
                  </td>
                </tr>
                <tr>
                  <td class="table-heading">営業時間</td>
                  <td>
                    <?php echo $movie['Restaurant']['opentime'] ;?>
                  </td>
                </tr>
                <tr>
                  <td class="table-heading">予算（ユーザーより）</td>
                  <td>
                    平均<?php echo $movie['Restaurant']['budget'] ;?>円
                  </td>
                </tr>
                <tr>
                  <td class="table-heading">ぐるなびを見る</td>
                  <td>
                    <a class="btn btn-default" href="<?php echo $movie['Restaurant']['url'] ;?>" role="button" target=”_blank”>ぐるなび</a>
                  </td>
                </tr>
              </table>

              <div class="info-title-first-div">
                <span class="info-title-first-text">レポーターについて</span>
              </div>
              <table class="table table table-bordered fundamental-info-table">
                <tr>
                  <td class="table-heading">レポーター名</td>
                  <td>
                    <span class="text-bold">
                      <?php echo $movie['User']['UserProfile']['name'] ;?>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td class="table-heading">住んでいる地域</td>
                  <td>
                      <?php echo $movie['User']['UserProfile']['living_area'] ;?>
                  </td>
                </tr>
                <tr>
                  <td class="table-heading">好きな食べ物</td>
                  <td>
                      <?php echo $movie['User']['UserProfile']['like_food'] ;?>
                  </td>
                </tr>
                <tr>
                  <td class="table-heading">好きなジャンル</td>
                  <td>
                      <?php echo $movie['User']['UserProfile']['like_genre'] ;?>
                  </td>
                </tr>
                <tr>
                  <td class="table-heading">よく使う金額</td>
                  <td>
                      <?php echo $movie['User']['UserProfile']['like_price_zone'] ;?>
                  </td>
                </tr>
                <tr>
                  <td class="table-heading">紹介文</td>
                  <td>
                      <?php echo $movie['User']['UserProfile']['introduction'] ;?>
                  </td>
                </tr>
              </table>
            </div>
            <!-- お店基本情報 ============-->

            </div>

            <div class="col-md-3">
              <?php if(isset($movies_in_same_restaurant)): ?>
                <?php for ($i = 0; $i < count($movies_in_same_restaurant); ++$i): ?>
                  <!-- Movie Row -->
                  <div class="row">
                      <div class="col-md-12 portfolio-item">
                        <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $movies_in_same_restaurant[$i]['Movie']['id'])) ;?>" class="hover">
                        <div class="panel panel-default zenbu">
                          <div class="panel-body">
                            
                            <img src="<?php echo $movies_in_same_restaurant[$i]['Movie']['thumbnails_url'] ;?>" class='thumbnails'>

                            <table style="margin-top:15px;">
                              <tr>
                                <td class="first-td">
                                    <small>タイトル</small>
                                </td>
                                <td>

                                    <?php echo $movies_in_same_restaurant[$i]['Movie']['title'] ;?>

                                </td>
                              </tr>
                              <tr>
                                <td class="first-td">

                                    <small>レポーター</small>

                                </td>
                                <td>

                                    <?php echo $movies_in_same_restaurant[$i]['User']['UserProfile']['name'] ;?>

                                </td>
                              </tr>
                              <tr>
                                <td class="first-td">

                                    <small>紹介文</small>

                                </td>
                                <td>

                                    <?php echo $movie['Movie']['description'] ;?>

                                </td>
                              </tr>
                            </table>

                          </div>
                        </div>
                         </a>
                      </div>
                  </div>
                <?php endfor ;?>
                <!-- /.row -->
              <?php endif ;?>
            </div>

        </div>

    </div>

  <!-- /CONTENT ============-->
  </div>

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
  </body>
</html>