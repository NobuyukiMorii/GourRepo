<?php echo $this->Html->css('movies-userWatchMovieList/common-setting'); ?>
<?php echo $this->Html->css('movies-userWatchMovieList/place-title.css'); ?>
<?php echo $this->Html->css('movies-userWatchMovieList/movie-list.css'); ?>
<?php echo $this->Html->css('movies-userWatchMovieList/select-page-button-movie.css'); ?>
<?php echo $this->Html->css('movies-userWatchMovieList/view-reccomend-movie-for-movie.css'); ?>
<?php echo $this->Html->css('movies-myMovieIndex/movie-serchResult'); ?>

  <!-- CONTENT ============-->
  <div class="row main-content">
  <!-- 動画とお店の詳細 ============-->
  <div class="row">

    <div class="col-md-5 col-md-offset-3">

      <div class="row">
        <h3 class="margin-left">閲覧履歴</h3>
        <!-- 動画 ============-->
        <table class="movie-list-table table table-font">

          <tr class="movie-list-tr">
            <td class="movie-list-photo-td">
              時間
            </td>
            <td class="movie-list-description-td" valign="top">
              レストラン名
            </td>
            <td class="movie-list-description-td" valign="top">
              レポーター名
            </td>
          </tr>

          <?php for ($i = 0; $i < count($UserWatchMovieList); ++$i): ?>
          <tr class="movie-list-tr">
            <td class="movie-list-photo-td">
                <?php 
                  echo $UserWatchMovieList[$i]['UserWatchMovieList']['created'];
                ;?>
            </td>
            <td class="movie-list-description-td" valign="top">
              <div class="movie-list-description-div">
                <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserWatchMovieList[$i]['Movie']['id'])) ;?>" class="rest_name_x_reporter_name">
                  <?php echo $UserWatchMovieList[$i]['Movie']['Restaurant']['name'] ;?>
                </a>
              </div>
            </td>
            <td class="movie-list-description-td" valign="top">
              <div class="movie-list-description-div">
                <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'reporterMovieList' , $UserWatchMovieList[$i]['Movie']['User']['id'])) ;?>" class="rest_name_x_reporter_name">
                  <?php echo $UserWatchMovieList[$i]['Movie']['User']['UserProfile']['name'] ;?>                    
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

    </div>

  </div>
<!-- /CONTENT ============-->