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
            <h2 class="page-header">
              <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'reporterMovieList', $data[$i]['User']['id'])) ;?>">
                <?php echo $this->upload->uploadImage($data[$i]['User']['UserProfile'],'UserProfile.avatar',array('style'=>'thumb'),array('class' => 'img-circle reporter-img')); ?>
              </a>
              &nbsp;&nbsp;
              <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $data[$i]['Movie']['id'])) ;?>" class="restaurant-name">
                <span class="black"><?php echo $data[$i]['Restaurant']['name'] ;?></span>
              </a>
            </h2>
          </div>

          <div class="col-md-4">
            <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $data[$i]['Movie']['id'])) ;?>">
              <img class="img-responsive" src="<?php echo $data[$i]['Restaurant']['image_url'] ;?>" alt="Thumbnails" height="400px">
            </a>
          </div>

          <div class="col-md-3">
              <span class="label label-default">動画</span>
              <table class="table cursor" onclick="location.href='<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $data[$i]['Movie']['id'])) ;?>'">
                <tr>
                  <td>タイトル</td>
                  <td><?php echo $data[$i]['Movie']['title'] ;?></td>
                </tr>
                <tr>
                  <td>レポーター</td>
                  <td><?php echo $data[$i]['User']['UserProfile']['name'] ;?></td>
                </tr>
                <tr>
                  <td>再生回数</td>
                  <td><?php echo $data[$i]['Movie']['count'] ;?>回再生</td>
                </tr>
                <tr>
                  <td>紹介文</td>
                  <td><?php echo $data[$i]['Movie']['description'] ;?></td>
                </tr>
              </table>
          </div>

          <div class="col-md-3">
              <span class="label label-default">レストラン</span>
              <table class="table cursor" onclick="location.href='<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $data[$i]['Movie']['id'])) ;?>'">
                <tr>
                  <td>予算</td>
                  <td><?php echo $data[$i]['Restaurant']['budget'] ;?>円</td>
                </tr>
                <tr>
                  <td>カテゴリー</td>
                  <td><?php echo $data[$i]['Restaurant']['category_name_s'] ;?></td>
                </tr>
                <tr>
                  <td>最寄駅</td>
                  <td><?php echo $data[$i]['Restaurant']['access_line'] ;?> <?php echo $data[$i]['Restaurant']['access_station'] ;?></td>
                </tr>
                <tr>
                  <td>料理</td>
                  <td>
                    <?php for ($j = 0; $j < count($data[$i]['TagRelation']); ++$j): ?>

                        <?php echo $data[$i]['TagRelation'][$j]['Tag']['name'] ;?><br>

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