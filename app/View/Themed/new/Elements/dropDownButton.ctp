<div class="col-md-6 header">
  <?php if($this->action !== 'addManual') : ?>
  <?php if($this->action !== 'add') : ?>

  <div class="btn-group header-drop-button">
    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    <span class="glyphicon glyphicon-align-justify"></span> <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <?php if(empty($userSession)) : ?>
        <li><a href="<?php echo $this->html->url(array('controller' => 'Users' , 'action' => 'signup')) ;?>">アカウントを作成</a></li>
        <li><a href="<?php echo $this->html->url(array('controller' => 'Users' , 'action' => 'login')) ;?>">ログイン</a></li>
      <?php endif; ?>

      <li class="divider"></li>
      <?php if(!empty($userSession)) : ?>
        <?php if($this->action !== 'dashboard') : ?>
          <li><a href="<?php echo $this->html->url(array('controller' => 'Users' , 'action' => 'dashboard')) ;?>">ダッシュボード</a></li>
        <?php endif ;?>

        <?php if($this->action !== 'myMovieIndex') : ?>
          <li><a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'myMovieIndex')) ;?>">レポートした動画を管理する</a></li>
        <?php endif ;?>

        <?php if($this->action !== 'userFavoriteMovieList') : ?>
          <li><a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'userFavoriteMovieList')) ;?>">お気に入りのレポート</a></li>
        <?php endif ;?>

        <?php if($this->action !== 'userWatchMovieList') : ?>
          <li><a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'userWatchMovieList')) ;?>">閲覧履歴を確認する</a></li>
        <?php endif ;?>

        <li><a href="<?php echo $this->html->url(array('controller' => 'Users' , 'action' => 'logout')) ;?>">ログアウト</a></li>
      <?php endif; ?>
    </ul>
  </div>
  <?php endif ;?>
  <?php endif ;?>
</div>