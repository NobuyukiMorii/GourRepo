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
            <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $results[$i]['Movie']['id'])) ;?>" class="restaurant-name">
              <h2 class="page-header">
                <?php echo $this->upload->uploadImage($results[$i]['User']['UserProfile'],'UserProfile.avatar',array('style'=>'thumb'),array('class' => 'img-circle reporter-img')); ?>&nbsp;&nbsp;
                  <?php echo $results[$i]['Restaurant']['name'] ;?>
              </h2>
            </a>
          </div>

          <div class="col-md-4">
            <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $results[$i]['Movie']['id'])) ;?>">
              <img class="img-responsive" src="<?php echo $results[$i]['Restaurant']['image_url'] ;?>" alt="Thumbnails" height="400px">
            </a>
          </div>

          <div class="col-md-3">
            <p><?php echo $results[$i]['Movie']['description'] ;?></p>
          </div>

          <div class="col-md-3">
              <table class="table">
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
  </div>
  <!-- /.container -->