<?php echo $this->Html->css('movies-userFavoriteMovieList/movie-serchResult'); ?>

<!-- Page Content -->
<div class="container">

  <!-- Related Projects Row -->
  <div class="row">

      <div class="col-lg-12">
          <h3 class="page-header">
            最近見たお食事レポート
          </h3>
      </div>

      <?php for ($i=0; $i < count($UserWatchMovieList); $i++) : ?>
        <?php if(isset($UserWatchMovieList[$i]['Movie']['Restaurant']['image_url'])) : ?>

          <?php $tr_start = $i%4 ;?>
          <?php if($i === 0 || $tr_start === 0) : ?>
            <div class="row">
          <?php endif ; ?>

            <div class="col-sm-3 col-xs-6">
              <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserWatchMovieList[$i]['Movie']['id'])) ;?>" class="text-decorate">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $UserWatchMovieList[$i]['Movie']['Restaurant']['name'] ;?></h3>
                  </div>
                  <div class="panel-body">
                    <img class="img-responsive portfolio-item rest_photo" src="<?php echo $UserWatchMovieList[$i]['Movie']['Restaurant']['image_url'] ;?>" alt="photo">
                    <table class="table table-font">
                      <tr>
                        <td>レポーター名</td>
                        <td><?php echo $UserWatchMovieList[$i]['Movie']['User']['UserProfile']['name'] ;?></td>
                      </tr>
                      <tr>
                        <td>動画のタイトル</td>
                        <td><?php echo $UserWatchMovieList[$i]['Movie']['title'] ; ?></td>
                      </tr>
                      <tr>
                        <td>動画の紹介</td>
                        <td><?php echo $UserWatchMovieList[$i]['Movie']['description'] ; ?></td>
                      </tr>
                      <tr>
                        <td>再生回数</td>
                        <td><?php echo $UserWatchMovieList[$i]['Movie']['count'] ; ?>回</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </a>
            </div>

          <?php $tr_end = $i%4 ;?>
          <?php if($i === 3 || $tr_end === 3) : ?>
            </div>
          <?php endif ; ?>

        <?php endif ;?>
      <?php endfor ; ?>

  </div>
  <!-- /.row -->

  <!-- /動画 ============-->
  <div class="pagination">                         
    <ul>                                           
      <?php echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
      <?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?>                              
      <?php echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
    </ul>                                          
  </div>

</div>
</div>
<!-- /.container -->