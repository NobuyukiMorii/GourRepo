<fieldset>
	<legend>ユーザープロフィール</legend>
	<div class="row">
		<div class="col-md-2">
			プロフィール画像	
		</div>
		<div class="col-md-10">
			<!-- ここの一文でサムネイルを表示している。第一引数でデータの入っている配列をしてしてあげている。 -->
			<?php echo $this->upload->uploadImage($user['UserProfile'],'UserProfile.avatar',array('style'=>'thumb')); ?>
 			<?php echo $this->Form->create('UserProfile', array('type' => 'file')); ?>
			<?php echo $this->Form->input('avatar', array('type' => 'file', 'label' => false)); ?>
<!-- 			<button type="submit" class="btn btn-default btn-lg">送信する</button> -->
			<?php echo $this->Form->end(__('変更/登録')); ?>
		</div>
	</div>
 			<?php echo $this->Form->create('UserProfile'); ?>
	<div class="row">
		<div class="col-md-2">
			名前
		</div>
		<div class="col-md-10">
			<!-- 第一引数はDBのフィールドと同じ名前にする。 -->
			<?php echo $this->Form->input('UserProfile.name', array('value' => $user['UserProfile']['name'], 'label' => false)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			メールアドレス
		</div>
		<div class="col-md-10">
			<?php echo $this->Form->input('User.email', array('value' => $user['User']['email'], 'label' => false)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			好きな食べ物
		</div>
		<div class="col-md-10">
			<?php echo $this->Form->input('UserProfile.like_food', array('value' => $user['UserProfile']['like_food'], 'label' => false)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			好きなジャンル
		</div>
		<div class="col-md-10">
			<?php echo $this->Form->input('UserProfile.like_genre', array('value' => $user['UserProfile']['like_genre'], 'label' => false)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			よく使う価格帯
		</div>
		<div class="col-md-10">
			<?php echo $this->Form->input('UserProfile.like_price_zone', array('value' => $user['UserProfile']['like_genre'], 'label' => false)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			最寄り駅
		</div>
		<div class="col-md-10">
			<?php echo $this->Form->input('UserProfile.near_station', array('value' => $user['UserProfile']['near_station'], 'label' => false)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			住んでいる地域
		</div>
		<div class="col-md-10">
			<?php echo $this->Form->input('UserProfile.living_area', array('value' => $user['UserProfile']['living_area'], 'label' => false)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			自己紹介文
		</div>
		<div class="col-md-10">
			<?php echo $this->Form->input('UserProfile.introduction', array('value' => $user['UserProfile']['introduction'], 'label' => false, 'type' => 'textarea')); ?>
		</div>
	</div>
			<?php echo $this->Form->end(__('変更')); ?>

</fieldset>