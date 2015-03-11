<?php echo $this->Html->css('view-add/youtube');?>
<span id="signinButton" class="pre-sign-in">
  <span
      class="g-signin"
      data-callback="oauth2Callback"
      data-clientid="399027015882-els58aji8ffi78a6c06sim69cfje855r.apps.googleusercontent.com"
      data-cookiepolicy="single_host_origin"
      data-scope="https://www.googleapis.com/auth/youtube.readonly https://www.googleapis.com/auth/youtube.upload">
  </span>
</span>

<div class="post-sign-in">
  <div>
    <img id="channel-thumbnail">
    <span id="channel-name"></span>
  </div>

  <form id="upload-form">
    <div>
      <label for="title">Title:</label>
      <input id="title" type="text" value="Default Title">
    </div>
    <div>
      <label for="description">Description:</label>
      <textarea id="description">Default description.</textarea>
    </div>
    <div>
      <input id="file" type="file">
    </div>
    <input id="submit" type="submit" value="Upload">
  </form>

  <div class="during-upload">
    <p><span id="percent-transferred"></span>% done (<span id="bytes-transferred"></span>/<span id="total-bytes"></span> bytes)</p>
    <progress id="upload-progress" max="1" value="0"></progress>
  </div>

  <div class="post-upload">
    <p>Uploaded video with id <span id="video-id"></span>. Polling for status...</p>
    <ul id="post-upload-status"></ul>
    <div id="player"></div>
  </div>
</div>

<form action="/GourRepo/Movies/add/
  <?php if(isset($videoId)) {
    echo $videoId ;
  } ?>
" method="post" accept-charset="utf-8">
<input name="name" type="hidden" id="name_form" value="" />
<input name="gournabi_id" type="hidden" value=<?php if(isset($gournabi_id)){ echo $gournabi_id; } ?> />
<input name="description" type="hidden" id="description_form" value="" />
<input name="videoId" type="hidden" id="videoId_form" value="" />
<input name="thumbnailsUrl" type="hidden" id="thumbnailsUrl_form" value="" />
<input type="submit" value="phpにフォームを送信" id="submit-botton" />
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<?php echo $this->Html->script('youtube');?>