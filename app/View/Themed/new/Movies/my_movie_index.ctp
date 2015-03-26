<?php echo $this->Html->css('movies-myMovieIndex/common-setting'); ?>
<?php echo $this->Html->css('movies-myMovieIndex/place-title'); ?>
<?php echo $this->Html->css('movies-myMovieIndex/movie-list'); ?>
<?php echo $this->Html->css('movies-myMovieIndex/select-page-button-movie'); ?>
<?php echo $this->Html->css('movies-myMovieIndex/view-reccomend-movie-for-movie'); ?>
<?php echo $this->Html->css('movies-myMovieIndex/movie-serchResult'); ?>

<!-- Page Content -->
<div class="container">

  <!-- Related Projects Row -->
  <div class="row">

      <div class="col-lg-12">
          <h3 class="page-header">
            レポートした動画を管理する
          </h3>
      </div>

      <?php for ($i=0; $i < count($userMoviePostHistory); $i++) : ?>
        <?php if(isset($userMoviePostHistory[$i]['Restaurant']['image_url'])) : ?>

          <?php $tr_start = $i%4 ;?>
          <?php if($i === 0 || $tr_start === 0) : ?>
            <div class="row">
          <?php endif ; ?>

            <div class="col-sm-3 col-xs-6">
              <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $userMoviePostHistory[$i]['Movie']['id'])) ;?>" class="non-decorate">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title black"><?php echo $userMoviePostHistory[$i]['Restaurant']['name'] ;?></h3>
                  </div>
                  <div class="panel-body">
                    <img class="img-responsive portfolio-item rest_photo" src="<?php echo $userMoviePostHistory[$i]['Restaurant']['image_url'] ;?>" alt="photo">
                    <table class="table table-font">
                      <tr>
                        <td>レポーター名</td>
                        <td><?php echo $userMoviePostHistory[$i]['User']['UserProfile']['name'] ;?></td>
                      </tr>
                      <tr>
                        <td>動画のタイトル</td>
                        <td><?php echo $userMoviePostHistory[$i]['Movie']['title'] ; ?></td>
                      </tr>
                      <tr>
                        <td>動画の紹介</td>
                        <td><?php echo $userMoviePostHistory[$i]['Movie']['description'] ; ?></td>
                      </tr>
                      <tr>
                        <td>再生回数</td>
                        <td><?php echo $userMoviePostHistory[$i]['Movie']['count'] ; ?>回</td>
                      </tr>
                    </table>
                    <a class="btn btn-info btn-block" href="<?php echo $this->Html->url(array('controller' => 'Movies' , 'action' => 'edit', $userMoviePostHistory[$i]['Movie']['id'])); ?>">編集</a>
                    <?php echo $this->Form->create('Movie', array('type' => 'post' , 'action' => 'delete')); ?>
                    <?php echo $this->Form->input('Movie.id', array(
                        'label' => false,
                        'type' => 'hidden',
                        'value' => $userMoviePostHistory[$i]['Movie']['id'],
                    )); ?>
                    <button type="submit" class="btn btn-warning btn-block" style="margin-top:8px;">削除</button>
                    <?php echo $this->Form->end(); ?>
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
  <div class="pagination" style="margin-left:55px;">                         
    <ul>                                           
      <?php echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
      <?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?>                              
      <?php echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
    </ul>                                          
  </div>

</div>
<!-- /.container -->