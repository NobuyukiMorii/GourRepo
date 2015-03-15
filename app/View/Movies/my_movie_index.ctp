<?php echo $this->Html->css('bootstrap.min'); ?>
<?php pr($userMoviePostHistory); ?>

<div class="pagination">                         
  <ul>                                           
    <?php echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
    <?php echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>')); ?>                              
    <?php echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')); ?>
  </ul>                                          
</div>  
















<?php echo $this->Html->css('view-myMovieIndex/common-setting'); ?>
<?php echo $this->Html->css('view-myMovieIndex/place-title.css'); ?>
<?php echo $this->Html->css('view-myMovieIndex/movie-list.css'); ?>
<?php echo $this->Html->css('view-myMovieIndex/select-page-button-movie.css'); ?>
<?php echo $this->Html->css('view-myMovieIndex/view-reccomend-movie-for-movie.css'); ?>

<!--ビューにファイルをアップロードする-->


  <!-- CONTENT ============-->
  <div class="row main-content">

  	<!-- 動画とお店の詳細 ============-->
  	<!-- ROW ============-->
  	<div class="row">
	    <div class="col-md-7">
	      <div class="row">
	        <!-- 動画 ============-->
	        <table class="movie-list-table table table-striped">

	          <tr class="movie-list-tr">
	            <td class="movie-list-photo-td">
	              <a href ="/" class="movie-list-photo-a">
	                <img src="http://www.pawanavi.com/cms/wp-content/uploads/2012/12/PIZZERAPORCO020.jpg"  class="movie-list-photo">
	              </a>
	            </td>
	            <td class="movie-list-description-td" valign="top">
	              <div class="movie-list-description-div">
	                <a href="/" class="movie-list-description-title-ahref">
	                  <span class="movie-list-description-title">フォリオリーナ・デッラ</span><br>
	                </a>
	                <a href="/" class="movie-list-reporter-introduction-ahref">
	                  <span class="label label-default">最寄駅</span>&nbsp;<span class="black-text">六本木</span> &nbsp;&nbsp;
	                  <span class="label label-default">ジャンル</span>&nbsp;<span class="black-text">イタリアン</span> &nbsp;&nbsp;
	                  <span class="label label-default">料金</span>&nbsp;<span class="black-text">3500円</span> &nbsp;&nbsp;
	                  <br>
	                  <span class="movie-list-reporter-introduction">目黒で見つけた私のだーいすきなピザ！ダイエット中だったんだけど、１人で３枚も貪っちゃった！</span>
	                </a>  
	              </div>  
	            </td>
	          </tr>

	          <tr class="movie-list-tr">
	            <td class="movie-list-photo-td">
	              <a href ="/" class="movie-list-photo-a">
	                <img src="http://i.ytimg.com/vi/_KtY6kIhoPw/hqdefault.jpg"  class="movie-list-photo">
	              </a>
	            </td>
	            <td class="movie-list-description-td" valign="top">
	              <div class="movie-list-description-div">
	                <a href="/" class="movie-list-description-title-ahref">
	                  <span class="movie-list-description-title">フォリオリーナ・デッラ</span><br>
	                </a>
	                <a href="/" class="movie-list-reporter-introduction-ahref">
	                  <span class="label label-default">最寄駅</span>&nbsp;<span class="black-text">六本木</span> &nbsp;&nbsp;
	                  <span class="label label-default">ジャンル</span>&nbsp;<span class="black-text">イタリアン</span> &nbsp;&nbsp;
	                  <span class="label label-default">料金</span>&nbsp;<span class="black-text">3500円</span> &nbsp;&nbsp;
	                  <br>
	                  <span class="movie-list-reporter-introduction">目黒で見つけた私のだーいすきなピザ！ダイエット中だったんだけど、１人で３枚も貪っちゃった！</span>
	                </a>  
	              </div>  
	            </td>
	          </tr>

	          <tr class="movie-list-tr">
	            <td class="movie-list-photo-td">
	              <a href ="/" class="movie-list-photo-a">
	                <img src="http://up.gc-img.net/post_img/2013/02/4xc9W3XzxePnfGc_ZoEz8_45.jpeg"  class="movie-list-photo">
	              </a>
	            </td>
	            <td class="movie-list-description-td" valign="top">
	              <div class="movie-list-description-div">
	                <a href="/" class="movie-list-description-title-ahref">
	                  <span class="movie-list-description-title">フォリオリーナ・デッラ</span><br>
	                </a>
	                <a href="/" class="movie-list-reporter-introduction-ahref">
	                  <span class="label label-default">最寄駅</span>&nbsp;<span class="black-text">六本木</span> &nbsp;&nbsp;
	                  <span class="label label-default">ジャンル</span>&nbsp;<span class="black-text">イタリアン</span> &nbsp;&nbsp;
	                  <span class="label label-default">料金</span>&nbsp;<span class="black-text">3500円</span> &nbsp;&nbsp;
	                  <br>
	                  <span class="movie-list-reporter-introduction">目黒で見つけた私のだーいすきなピザ！ダイエット中だったんだけど、１人で３枚も貪っちゃった！</span>
	                </a>  
	              </div>  
	            </td>
	          </tr>

	          <tr class="movie-list-tr">
	            <td class="movie-list-photo-td">
	              <a href ="/" class="movie-list-photo-a">
	                <img src="http://www.paylessimages.jp/preview/af/pic14/af9920065049.jpg"  class="movie-list-photo">
	              </a>
	            </td>
	            <td class="movie-list-description-td" valign="top">
	              <div class="movie-list-description-div">
	                <a href="/" class="movie-list-description-title-ahref">
	                  <span class="movie-list-description-title">フォリオリーナ・デッラ</span><br>
	                </a>
	                <a href="/" class="movie-list-reporter-introduction-ahref">
	                  <span class="label label-default">最寄駅</span>&nbsp;<span class="black-text">六本木</span> &nbsp;&nbsp;
	                  <span class="label label-default">ジャンル</span>&nbsp;<span class="black-text">イタリアン</span> &nbsp;&nbsp;
	                  <span class="label label-default">料金</span>&nbsp;<span class="black-text">3500円</span> &nbsp;&nbsp;
	                  <br>
	                  <span class="movie-list-reporter-introduction">目黒で見つけた私のだーいすきなピザ！ダイエット中だったんだけど、１人で３枚も貪っちゃった！</span>
	                </a>  
	              </div>  
	            </td>
	          </tr>

	          <tr class="movie-list-tr">
	            <td class="movie-list-photo-td">
	              <a href ="/" class="movie-list-photo-a">
	                <img src="http://dengekionline.com/elem/000/000/185/185920/c20090811_osama_01_cs1w1_300x.jpg"  class="movie-list-photo">
	              </a>
	            </td>
	            <td class="movie-list-description-td" valign="top">
	              <div class="movie-list-description-div">
	                <a href="/" class="movie-list-description-title-ahref">
	                  <span class="movie-list-description-title">フォリオリーナ・デッラ</span><br>
	                </a>
	                <a href="/" class="movie-list-reporter-introduction-ahref">
	                  <span class="label label-default">最寄駅</span>&nbsp;<span class="black-text">六本木</span> &nbsp;&nbsp;
	                  <span class="label label-default">ジャンル</span>&nbsp;<span class="black-text">イタリアン</span> &nbsp;&nbsp;
	                  <span class="label label-default">料金</span>&nbsp;<span class="black-text">3500円</span> &nbsp;&nbsp;
	                  <br>
	                  <span class="movie-list-reporter-introduction">目黒で見つけた私のだーいすきなピザ！ダイエット中だったんだけど、１人で３枚も貪っちゃった！</span>
	                </a>  
	              </div>  
	            </td>
	          </tr>

	        </table>
	        <!-- /動画 ============-->
	      </div>
	    </div>
	    <!-- /動画とお店の詳細 ============-->
	</div>
	<!-- /ROW ============-->
 </div>
<!-- /CONTENT ============-->