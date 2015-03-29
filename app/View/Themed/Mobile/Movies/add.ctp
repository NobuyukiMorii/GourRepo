<?php echo $this->Html->css('movies-add/youtube');?>
<?php echo $this->Html->css('movies-add/movies-add');?>
<?php echo $this->Html->css('bootstrap');?>

<div class="col-xs-9 col-xs-offset-1">
    <span id="signinButton" class="pre-sign-in">
      Googleアカウントにログイン！
      <br>
      <span
          class="g-signin"
          data-callback="oauth2Callback"
          data-clientid="399027015882-els58aji8ffi78a6c06sim69cfje855r.apps.googleusercontent.com"
          data-cookiepolicy="single_host_origin"
          data-scope="https://www.googleapis.com/auth/youtube.readonly https://www.googleapis.com/auth/youtube.upload">
      </span>
    </span>
</div>


  <div class="post-sign-in" id="youtube-form">

    <?php echo $this->Form->create('Movie', array('type' => 'post' , 'action' => 'edit' ,'id' => 'upload-form')); ?>

        <!-- input -->
      <div class="form-gray">

          <div class="col-xs-12">
            <h4>動画の情報を入力して下さい</h4>
          </div>



          <label class="col-xs-12">タイトル</label>
          <div class="col-xs-12">
            <?php echo $this->Form->input('Movie.title', array(
              'label' => false,
              'type' => 'text',
              'class' => 'input-lg',
              'value' => '',
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
              'id' => 'description'
            )); ?>
            <?php echo $this->Form->error('Movie.description');?>
          </div>



          <div class="col-xs-12">
            <input id="file" type="file">
          </div>



          <div class="col-xs-12 margin">
            <button type="submit" class="btn btn-default btn-lg" id="submit">アップロード</button>
          </div>


      </div>

      <?php echo $this->Form->end(); ?>

    <div class="form-group">
      <div class="col-xs-12">
        <div class="during-upload">
          <p><span id="percent-transferred"></span>% done (<span id="bytes-transferred"></span>/<span id="total-bytes"></span> bytes)</p>
          <progress id="upload-progress" max="1" value="0"></progress>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12 margin-bottom">
        <a class="btn btn-info btn-block" href="<?php echo $this->Html->url(array('controller' => 'Movies' , 'action' => 'addManual', $restaurant_id)); ?>">既にYoutubeに登録されている動画を登録する</a>
      </div>
    </div>
  </div>

  <div>
    <form action="/GourRepo/Movies/add/<?php if(isset($videoId)) {echo $videoId ;} ?>" method="post" accept-charset="utf-8">

      <input name="title" type="hidden" id="name_form" value="" />
      <input name="restaurant_id" type="hidden" value=<?php if(isset($restaurant_id)){ echo $restaurant_id; } ?> />
      <input name="description" type="hidden" id="description_form" value="" />
      <input name="youtube_url" type="hidden" id="videoId_form" value="" />
      <input name="thumbnails_url" type="hidden" id="thumbnailsUrl_form" value="" />

      <div class="form-group" id="tag">
        <label class="col-xs-12">動画で紹介されている料理をスペースで区切って入力して下さい。</label>
        <div class="col-xs-12">
          <input name="tag" type="text" value="" class="input-lg" />
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-10">
          <button type="submit" class="btn btn-default btn-lg" id="submit-botton">送信する</button>
        </div>
      </div>

    </form>
  </div>



<?php echo $this->Html->script('jquery-1.11.2.min');?>

<?php echo $this->Html->script('youtube');?>