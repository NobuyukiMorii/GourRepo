</br ></br >

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