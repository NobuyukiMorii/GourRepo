<?php echo $this->Html->css('users-dashboard/users-dashboard'); ?>

<!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">プロフィール
                <small>Profile</small>
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action'=>'profileedit')) ;?>" class="btn btn-default">編集する</a>
				<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action'=>'passwordedit')) ;?>" class="btn btn-default">パスワード変更</a>
				<a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'myMovieIndex')) ;?>" class="btn btn-default">投稿した動画を確認する</a>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">
    	<?php if(!empty($userSession['UserProfile']['avatar_file_name'])) : ?>
        	<div class="col-xs-8">
            	<?php echo $this->upload->uploadImage($user['UserProfile'],'UserProfile.avatar',array('style'=>'original'),array('class' => 'dashbord_img')); ?>
        	</div>
        <?php endif ;?>

        <div class="col-xs-4">
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
            	お気に入りのお食事レポート
            	<a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'userFavoriteMovieList')) ;?>" class="btn btn-default">もっと見る</a>
            </h3>
        </div>

        <?php for ($i=0; $i < count($UserFavoriteMovieList); $i++) : ?>
        	<?php if(isset($UserFavoriteMovieList[$i]['Movie']['Restaurant']['image_url'])) : ?>
		        <div class="col-xs-3 col-xs-6">

		            <a href="<?php echo $this->Html->url(array('controller' => 'movies' , 'action' => 'view' , $UserFavoriteMovieList[$i]['Movie']['id'])) ;?>" class="no-decoration">
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><?php echo $UserFavoriteMovieList[$i]['Movie']['Restaurant']['name'] ;?></h3>
						  </div>
						  <div class="panel-body BCG">
		                	<img class="img-responsive portfolio-item rest_photo" src="<?php echo $UserFavoriteMovieList[$i]['Movie']['Restaurant']['image_url'] ;?>" alt="photo">
		                	<table class="table table-font">
								<tr>
									<td>レポーター名</td>
									<td><?php echo $UserFavoriteMovieList[$i]['Movie']['User']['UserProfile']['name'] ;?></td>
								</tr>
								<tr>
									<td>動画のタイトル</td>
									<td><?php echo $UserFavoriteMovieList[$i]['Movie']['title'] ; ?></td>
								</tr>
								<tr>
									<td>動画の紹介</td>
									<td><?php echo $UserFavoriteMovieList[$i]['Movie']['description'] ; ?></td>
								</tr>
								<tr>
									<td>再生回数</td>
									<td><?php echo $UserFavoriteMovieList[$i]['Movie']['count'] ; ?>回</td>
								</tr>
				        	</table>
						  </div>
						</div>
		            </a>
		        </div>
		    <?php endif ;?>
    	<?php endfor ; ?>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">
            	最近見たお食事レポート
            	<a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'userWatchMovieList')) ;?>" class="btn btn-default">もっと見る</a>
            </h3>
        </div>

        <?php for ($i=0; $i < count($UserWatchMovieList); $i++) : ?>
        	<?php if(isset($UserWatchMovieList[$i]['Movie']['Restaurant']['image_url'])) : ?>
		        <div class="col-xs-3 col-xs-6">
		            <a href="<?php echo $this->Html->url(array('controller' => 'movies' , 'action' => 'view' , $UserWatchMovieList[$i]['Movie']['id'])) ;?>" class="no-decoration">

						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><?php echo $UserWatchMovieList[$i]['Movie']['Restaurant']['name'] ;?></h3>
						  </div>
						  <div class="panel-body BCG">
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
		    <?php endif ;?>
    	<?php endfor ; ?>

    </div>
    <!-- /.row -->

</div>
</div>
<!-- /.container -->