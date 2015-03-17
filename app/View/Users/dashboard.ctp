</br ></br >

<fieldset>
	<legend>ユーザープロフィール</legend>
	<div class="row">
		<div class="col-md-2">
			プロフィール画像	
		</div>
		<div class="col-md-10">
			<?php echo $this->Form->create('User', array('type' => 'file')); ?>
			<?php echo $this->Form->input('avatar', array('type' => 'file', 'label'=> false)); ?>
			<button type="submit" class="btn btn-default btn-lg">送信する</button>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			名前
		</div>
		<div class="col-md-10">
			<?php echo $dashboard['0']['UserProfile']['name']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			メールアドレス
		</div>
		<div class="col-md-10">
			<?php echo $dashboard['0']['User']['email']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			好きな食べ物
		</div>
		<div class="col-md-10">
			<?php echo $dashboard['0']['UserProfile']['like_food']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			好きなジャンル
		</div>
		<div class="col-md-10">
			<?php echo $dashboard['0']['UserProfile']['like_genre']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			よく使う価格帯
		</div>
		<div class="col-md-10">
			<?php echo $dashboard['0']['UserProfile']['like_price_zone']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			最寄り駅
		</div>
		<div class="col-md-10">
			<?php echo $dashboard['0']['UserProfile']['near_station']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			住んでいる地域
		</div>
		<div class="col-md-10">
			<?php echo $dashboard['0']['UserProfile']['living_area']; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			自己紹介文
		</div>
		<div class="col-md-10">
			<?php echo $dashboard['0']['UserProfile']['introduction']; ?>
		</div>
	</div>
</fieldset>