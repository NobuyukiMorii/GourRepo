<?php echo $this->Html->css('movies-serchResult/common-setting'); ?>
<?php echo $this->Html->css('movies-serchResult/place-title'); ?>
<?php echo $this->Html->css('movies-serchResult/movie-list'); ?>
<?php echo $this->Html->css('movies-serchResult/select-page-button-movie'); ?>
<?php echo $this->Html->css('movies-serchResult/view-reccomend-movie-for-movie'); ?>
<?php echo $this->Html->css('movies-serchResult/movie-serchResult'); ?>


 <!-- Page Content -->
  <div class="container">
     <?php for ($i = 0; $i < count($results); ++$i): ?>
      <!-- Features Section -->
      <div class="row">
          <div class="col-lg-12">
              <h2 class="page-header">
                <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'reporterMovieList', $results[$i]['User']['id'])) ;?>" class="text-decoratio">
                <?php echo $this->upload->uploadImage($results[$i]['User']['UserProfile'],'UserProfile.avatar',array('style'=>'thumb'),array('class' => 'img-circle reporter-img')); ?>
                </a>
                &nbsp;&nbsp;
                <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $results[$i]['Movie']['id'])) ;?>" class="restaurant-name noneUnderline">
                  <span class="black"><?php echo $results[$i]['Restaurant']['name'] ;?></span>
                </a>
              </h2>
          </div>

          <div class="col-md-4">
            <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $results[$i]['Movie']['id'])) ;?>">
              <img class="img-responsive" src="<?php echo $results[$i]['Restaurant']['image_url'] ;?>" alt="Thumbnails" height="400px">
            </a>
          </div>

          <div class="col-md-3">
            <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $results[$i]['Movie']['id'])) ;?>" class="black description">
              <p><?php echo $results[$i]['Movie']['description'] ;?></p>
            </a>
          </div>

          <div class="col-md-3">
              <table class="table cursor" onclick="location.href='<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $results[$i]['Movie']['id'])) ;?>'">
                <tr>
                  <td>予算</td>
                  <td><?php echo $results[$i]['Restaurant']['budget'] ;?>円</td>
                </tr>
                <tr>
                  <td>カテゴリー</td>
                  <td><?php echo $results[$i]['Restaurant']['category'] ;?></td>
                </tr>
                <tr>
                  <td>最寄駅</td>
                  <td><?php echo $results[$i]['Restaurant']['access_line'] ;?> <?php echo $results[$i]['Restaurant']['access_station'] ;?></td>
                </tr>
                <tr>
                  <td>レポーター</td>
                  <td><?php echo $results[$i]['User']['UserProfile']['name'] ;?></td>
                </tr>
                <tr>
                  <td>タグ</td>
                  <td>
                    <?php for ($j = 0; $j < count($results[$i]['TagRelation']); ++$j): ?>
                      <span class="label label-info">
                        <?php echo $results[$i]['TagRelation'][$j]['Tag']['name'] ;?>
                      </span>&nbsp;
                    <?php endfor ;?>
                  </td>
                </tr>
              </table>
          </div>

      </div>
      <!-- /.row -->
    <?php endfor ; ?>

    <div class="pagination">                         
      <ul>                                           
        <?php echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
        <?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?>                              
        <?php echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
      </ul>                                          
    </div>

  </div>
  <!-- /.container -->