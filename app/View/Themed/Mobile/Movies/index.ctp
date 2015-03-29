<?php echo $this->Html->css('movies-index/index.css'); ?>

  <div class="row reccomend-div2">
    <div class="row">
      <div class="col-xs-12 center">
        <iframe src="https://www.youtube.com/embed/aV-8Dc4uPRQ?autoplay=1&loop=1&playlist=aV-8Dc4uPRQ" frameborder="0" class="movie"></iframe>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="screen-width">
    <hr>
    <?php for ($i = 0; $i < count($data); ++$i): ?>
      <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $data[$i]['Movie']['id'])) ;?>">
        
          <img class="RestPhoto" src="<?php echo $data[$i]['Restaurant']['image_url'] ;?>" alt="Thumbnails">
          <table class="text-width">
            <tr><td><span class="black"><?php echo $data[$i]['Restaurant']['name'] ;?></span></td></tr>
            <tr><td><span class="black">タイトル：<?php echo $data[$i]['Movie']['title'] ;?></span></td></tr>
            <tr><td><span class="black">レポーター名：<?php echo $data[$i]['User']['UserProfile']['name'] ;?></span></td></tr>
            <tr><td><span class="black">最寄駅：<?php echo $data[$i]['Restaurant']['access_station'] ;?></span></td></tr>
            <tr><td><span class="black">カテゴリー名：<?php echo $data[$i]['Restaurant']['category_name_s'] ;?></span></td></tr>
          </table>
      </a>
    <hr>
    <?php endfor ; ?>
  </div>
  <!-- Page Content -->