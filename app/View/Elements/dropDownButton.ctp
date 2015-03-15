<div class="col-md-6 header">
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
        <li><a href="<?php echo $this->html->url(array('controller' => 'Users' , 'action' => 'dashBoard')) ;?>">ダッシュボード</a></li>
        <li><a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'userFavoriteMovieList')) ;?>">お気に入りを確認する</a></li>
        <li><a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'userWatchMovieList')) ;?>">閲覧履歴を確認する</a></li>
        <li><a href="<?php echo $this->html->url(array('controller' => 'Users' , 'action' => 'logout')) ;?>">ログアウト</a></li>
      <?php endif; ?>
    </ul>
  </div>
</div>