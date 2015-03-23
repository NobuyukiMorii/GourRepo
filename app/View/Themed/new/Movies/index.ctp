<?php echo $this->Html->css('movies-index/index.css'); ?>

  <div class="row reccomend-div2">
    <div class="row">
      <div class="col-md-12 center">
        <iframe src="https://www.youtube.com/embed/aV-8Dc4uPRQ?autoplay=1&loop=1&playlist=aV-8Dc4uPRQ" frameborder="0" class="movie"></iframe>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container">
     <?php for ($i = 0; $i < count($data); ++$i): ?>
      <!-- Features Section -->
      <div class="row">
          <div class="col-lg-12">
            <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $data[$i]['Movie']['id'])) ;?>" class="restaurant-name">
              <h2 class="page-header">
                <?php echo $this->upload->uploadImage($data[$i]['User']['UserProfile'],'UserProfile.avatar',array('style'=>'thumb'),array('class' => 'img-circle reporter-img')); ?>&nbsp;&nbsp;
                  <?php echo $data[$i]['Restaurant']['name'] ;?>
              </h2>
            </a>
          </div>

          <div class="col-md-4">
            <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $data[$i]['Movie']['id'])) ;?>">
              <img class="img-responsive" src="<?php echo $data[$i]['Restaurant']['image_url'] ;?>" alt="Thumbnails" height="400px">
            </a>
          </div>

          <div class="col-md-3">
            <p><?php echo $data[$i]['Movie']['description'] ;?></p>
          </div>

          <div class="col-md-3">
              <table class="table">
                <tr>
                  <td>予算</td>
                  <td><?php echo $data[$i]['Restaurant']['budget'] ;?>円</td>
                </tr>
                <tr>
                  <td>カテゴリー</td>
                  <td><?php echo $data[$i]['Restaurant']['category'] ;?></td>
                </tr>
                <tr>
                  <td>最寄駅</td>
                  <td><?php echo $data[$i]['Restaurant']['access_line'] ;?> <?php echo $data[$i]['Restaurant']['access_station'] ;?></td>
                </tr>
                <tr>
                  <td>レポーター</td>
                  <td><?php echo $data[$i]['User']['UserProfile']['name'] ;?></td>
                </tr>
                <tr>
                  <td>タグ</td>
                  <td>
                    <?php for ($j = 0; $j < count($data[$i]['TagRelation']); ++$j): ?>
                      <span class="label label-info">
                        <?php echo $data[$i]['TagRelation'][$j]['Tag']['name'] ;?>
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