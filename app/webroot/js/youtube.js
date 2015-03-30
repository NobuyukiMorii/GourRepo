/*
Copyright 2013 Google Inc. All Rights Reserved.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/

(function() {
  var GOOGLE_PLUS_SCRIPT_URL = 'https://apis.google.com/js/client:plusone.js';
  var CHANNELS_SERVICE_URL = 'https://www.googleapis.com/youtube/v3/channels';
  var VIDEOS_UPLOAD_SERVICE_URL = 'https://www.googleapis.com/upload/youtube/v3/videos?uploadType=resumable&part=snippet';
  var VIDEOS_SERVICE_URL = 'https://www.googleapis.com/youtube/v3/videos';
  var INITIAL_STATUS_POLLING_INTERVAL_MS = 15 * 1000;

  var accessToken;
  console.log(accessToken);

  /*
  *自分で書いた
  */
  $("#tag").hide();
  $("#submit-botton").hide();
  /*
  *自分で書いた
  */

  window.oauth2Callback = function(authResult) {
    if (authResult['access_token']) {
      accessToken = authResult['access_token'];

      $.ajax({
        url: CHANNELS_SERVICE_URL,
        method: 'GET',
        headers: {
          Authorization: 'Bearer ' + accessToken
        },
        data: {
          part: 'snippet',
          mine: true
        }
      }).done(function(response) {
        $('.pre-sign-in').hide();
        $('.post-sign-in').show();
      });
    }
  };

  function initiateUpload(e) {
    e.preventDefault();

    var file = $('#file').get(0).files[0];
    if (file) {
      $('#submit').attr('disabled', true);

      var metadata = {
        snippet: {
          title: $('#title').val(),
          description: $('#description').val(),
          categoryId: 22
        }
      };

      $.ajax({
        url: VIDEOS_UPLOAD_SERVICE_URL,
        method: 'POST',
        contentType: 'application/json',
        headers: {
          Authorization: 'Bearer ' + accessToken,
          'x-upload-content-length': file.size,
          'x-upload-content-type': file.type
        },
        data: JSON.stringify(metadata)
      }).done(function(data, textStatus, jqXHR) {
        resumableUpload({
          url: jqXHR.getResponseHeader('Location'),
          file: file,
          start: 0
        });
      });
    }
  }

  function resumableUpload(options) {
    var ajax = $.ajax({
      url: options.url,
      method: 'PUT',
      contentType: options.file.type,
      headers: {
        'Content-Range': 'bytes ' + options.start + '-' + (options.file.size - 1) + '/' + options.file.size
      },
      xhr: function() {
        // Thanks to http://stackoverflow.com/a/8758614/385997
        var xhr = $.ajaxSettings.xhr();

        if (xhr.upload) {
          xhr.upload.addEventListener(
            'progress',
            function(e) {
              if(e.lengthComputable) {
                var bytesTransferred = e.loaded;
                var totalBytes = e.total;
                var percentage = Math.round(100 * bytesTransferred / totalBytes);

                $('#upload-progress').attr({
                  value: bytesTransferred,
                  max: totalBytes
                });

                $('#percent-transferred').text(percentage);
                $('#bytes-transferred').text(bytesTransferred);
                $('#total-bytes').text(totalBytes);

                $('.during-upload').show();
              }
            },
            false
          );
        }

        return xhr;
      },
      processData: false,
      data: options.file
    });

    ajax.done(function(response) {
      var videoId = response.id;
      /*
      *ここから自作
      */
      var title = response.snippet.title;
      var description = response.snippet.description;
      var thumbnailsUrl = response.snippet.thumbnails.default.url;
      console.log(title);
      console.log(description);
      console.log(thumbnailsUrl);

      $("#name_form").val(title);
      $("#description_form").val(description);
      $("#videoId_form").val(videoId);
      $("#thumbnailsUrl_form").val(thumbnailsUrl);

      $("#youtube-form").hide();
      $("#tag").show();
      $("#submit-botton").show();
      /*
      *ここまで自作
      */
      checkVideoStatus(videoId, INITIAL_STATUS_POLLING_INTERVAL_MS);
    });

    ajax.fail(function() {
      $('#submit').click(function() {
        alert('Not yet implemented!');
      });
      $('#submit').val('Resume Upload');
      $('#submit').attr('disabled', false);
    });
  }

  function checkVideoStatus(videoId, waitForNextPoll) {
    $.ajax({
      url: VIDEOS_SERVICE_URL,
      method: 'GET',
      headers: {
        Authorization: 'Bearer ' + accessToken
      },
      data: {
        part: 'status,processingDetails,player',
        id: videoId
      }
    }).done(function(response) {
      var processingStatus = response.items[0].processingDetails.processingStatus;
      var uploadStatus = response.items[0].status.uploadStatus;

      if (processingStatus == 'processing') {
        setTimeout(function() {
          checkVideoStatus(videoId, waitForNextPoll * 2);
        }, waitForNextPoll);
      } else {
        if (uploadStatus == 'processed') {

        }

      }
    });
  }

  $(function() {
    $.getScript(GOOGLE_PLUS_SCRIPT_URL);

    $('#upload-form').submit(initiateUpload);
  });
})();