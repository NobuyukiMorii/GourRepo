<?php echo $this->Html->css('movies-add/youtube');?>
<?php echo $this->Html->css('movies-add/movies-add');?>
<?php echo $this->Html->css('bootstrap');?>


  <div id="youtube-form">

    <?php echo $this->Form->create('Movie', array('type' => 'post' , 'action' => 'add' ,'id' => 'upload-form')); ?>

        <!-- input -->
      <div class="form-gray">

        
          <div class="col-xs-12">
            <h4>動画の情報を入力して下さい</h4>
          </div>


        <?php echo $this->Form->input('Movie.manual', array(
          'label' => false,
          'type' => 'hidden',
          'value' => true,
          'id' => 'manual',
        )); ?>

        <input name="restaurant_id" type="hidden" value=<?php if(isset($restaurant_id)){ echo $restaurant_id; } ?> />

        
          <label class="col-xs-12">タイトル</label>
          <div class="col-xs-12">
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


        <!-- textarea -->
        
          <label class="col-xs-12">紹介文</label>
          <div class="col-xs-12">
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


        
          <label class="col-xs-12">YoutubeURL</label>
          <div class="col-xs-12">
            <?php echo $this->Form->input('Movie.youtube_url', array(
              'label' => false,
              'type' => 'text',
              'class' => 'form-control input-lg',
              'value' => '',
              'id' => 'youtube_iframe_url',
              'placeholder' => "https://www.youtube.com/watch?v="
            )); ?>
            <?php echo $this->Form->error('Movie.youtube_url');?>
          </div>


        
          <label class="col-xs-12">紹介した料理（１品づつスペースで区切って入力）</label>
          <div class="col-xs-12">
            <?php echo $this->Form->input('Movie.tag', array(
              'label' => false,
              'type' => 'text',
              'class' => 'form-control input-lg',
              'value' => '',
              'id' => 'tag',
              'placeholder' => "シーフードドリア ペペロンチーノ"
            )); ?>
            <?php echo $this->Form->error('Movie.tag');?>
          </div>


        
          <div class="col-xs-12 margin2">
            <button type="submit" class="btn btn-default btn-lg" id="submit">アップロード</button>
          </div>


        
          <div class="col-xs-12">
            <a class="btn btn-info btn-block" href="<?php echo $this->Html->url(array('controller' => 'Movies' , 'action' => 'add' , $restaurant_id)); ?>">ぐるれぽからYouTubeに投稿する</a>
          </div>


      </div>

      <?php echo $this->Form->end(); ?>

  </div>

<?php echo $this->Html->script('jquery-1.11.2.min');?>