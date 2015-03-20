<?php echo $this->Html->css('view-serchResult/common-setting'); ?>
<?php echo $this->Html->css('view-serchResult/place-title.css'); ?>
<?php echo $this->Html->css('view-serchResult/movie-list.css'); ?>
<?php echo $this->Html->css('view-serchResult/select-page-button-movie.css'); ?>
<?php echo $this->Html->css('view-serchResult/view-reccomend-movie-for-movie.css'); ?>

<!--ビューにファイルをアップロードする-->


  <!-- CONTENT ============-->
  <div class="row main-content">
  <!-- 動画とお店の詳細 ============-->
  <div class="row">
    <div class="col-md-7">
      <div class="row">
        <!-- 動画 ============-->
        <table class="movie-list-table table table-striped">
          <?php for ($i = 0; $i < count($results); ++$i): ?>
          <tr class="movie-list-tr">
            <td class="movie-list-photo-td">
              <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $results[$i]['Movie']['id'])) ;?>" class="movie-list-photo-a">
                <img src="<?php echo $results[$i]['Movie']['thumbnails_url'] ;?>"  class="movie-list-photo">
              </a>
            </td>
            <td class="movie-list-description-td" valign="top">
              <div class="movie-list-description-div">
                <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $results[$i]['Movie']['id'])) ;?>" class="movie-list-description-title-ahref">
                  <span class="movie-list-description-title"><?php echo $results[$i]['Movie']['title'] ;?>（<?php echo $results[$i]['Restaurant']['name'] ;?>）</span><br>
                </a>
                <a href="/" class="movie-list-reporter-introduction-ahref">
                  <span class="label label-default">最寄駅</span>&nbsp;<span class="black-text"><?php echo $results[$i]['Restaurant']['access_station'] ;?></span> &nbsp;&nbsp;
                  <span class="label label-default">ジャンル</span>&nbsp;<span class="black-text"><?php echo $results[$i]['Restaurant']['category'] ;?></span> &nbsp;&nbsp;
                  <span class="label label-default">料金</span>&nbsp;<span class="black-text"><?php echo $results[$i]['Restaurant']['budget'] ;?>円</span> &nbsp;&nbsp;
                  <br>
                  <?php for ($j = 0; $j < count($results[$i]['TagRelation']); ++$j): ?>
                        <span class="label label-default">
                          <?php echo $results[$i]['TagRelation'][$j]['Tag']['name'] ;?>
                        </span>&nbsp;
                  <?php endfor ;?>
                  <br>
                  <span class="movie-list-reporter-introduction"><?php echo $results[$i]['Movie']['description'] ;?></span>
                </a>  
              </div>  
            </td>
          </tr>
          <?php endfor ; ?>

        </table>

        <!-- /動画 ============-->
        <div class="pagination" style="margin-left:55px;">                         
          <ul>                                           
            <?php echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
            <?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?>                              
            <?php echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
          </ul>                                          
        </div>

      </div>
    </div>
    <!-- /動画とお店の詳細 ============-->

      <!-- その他のお店のレコメンド ============-->
      <div class="col-md-4 recommend-movie-sidebar">

        <div class="recommend">
          最新の投稿
        </div>

        <table class="reccomend-movie-table">
          <?php for ($i = 0; $i < count($new_movies); ++$i): ?>

          <tr class="tr-for-reccomend-movie">
            <td class="reccomend-movie-photo-td">
              <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $new_movies[$i]['Movie']['id'])) ;?>">
                <img src="<?php echo $new_movies[$i]['Movie']['thumbnails_url'] ;?>"  class="reccomend-movie-photo">
              </a>
            </td>
            <td class="recommend-movie-detail-td" valign="top">
              <div class="reccomend-movie-name-div">
                <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $new_movies[$i]['Movie']['id'])) ;?>" class="a-href-for-reccomend-movie-place-name">
                  <span class="reccomend-movie-place-name text-bold"><?php echo $new_movies[$i]['Movie']['title'] ;?> （<?php echo $new_movies[$i]['Restaurant']['name'] ;?>）</span>
                  <span class="reccomend-movie-genre">（<?php echo $new_movies[$i]['Restaurant']['category'] ;?> </span>
                  <span class="reccomend-movie-station"> <?php echo $new_movies[$i]['Restaurant']['access_station'] ;?>)</span><br>
                </a>
                <a href="/" class="a_href_for_reccomend-movie-td">
                  <?php for ($j = 0; $j < count($new_movies[$i]['TagRelation']); ++$j): ?>
                        <span class="label label-default">
                          <?php echo $new_movies[$i]['TagRelation'][$j]['Tag']['name'] ;?>
                        </span>&nbsp;
                  <?php endfor ;?>
                  <br>
                  <span class="reccomend-movie-name text-bold"><?php echo $new_movies[$i]['Movie']['description'] ;?></span><br>
                </a>
              </div>    
            </td>
          </tr>

          <tr class="between-reccomend-movie-tr"></tr>

          <?php endfor ;?>

        </table>
      </div>
    </div>

  </div>
<!-- /CONTENT ============-->