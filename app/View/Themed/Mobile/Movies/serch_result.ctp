<?php echo $this->Html->css('movies-serchResult/common-setting'); ?>
<?php echo $this->Html->css('movies-serchResult/place-title'); ?>
<?php echo $this->Html->css('movies-serchResult/movie-list'); ?>
<?php echo $this->Html->css('movies-serchResult/select-page-button-movie'); ?>
<?php echo $this->Html->css('movies-serchResult/view-reccomend-movie-for-movie'); ?>
<?php echo $this->Html->css('movies-serchResult/movie-serchResult'); ?>


    <!-- Page Content -->
    <div class="screen-width">
      <hr>
      <?php for ($i = 0; $i < count($results); ++$i): ?>
        <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view', $results[$i]['Movie']['id'])) ;?>">
          
            <img class="RestPhoto" src="<?php echo $results[$i]['Restaurant']['image_url'] ;?>" alt="Thumbnails">
            <table class="text-width">
              <tr><td><span class="black"><?php echo $results[$i]['Restaurant']['name'] ;?></span></td></tr>
              <tr><td><span class="black">タイトル：<?php echo $results[$i]['Movie']['title'] ;?></span></td></tr>
              <tr><td><span class="black">レポーター名：<?php echo $results[$i]['User']['UserProfile']['name'] ;?></span></td></tr>
              <tr><td><span class="black">最寄駅：<?php echo $results[$i]['Restaurant']['access_station'] ;?></span></td></tr>
              <tr><td><span class="black">カテゴリー名：<?php echo $results[$i]['Restaurant']['category_name_s'] ;?></span></td></tr>
            </table>
        </a>
      <hr>
      <?php endfor ; ?>
    </div>
    <!-- Page Content -->



    <div class="pagination">                         
      <ul>                                           
        <?php echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
        <?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?>                              
        <?php echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
      </ul>                                          
    </div>

  </div>
  <!-- /.container -->