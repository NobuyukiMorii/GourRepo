<?php echo $this->Html->css('movies-reporterMovieList/movies-reporterMovieList'); ?>

<!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">レポーターのプロフィール
                <small>Reporter's Profile</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">
    	<?php if(!empty($userSession['UserProfile']['avatar_file_name'])) : ?>
        	<div class="col-md-8">
            	<?php echo $this->upload->uploadImage($user['UserProfile'],'UserProfile.avatar',array('style'=>'original'),array('class' => 'dashbord_img')); ?>
        	</div>
        <?php endif ;?>

        <div class="col-md-4">
            <h3><?php echo $user['UserProfile']['name']; ?></h3>
            <p><?php echo $user['UserProfile']['introduction']; ?></p>

      			<table class="table">
      				<tr>
      					<td>メールアドレス</td>
      					<td><?php echo $user['User']['email']; ?></td>
      				</tr>
      				<tr>
      					<td>好きな食べ物</td>
      					<td><?php echo $user['UserProfile']['like_food']; ?></td>
      				</tr>
      				<tr>
      					<td>好きな食べ物</td>
      					<td><?php echo $user['UserProfile']['like_genre']; ?></td>
      				</tr>
      				<tr>
      					<td>好きな価格帯</td>
      					<td><?php echo $user['UserProfile']['like_price_zone']; ?></td>
      				</tr>
      				<tr>
      					<td>最寄駅</td>
      					<td><?php echo $user['UserProfile']['near_station']; ?></td>
      				</tr>
      				<tr>
      					<td>住んでいる地域</td>
      					<td><?php echo $user['UserProfile']['living_area']; ?></td>
      				</tr>
            </table>

    </div>
    <!-- /.row -->
  <!-- Related Projects Row -->
  <div class="row">

      <div class="col-lg-12">
          <h3 class="page-header">
            レポートした動画
          </h3>
      </div>

      <?php for ($i=0; $i < count($movie); $i++) : ?>
        <?php if(isset($movie[$i]['Restaurant']['image_url'])) : ?>

          <?php $tr_start = $i%4 ;?>
          <?php if($i === 0 || $tr_start === 0) : ?>
            <div class="row">
          <?php endif ; ?>

            <div class="col-sm-3 col-xs-6">
              <a href="<?php echo $this->Html->url(array('controller' => 'movies' , 'action' => 'view' , $movie[$i]['Movie']['id'])) ;?>" class="non-decorate">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $movie[$i]['Restaurant']['name'] ;?></h3>
                  </div>
                  <div class="panel-body BGC">
                    <img class="img-responsive portfolio-item rest_photo" src="<?php echo $movie[$i]['Restaurant']['image_url'] ;?>" alt="photo">
                    <table class="table table-font">
                      <tr>
                        <td>レポーター名</td>
                        <td><?php echo $movie[$i]['User']['UserProfile']['name'] ;?></td>
                      </tr>
                      <tr>
                        <td>動画のタイトル</td>
                        <td><?php echo $movie[$i]['Movie']['title'] ; ?></td>
                      </tr>
                      <tr>
                        <td>動画の紹介</td>
                        <td><?php echo $movie[$i]['Movie']['description'] ; ?></td>
                      </tr>
                      <tr>
                        <td>再生回数</td>
                        <td><?php echo $movie[$i]['Movie']['count'] ; ?>回</td>
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
<!-- /.container -->