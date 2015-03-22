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
    <div class="col-md-9 col-md-offset-1">
      <div class="row">
        <!-- 動画 ============-->
        <table class="movie-list-table table">
          <?php for ($i = 0; $i < count($UserWatchMovieList); ++$i): ?>
          <tr class="movie-list-tr">
            <td class="movie-list-photo-td" style="width:20%;">
                <?php 
                  $date = new DateTime($UserWatchMovieList[$i]['UserWatchMovieList']['created']);
                  echo $date->format('Y年n月t日 H時i分');
                ;?>
            </td>
            <td class="movie-list-description-td" valign="top" style="width:38%;">
              <div class="movie-list-description-div">
                <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserWatchMovieList[$i]['Movie']['id'])) ;?>" class="rest_name_x_reporter_name">
                  <span class="view-header-place-name">
                    <?php echo $UserWatchMovieList[$i]['Movie']['Restaurant']['name'] ;?>
                  </span>
                </a>
              </div>
            </td>
            <td class="movie-list-description-td" valign="top" style="width:4%;">
              <div class="movie-list-description-div">
                <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserWatchMovieList[$i]['Movie']['id'])) ;?>" class="rest_name_x_reporter_name">
                  <span class="view-header-place-name">
                    x
                  </span>
                </a>
              </div>
            </td>
            <td class="movie-list-description-td" valign="top" style="width:38%;">
              <div class="movie-list-description-div">
                <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserWatchMovieList[$i]['Movie']['id'])) ;?>" class="rest_name_x_reporter_name">
                  <span class="view-header-place-name">
                    <?php echo $UserWatchMovieList[$i]['Movie']['User']['UserProfile']['name'] ;?>
                  </span>
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