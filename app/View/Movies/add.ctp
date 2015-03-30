<?php echo $this->Html->css('view-add/youtube');?>

<div class="row">
  <div class="post-sign-in" id="youtube-form">

      <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
          <span id="signinButton" class="pre-sign-in">
            <span
                class="g-signin"
                data-callback="oauth2Callback"
                data-clientid="399027015882-els58aji8ffi78a6c06sim69cfje855r.apps.googleusercontent.com"
                data-cookiepolicy="single_host_origin"
                data-scope="https://www.googleapis.com/auth/youtube.readonly https://www.googleapis.com/auth/youtube.upload">
            </span>
          </span>
        </div>
      </div>

    <?php echo $this->Form->create('Movie', array('class' => 'form-horizontal' , 'type' => 'post' , 'action' => 'edit' ,'id' => 'upload-form')); ?>

        <!-- input -->
      <div class="form-group" style="margin-top:50px;">
        <div class="col-md-8 col-md-offset-2">
          <h4>動画の情報を入力して下さい</h4>
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-2 control-label">タイトル</label>
        <div class="col-md-8">
          <?php echo $this->Form->input('Movie.title', array(
            'label' => false,
            'type' => 'text',
            'class' => 'form-control input-lg',
            'value' => '',
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
            'rows' => 10,
            'value' => '',
            'id' => 'description'
          )); ?>
          <?php echo $this->Form->error('Movie.description');?>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2 col-md-offset-2">
          <input id="file" type="file">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2 col-md-offset-2">
          <button type="submit" class="btn btn-default btn-lg" id="submit">アップロード</button>
        </div>
      </div>

    <?php echo $this->Form->end(); ?>

    <div class="form-group">
      <div class="col-md-8 col-md-offset-2">
        <div class="during-upload">
          <p><span id="percent-transferred"></span>% done (<span id="bytes-transferred"></span>/<span id="total-bytes"></span> bytes)</p>
          <progress id="upload-progress" max="1" value="0"></progress>
        </div>
      </div>
    </div>
  </div>


  <form action="/GourRepo/Movies/add/<?php if(isset($videoId)) {echo $videoId ;} ?>" method="post" accept-charset="utf-8">

    <input name="title" type="hidden" id="name_form" value="" />
    <input name="gournabi_id" type="hidden" value=<?php if(isset($gournabi_id)){ echo $gournabi_id; } ?> />
    <input name="description" type="hidden" id="description_form" value="" />
    <input name="youtube_url" type="hidden" id="videoId_form" value="" />
    <input name="thumbnails_url" type="hidden" id="thumbnailsUrl_form" value="" />

    <div class="form-group" id="tag">
      <label class="col-md-8 col-md-offset-2 control-label">タグをスペースで区切って入力して下さい。</label>
      <div class="col-md-8 col-md-offset-2">
        <input name="tag" type="text" value="" class="form-control input-lg" />
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <button type="submit" class="btn btn-default btn-lg" id="submit-botton">送信する</button>
      </div>
    </div>

  </form>

</div>

<?php echo $this->Html->script('jquery-1.11.2.min');?>

<?php echo $this->Html->script('youtube');?>