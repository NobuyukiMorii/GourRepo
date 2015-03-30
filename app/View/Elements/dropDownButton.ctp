<div class="col-md-6 header">
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
        <li><a href="<?php echo $this->html->url(array('controller' => 'Users' , 'action' => 'dashboard')) ;?>">ダッシュボード</a></li>
        <li><a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'myMovieIndex')) ;?>">投稿した動画を管理する</a></li>
        <li><a href="<?php echo $this->html->url(array('controller' => 'Users' , 'action' => 'logout')) ;?>">ログアウト</a></li>
      <?php endif; ?>
    </ul>
  </div>

  <?php endif ;?>
</div>