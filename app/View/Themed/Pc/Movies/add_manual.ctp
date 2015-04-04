<?php echo $this->Html->css('movies-add/youtube');?>
<?php echo $this->Html->css('movies-add/movies-add');?>
<?php echo $this->Html->css('bootstrap');?>

<div class="row">
  <div id="youtube-form">

    <?php echo $this->Form->create('Movie', array('class' => 'form-horizontal' , 'type' => 'post' , 'action' => 'add' ,'id' => 'upload-form')); ?>

        <!-- input -->
      <div class="form-gray">

        <div class="form-group">
          <div class="col-md-8 col-md-offset-2">
            <h4>動画の情報を入力して下さい</h4>
          </div>
        </div>

        <?php echo $this->Form->input('Movie.manual', array(
          'label' => false,
          'type' => 'hidden',
          'value' => true,
          'id' => 'manual',
        )); ?>

        <input name="restaurant_id" type="hidden" value=<?php if(isset($restaurant_id)){ echo $restaurant_id; } ?> />

        <div class="form-group">
          <label class="col-md-2 control-label">タイトル</label>
          <div class="col-md-8">
            <?php echo $this->Form->input('Movie.title', array(
              'label' => false,
              'type' => 'text',
              'class' => 'form-control input-lg',
              'value' => '',
              'maxlength' => 50,
              'placeholder' => '1文字以上、50文字以下でご記入下さい',
              'id' => 'title'
            )); ?>
            <?php echo $this->Form->error('Movie.title');?>
          </div>
        </div>

        <!-- textarea -->
        <div class="form-group">
          <label class="col-md-2 control-label">紹介文</label>
          <div class="col-md-8">
            <?php echo $this->Form->input('Movie.description', array(
              'label' => false,
              'type' => 'textarea',
              'class' => 'form-control',
              'rows' => 5,
              'value' => '',
              'maxlength' => 200,
              'placeholder' => '1文字以上、200文字以下でご記入下さい',
              'id' => 'description'
            )); ?>
            <?php echo $this->Form->error('Movie.description');?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">YoutubeURL</label>
          <div class="col-md-8">
            <?php echo $this->Form->input('Movie.youtube_url', array(
              'label' => false,
              'type' => 'text',
              'class' => 'form-control input-lg',
              'value' => '',
              'id' => 'youtube_iframe_url'
            )); ?>
            <?php echo $this->Form->error('Movie.youtube_url');?>
            <p class="help-block">「https://www.youtube.com/watch?v=」で始まるYoutubeのurlを入力して下さい。</p>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label">紹介した料理</label>
          <div class="col-md-8">
            <?php echo $this->Form->input('Movie.tag', array(
              'label' => false,
              'type' => 'text',
              'class' => 'form-control input-lg',
              'value' => '',
              'id' => 'tag'
            )); ?>
            <?php echo $this->Form->error('Movie.tag');?>
            <p class="help-block">動画で紹介されている料理をスペースで区切って入力して下さい。</p>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-2 col-md-offset-2">
            <button type="submit" class="btn btn-default btn-lg" id="submit">アップロード</button>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-7 col-md-offset-5">
            <a class="btn btn-info btn-block" href="<?php echo $this->Html->url(array('controller' => 'Movies' , 'action' => 'add' , $restaurant_id)); ?>">ぐるれぽからYouTubeに投稿する</a>
          </div>
        </div>

      </div>

      <?php echo $this->Form->end(); ?>

  </div>

</div>

<?php echo $this->Html->script('jquery-1.11.2.min');?>