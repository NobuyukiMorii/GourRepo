<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('view-userWatchMovieList/common-setting'); ?>
<?php echo $this->Html->css('view-userWatchMovieList/place-title.css'); ?>
<?php echo $this->Html->css('view-userWatchMovieList/movie-list.css'); ?>
<?php echo $this->Html->css('view-userWatchMovieList/select-page-button-movie.css'); ?>
<?php echo $this->Html->css('view-userWatchMovieList/view-reccomend-movie-for-movie.css'); ?>


<fieldset>
	<legend>ユーザープロフィール</legend>
	<div class="row">
		<div class="col-md-2">
			プロフィール画像	
		</div>
		<div class="col-md-10">
			<!-- ここの一文でサムネイルを表示している。第一引数でデータの入っている配列をしてしてあげている。 -->
			<?php echo $this->upload->uploadImage($user['UserProfile'],'UserProfile.avatar',array('style'=>'thumb')); ?>
<!--  			<?php echo $this->Form->create('UserProfile', array('type' => 'file')); ?>
			<?php echo $this->Form->input('avatar', array('type' => 'file', 'label'=> false)); ?>
			<?php echo $this->Form->end(__('変更/登録')); ?> -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			名前
		</div>
		<div class="col-md-10">
			<?php echo $user['UserProfile']['name']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			メールアドレス
		</div>
		<div class="col-md-10">
			<?php echo $user['User']['email']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			好きな食べ物
		</div>
		<div class="col-md-10">
			<?php echo $user['UserProfile']['like_food']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			好きなジャンル
		</div>
		<div class="col-md-10">
			<?php echo $user['UserProfile']['like_genre']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			よく使う価格帯
		</div>
		<div class="col-md-10">
			<?php echo $user['UserProfile']['like_price_zone']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			最寄り駅
		</div>
		<div class="col-md-10">
			<?php echo $user['UserProfile']['near_station']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			住んでいる地域
		</div>
		<div class="col-md-10">
			<?php echo $user['UserProfile']['living_area']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			自己紹介文
		</div>
		<div class="col-md-10">
			<?php echo $user['UserProfile']['introduction']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-10">
			<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action'=>'profileedit')) ;?>" class="btn btn-default">編集する</a>
			<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action'=>'passwordedit')) ;?>" class="btn btn-default">パスワード変更</a>
		</div>
	</div>

</fieldset>


<div class="container">

  	<!-- CONTENT ============-->
	<div class="row main-content">

	  	<!-- 動画とお店の詳細 ============-->
	  	<!-- ROW ============-->
	  	<div class="row">
		    <div class="col-md-4">
		      <div class="row">
		        <!-- 閲覧履歴動画 ============-->
		        <table class="movie-list-table table table-striped">

					<?php for ($i = 0; $i < count($UserWatchMovieList); ++$i): ?>
		          	<tr class="movie-list-tr">
			            <td class="movie-list-photo-td">
			              	<a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserWatchMovieList[$i]['Movie']['id'])) ;?>" class="movie-list-photo-a">
			                	<img src="<?php echo $UserWatchMovieList[$i]['Movie']['thumbnails_url'] ;?>"  class="movie-list-photo">
			              	</a>
			            </td>
			            <td class="movie-list-description-td" valign="top">
			              	<div class="movie-list-description-div">
				                <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserWatchMovieList[$i]['Movie']['id'])) ;?>" class="movie-list-description-title-ahref">
				                  <span class="movie-list-description-title">
				                  	<?php echo $UserWatchMovieList[$i]['Movie']['Restaurant']['name'] ;?>
				                  </span>
				                  <br>
				                </a>
				                <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserWatchMovieList[$i]['Movie']['id'])) ;?>" class="movie-list-reporter-introduction-ahref">
				                  	<span class="label label-default">最寄駅</span>&nbsp;<span class="black-text">
				                  		<?php echo $UserWatchMovieList[$i]['Movie']['Restaurant']['name'] ;?>
				              		</span> &nbsp;&nbsp;
				                  	<span class="label label-default">ジャンル</span>&nbsp;<span class="black-text">
				                  		<?php echo $UserWatchMovieList[$i]['Movie']['Restaurant']['category'] ;?>
				                  	</span> &nbsp;&nbsp;
				                  	<span class="label label-default">料金</span>&nbsp;<span class="black-text">
				                  		<?php echo $UserWatchMovieList[$i]['Movie']['Restaurant']['budget'] ;?>
				                  	</span> &nbsp;&nbsp;
				                  	<br>
				                  	<span class="movie-list-reporter-introduction">
				                  		<?php echo $UserWatchMovieList[$i]['Movie']['description'] ;?>
				                  	</span>
				                </a>  
			              	</div>  
			            </td>
		          	</tr>
		          	<?php endfor ;?>

		        </table>
		        <!-- /動画 ============-->
		      </div>
		    </div>
		    <!-- お気に入り動画 ============-->
			<div class="col-md-10">
		      <div class="row">
		        <!-- 動画 ============-->
		        <table class="movie-list-table table table-striped">

					<?php for ($i = 0; $i < count($UserFavoriteMovieList); ++$i): ?>
		          	<tr class="movie-list-tr">
			            <td class="movie-list-photo-td">
			              	<a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserFavoriteMovieList[$i]['Movie']['id'])) ;?>" class="movie-list-photo-a">
			                	<img src="<?php echo $UserFavoriteMovieList[$i]['Movie']['thumbnails_url'] ;?>"  class="movie-list-photo">
			              	</a>
			            </td>
			            <td class="movie-list-description-td" valign="top">
			              	<div class="movie-list-description-div">
				                <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserFavoriteMovieList[$i]['Movie']['id'])) ;?>" class="movie-list-description-title-ahref">
				                  <span class="movie-list-description-title">
				                  	<?php echo $UserFavoriteMovieList[$i]['Movie']['Restaurant']['name'] ;?>
				                  </span>
				                  <br>
				                </a>
				                <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $UserFavoriteMovieList[$i]['Movie']['id'])) ;?>" class="movie-list-reporter-introduction-ahref">
				                  	<span class="label label-default">最寄駅</span>&nbsp;<span class="black-text">
				                  		<?php echo $UserFavoriteMovieList[$i]['Movie']['Restaurant']['name'] ;?>
				              		</span> &nbsp;&nbsp;
				                  	<span class="label label-default">ジャンル</span>&nbsp;<span class="black-text">
				                  		<?php echo $UserFavoriteMovieList[$i]['Movie']['Restaurant']['category'] ;?>
				                  	</span> &nbsp;&nbsp;
				                  	<span class="label label-default">料金</span>&nbsp;<span class="black-text">
				                  		<?php echo $UserFavoriteMovieList[$i]['Movie']['Restaurant']['budget'] ;?>
				                  	</span> &nbsp;&nbsp;
				                  	<br>
					            	<?php for ($j = 0; $j < count($UserFavoriteMovieList[$i]['Movie']['TagRelation']); ++$j): ?>
					                  	<span class="label label-default">
					                  		<?php echo $UserFavoriteMovieList[$i]['Movie']['TagRelation'][$j]['Tag']['name'] ;?>
					                  	</span>&nbsp;
					            	<?php endfor ;?>
					            	<br>
				                  	<span class="movie-list-reporter-introduction">
				                  		<?php echo $UserFavoriteMovieList[$i]['Movie']['description'] ;?>
				                  	</span>
				                </a>  
			              	</div>  
			            </td>
			            <td>
			            	<?php echo $this->Form->create('UserFavoriteMovieLists', array('type' => 'post' , 'action' => 'delete')); ?>
					        <?php echo $this->Form->input('UserFavoriteMovieListsController.id', array(
					            'label' => false,
					            'type' => 'hidden',
					            'value' => $UserFavoriteMovieList[$i]['UserFavoriteMovieList']['id'],
					        )); ?>
					        <button type="submit" class="btn btn-warning">削除</button>
					        <?php echo $this->Form->end(); ?>
			            </td>
		          	</tr>
		          	<?php endfor ;?>

		        </table>

		        <!-- /動画 ============-->
		      </div>
		    </div>
		    <!-- マイムービー	 ============-->
		    <div class="col-md-4">
		      <div class="row">
		        <!-- 動画 ============-->
		        <table class="movie-list-table table table-striped">

					<?php for ($i = 0; $i < count($userMoviePostHistory); ++$i): ?>
		          	<tr class="movie-list-tr">
			            <td class="movie-list-photo-td">
			              	<a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $userMoviePostHistory[$i]['Movie']['id'])) ;?>" class="movie-list-photo-a">
			                	<img src="<?php echo $userMoviePostHistory[$i]['Movie']['thumbnails_url'] ;?>"  class="movie-list-photo">
			              	</a>
			            </td>
			            <td class="movie-list-description-td" valign="top">
			              	<div class="movie-list-description-div">
				                <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $userMoviePostHistory[$i]['Movie']['id'])) ;?>" class="movie-list-description-title-ahref">
				                  <span class="movie-list-description-title">
				                  	<?php echo $userMoviePostHistory[$i]['Restaurant']['name'] ;?>
				                  </span>
				                  <br>
				                </a>
				                <a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $userMoviePostHistory[$i]['Movie']['id'])) ;?>" class="movie-list-reporter-introduction-ahref">
				                  	<span class="label label-default">最寄駅</span>&nbsp;<span class="black-text">
				                  		<?php echo $userMoviePostHistory[$i]['Restaurant']['name'] ;?>
				              		</span> &nbsp;&nbsp;
				                  	<span class="label label-default">ジャンル</span>&nbsp;<span class="black-text">
				                  		<?php echo $userMoviePostHistory[$i]['Restaurant']['category'] ;?>
				                  	</span> &nbsp;&nbsp;
				                  	<span class="label label-default">料金</span>&nbsp;<span class="black-text">
				                  		<?php echo $userMoviePostHistory[$i]['Restaurant']['budget'] ;?>
				                  	</span> &nbsp;&nbsp;
				                  	<br>
					            	<?php for ($j = 0; $j < count($userMoviePostHistory[$i]['TagRelation']); ++$j): ?>
					                  	<span class="label label-default">
					                  		<?php echo $userMoviePostHistory[$i]['TagRelation'][$j]['Tag']['name'] ;?>
					                  	</span>&nbsp;
					            	<?php endfor ;?>
					            	<br>
				                  	<span class="movie-list-reporter-introduction">
				                  		<?php echo $userMoviePostHistory[$i]['Movie']['description'] ;?>
				                  	</span>
				                </a>  
			              	</div>  
			            </td>
			            <td>
			            	<a class="btn btn-info" href="<?php echo $this->Html->url(array('controller' => 'Movies' , 'action' => 'edit', $userMoviePostHistory[$i]['Movie']['id'])); ?>">
                    			編集
                    		</a>
			            </td>
			            <td>
			            	<?php echo $this->Form->create('Movie', array('type' => 'post' , 'action' => 'delete')); ?>
					        <?php echo $this->Form->input('Movie.id', array(
					            'label' => false,
					            'type' => 'hidden',
					            'value' => $userMoviePostHistory[$i]['Movie']['id'],
					        )); ?>
					        <button type="submit" class="btn btn-warning">送信</button>
					        <?php echo $this->Form->end(); ?>
			            </td>
		          	</tr>
		          	<?php endfor ;?>
		        </table>
		        <!-- /動画 ============-->
		      </div>
		    </div>
		    <!-- /動画とお店の詳細 ============-->
		</div>
		<!-- /ROW ============-->
	</div>
	<!-- /CONTENT ============-->

	<div class="pagination" style="margin-left:20px;">                         
	  <ul>                                           
	    <?php echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
	    <?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?>                              
	    <?php echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
	  </ul>                                          
	</div>

</div>