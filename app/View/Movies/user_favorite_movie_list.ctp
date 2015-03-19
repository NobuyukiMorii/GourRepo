<?php echo $this->Html->css('bootstrap.min'); ?>
<?php echo $this->Html->css('view-userFavoriteMovieList/common-setting'); ?>
<?php echo $this->Html->css('view-userFavoriteMovieList/place-title.css'); ?>
<?php echo $this->Html->css('view-userFavoriteMovieList/movie-list.css'); ?>
<?php echo $this->Html->css('view-userFavoriteMovieList/select-page-button-movie.css'); ?>
<?php echo $this->Html->css('view-userFavoriteMovieList/view-reccomend-movie-for-movie.css'); ?>


<div class="container">

  	<!-- CONTENT ============-->
	<div class="row main-content">

	  	<!-- 動画とお店の詳細 ============-->
	  	<!-- ROW ============-->
	  	<div class="row">
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