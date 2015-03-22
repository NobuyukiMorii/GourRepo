<?php echo $this->Html->css('movies-userFavoriteMovieList/common-setting'); ?>
<?php echo $this->Html->css('movies-userFavoriteMovieList/place-title.css'); ?>
<?php echo $this->Html->css('movies-userFavoriteMovieList/movie-list.css'); ?>
<?php echo $this->Html->css('movies-userFavoriteMovieList/select-page-button-movie.css'); ?>
<?php echo $this->Html->css('movies-userFavoriteMovieList/view-reccomend-movie-for-movie.css'); ?>
<?php echo $this->Html->css('movies-userFavoriteMovieList/movie-serchResult'); ?>

 <!-- CONTENT ============-->
  <div class="row main-content">
  <!-- 動画とお店の詳細 ============-->
  <div class="row">
    <div class="col-md-9 col-md-offset-1">
      <div class="row">
        <!-- 動画 ============-->
        <table class="movie-list-table table">
          <?php for ($i = 0; $i < count($UserFavoriteMovieList); ++$i): ?>
          <tr class="movie-list-tr">
            <td class="movie-list-photo-td">
              <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserFavoriteMovieList[$i]['Movie']['id'])) ;?>" class="movie-list-photo-a">
                <img src="<?php echo $UserFavoriteMovieList[$i]['Movie']['thumbnails_url'] ;?>"  class="movie-list-photo">
              </a>
            </td>
            <td class="movie-list-description-td" valign="top">
              <div class="movie-list-description-div" style="margin-top:10px;">
                <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserFavoriteMovieList[$i]['Movie']['id'])) ;?>" class="rest_name_x_reporter_name">
                  <?php echo $this->upload->uploadImage($UserFavoriteMovieList[$i]['Movie']['User']['UserProfile'],'UserProfile.avatar',array('style'=>'thumb'),array('class' => 'img-circle reporter-img')); ?>&nbsp;&nbsp;
                  <span class="view-header-place-name">
                    <?php echo $UserFavoriteMovieList[$i]['Movie']['User']['UserProfile']['name'] ;?>
                  </span>

                  <img src="http://www.meshbelt.com/X.gif" width="30px">

                  <span class="view-header-place-name">
                    <?php echo $UserFavoriteMovieList[$i]['Movie']['Restaurant']['name'] ;?>
                  </span>
                </a>
              </div>
              <br>
              <p><?php echo $UserFavoriteMovieList[$i]['Movie']['count'] ;?>回再生</p>
            </td>
            <td>
            	<?php echo $this->Form->create('UserFavoriteMovieLists', array('type' => 'post' , 'action' => 'delete')); ?>
		        <?php echo $this->Form->input('UserFavoriteMovieListsController.id', array(
		            'label' => false,
		            'type' => 'hidden',
		            'value' => $UserFavoriteMovieList[$i]['UserFavoriteMovieList']['id'],
		        )); ?>
		        <button type="submit" class="btn btn-warning">お気に入りから削除</button>
		        <?php echo $this->Form->end(); ?>
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