<?php echo $this->Html->css('movies-serchResult/common-setting'); ?>
<?php echo $this->Html->css('movies-serchResult/place-title'); ?>
<?php echo $this->Html->css('movies-serchResult/movie-list'); ?>
<?php echo $this->Html->css('movies-serchResult/select-page-button-movie'); ?>
<?php echo $this->Html->css('movies-serchResult/view-reccomend-movie-for-movie'); ?>
<?php echo $this->Html->css('movies-serchResult/movie-serchResult'); ?>


  <!-- CONTENT ============-->
  <div class="row main-content">
  <!-- 動画とお店の詳細 ============-->
  <div class="row">
    <div class="col-md-9 col-md-offset-1">
      <div class="row">
        <!-- 動画 ============-->
        <table class="movie-list-table table">
          <?php for ($i = 0; $i < count($results); ++$i): ?>
          <tr class="movie-list-tr">
            <td class="movie-list-photo-td">
              <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $results[$i]['Movie']['id'])) ;?>" class="movie-list-photo-a">
                <img src="<?php echo $results[$i]['Movie']['thumbnails_url'] ;?>"  class="movie-list-photo">
              </a>
            </td>
            <td class="movie-list-description-td" valign="top">
              <div class="movie-list-description-div" style="margin-top:10px;">
                <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $results[$i]['Movie']['id'])) ;?>" class="rest_name_x_reporter_name">
                  <?php echo $this->upload->uploadImage($results[$i]['User']['UserProfile'],'UserProfile.avatar',array('style'=>'thumb'),array('class' => 'img-circle reporter-img')); ?>&nbsp;&nbsp;
                  <span class="view-header-place-name">
                    <?php echo $results[$i]['User']['UserProfile']['name'] ;?>
                  </span>

                  <img src="http://www.meshbelt.com/X.gif" width="30px">

                  <span class="view-header-place-name">
                    <?php echo $results[$i]['Restaurant']['name'] ;?>
                  </span>
                </a>
              </div>
              <br>
              <p><?php echo $results[$i]['Movie']['count'] ;?>回再生</p>
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