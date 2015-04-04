<?php echo $this->Html->css('users-profileedit/users-profileedit'); ?>

<!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">プロフィール
                <small>Profile</small>
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action'=>'dashbord')) ;?>" class="btn btn-default">ダッシュボード</a>
				<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action'=>'passwordedit')) ;?>" class="btn btn-default">パスワード変更</a>
				<a href="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'myMovieIndex')) ;?>" class="btn btn-default">投稿した動画を確認する</a>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">
    	<?php if(!empty($userSession['UserProfile']['avatar_file_name'])) : ?>
        	<div class="col-md-8">
            	<?php echo $this->upload->uploadImage($user['UserProfile'],'UserProfile.avatar',array('style'=>'original'),array('class' => 'dashbord_img')); ?>
 			<?php echo $this->Form->create('UserProfile', array('type' => 'file')); ?>
			<?php echo $this->Form->input('avatar', array('type' => 'file', 'label' => false)); ?>
			<button type="submit" class="btn btn-default">プロフィール画像を変更</button>
			<?php echo $this->Form->end(); ?>
        	</div>
        <?php endif ;?>

        <div class="col-md-4">
            <h3><?php echo $user['UserProfile']['name']; ?></h3>
            <?php echo $this->Form->create('UserProfile'); ?>
			<table class="table">
				<tr>
					<td>ユーザー名</td>
					<td>
						<?php echo $this->Form->input('UserProfile.name', array('value' => $user['UserProfile']['name'], 'label' => false, 'maxLength' => 50)); ?>
					</td>
				</tr>
				<tr>
					<td>メールアドレス</td>
					<td>
						<?php echo $this->Form->input('User.email', array('value' => $user['User']['email'], 'label' => false, 'maxLength' => 50)); ?>
					</td>
				</tr>
				<tr>
					<td>好きな食べ物</td>
					<td>
						<?php echo $this->Form->input('UserProfile.like_food', array('value' => $user['UserProfile']['like_food'], 'label' => false, 'maxLength' => 50)); ?>
					</td>
				</tr>
				<tr>
					<td>好きな食べ物</td>
					<td>
						<?php echo $this->Form->input('UserProfile.like_food', array('value' => $user['UserProfile']['like_genre'], 'label' => false, 'maxLength' => 50)); ?>
					</td>
				</tr>
				<tr>
					<td>好きな価格帯</td>
					<td>
						<?php echo $this->Form->input('UserProfile.like_genre', array('value' => $user['UserProfile']['like_price_zone'], 'label' => false, 'maxLength' => 50)); ?>
					</td>
				</tr>
				<tr>
					<td>最寄駅</td>
					<td>
						<?php echo $this->Form->input('UserProfile.near_station', array('value' => $user['UserProfile']['near_station'], 'label' => false, 'maxLength' => 50)); ?>
					</td>
				</tr>
				<tr>
					<td>住んでいる地域</td>
					<td>
						<?php echo $this->Form->input('UserProfile.living_area', array('value' => $user['UserProfile']['living_area'], 'label' => false, 'maxLength' => 50)); ?>
					</td>
				</tr>
				<tr>
					<td>自己紹介文</td>
					<td>
						<?php echo $this->Form->input('UserProfile.introduction', array('value' => $user['UserProfile']['introduction'], 'label' => false, 'type' => 'textarea', 'maxLength' => 1000)); ?>
					</td>
				</tr>
        	</table>
			<button type="submit" class="btn btn-default">プロフィールを変更</button>
			<?php echo $this->Form->end(); ?>
    </div>
    <!-- /.row -->


</div>
</div>
<!-- /.container -->