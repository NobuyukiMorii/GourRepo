  <?php echo $this->Html->css('view-view/common-setting'); ?>
  <?php echo $this->Html->css('view-view/place-title.css'); ?>
  <?php echo $this->Html->css('view-view/main-movie.css'); ?>
  <?php echo $this->Html->css('view-view/main-movie-description.css'); ?>
  <?php echo $this->Html->css('view-view/select-page-button-main.css'); ?>
  <?php echo $this->Html->css('view-view/fundamental-place-info.css'); ?>
  <?php echo $this->Html->css('view-view/view-reccomend-movie-for-main.css'); ?>



  <!-- CONTENT ============-->
  <div class="row main-content">

      <!-- お店の概要 ============-->
    <div class="row">
      <div class="col-md-8 view-header-place-name-div">
          <span class="view-header-place-name">
            フォリオリーナ・デッラ・ポルタ・フォルトゥーナ （Fogliolina della Porta Fortuna）
          </span>
          <div class="view-header-label-div">
            <div class="col-md-9">
              <span class="label label-default">エリア</span> 東京都目黒区
              &nbsp;&nbsp;
              <span class="label label-default">ジャンル</span> イタリアン
              &nbsp;&nbsp;
              <?php echo $this->Html->image('day.png', array('alt' => 'Day' , 'class' => 'view-header-day-image')); ?>
              ￥20,000～￥29,999
              &nbsp;&nbsp;
              <span class="label label-default">定休日</span> 木曜日
            </div>
        </div>
      </div>

      <div class="col-md-3 view-header-place-tel-number-div">
        <div class="row">
          <?php echo $this->Html->image('phone.png', array('alt' => 'Day' , 'class' => 'header-phone-image')); ?>
          <span class="view-header-place-tel-number">
            0267-41-0612
          </span>
          <a href="<?php echo $this->html->url(array('controller' => 'UserFavoriteMovieLists' , 'action' => 'add', 1)) ;?>" class="header-favorite-image-ahref">
            <?php echo $this->Html->image('star.png', array('alt' => 'Favorite' , 'class' => 'header-favorite-image')); ?>
          </a>
          <a href="<?php echo $this->html->url(array('controller' => 'UserFavoriteMovieLists' , 'action' => 'add' , 1)) ;?>" class="view-header-favorite-text">
            favorite
          </a>
        </div>
      </div>
  </div>
  <!-- /お店の概要 ============-->

  <!-- 動画とお店の詳細 ============-->
  <div class="row">
    <div class="col-md-8">
      <div class="row">
        <!-- 動画 ============-->
        <div class="movie-div">
          <iframe src="https://www.youtube.com/embed/xjam_iydg3g" frameborder="0" class="movie"></iframe>
          <div class="movie-detail-div">
            <div class="col-md-1 movie-reporter-photo-div">
              <?php echo $this->Html->image('AsukaMoko.jpeg', array('alt' => 'Day' , 'class' => 'movie-reporter-photo img-circle')); ?>
            </div>
            <div class="col-md-9">
              <span class="movie-name">明日川もこのぐるめレポーター</span><br>
              <div class="movie-description">
                目黒ので話題のフォリオリーナ・デッラ・ポルタ・フォルトゥーナ （Fogliolina della Porta Fortuna）でお食事レポートしてきましたー！是非みて下さい！
              </div>
            </div>
          </div>
        </div>
        <!-- /動画 ============-->

        <!-- お店基本情報 ============-->
        <div class="col-md-12 info-detail">
          <div class="info-title-first-div">
            <span class="info-title-first-text">お店の基本情報</span>
          </div>
          <table class="table table table-bordered fundamental-info-table">
            <tr>
              <td class="table-heading">店名</td>
              <td>
                <span class="text-bold">
                  フォリオリーナ・デッラ・ポルタ・フォルトゥーナ （Fogliolina della Porta Fortuna）
                </span>
              </td>
            </tr>
            <tr>
              <td class="table-heading">ジャンル</td>
              <td>イタリアン</td>
            </tr>
            <tr>
              <td class="table-heading">TEL・予約</td>
              <td>
                <span class="tel-number">0267-41-0612</span><br>
                <span class="tel-note-of-caution">※お問い合わせの際は「ぐるれぽを見た」とお伝えいただければ幸いです。</span>
              </td>
            </tr>
            <tr>
              <td class="table-heading">住所</td>
              <td>東京都目黒区中目黒4-8-12
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1621.3335340152405!2d139.70562899999996!3d35.63593329999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b3b719b3529%3A0x89f752a000ad1b72!2z44CSMTUzLTAwNjEg5p2x5Lqs6YO955uu6buS5Yy65Lit55uu6buS77yU5LiB55uu77yY4oiS77yR77yS!5e0!3m2!1sja!2sjp!4v1425097991270" frameborder="0" class="map"></iframe>
              </td>
            </tr>
            <tr>
              <td class="table-heading">営業時間</td>
              <td>
                1日1組限定<br>
                12時から21時の間で開始<br>
                7月上旬から８月末はトラットリアアルベリーニとして営業。<br>
                アルベリーニの場合は、ランチタイムとディナータイムに分かれる。<br>
                2014のアルベリーニは7月11日～9月5日まで（水曜定休）<br>
                日曜営業<br>
              </td>
            </tr>
            <tr>
              <td class="table-heading">定休日</td>
              <td>
                不定休<br>
                7月、8月は屋根のないトラットリア「アルベリーニ」として営業。<br>
                9月からフォリオリーナ・デッラ・ポルタ・フォルトゥーナとしての営業再開予定。
              </td>
            </tr>
            <tr>
              <td class="table-heading">予算（ユーザーより）</td>
              <td>
                <?php echo $this->Html->image('day.png', array('alt' => 'Day' , 'class' => 'day-image')); ?>
                ￥20,000～￥29,999
                <?php echo $this->Html->image('night.png', array('alt' => 'Night' , 'class' => 'night-image')); ?>
                ￥20,000～￥29,999
              </td>
            </tr>
            <tr>
              <td class="table-heading">カード</td>
              <td>
                <span class="text-bold">可</span> (VISA、JCB、AMEX、MASTER）
              </td>
            </tr>
          </table>
          <div class="info-title-second-div">
            <span class="info-title-second-text">席・設備</span>
          </div>
          <table class="table table table-bordered fundamental-info-table">
            <tr>
              <td class="table-heading">席数</td>
              <td><span class="text-bold">6席</span> 
                （夏（7～8月）は屋根のないレストランとして芝生の庭とテラスを使って最大二十数席)</td>
            </tr>
            <tr>
              <td class="table-heading">個室</td>
              <td>
                <span class="text-bold">あり</span><br> 
                4人可、6人可 （4～6人の一部屋のみ）
              </td>
            </tr>
            <tr>
              <td class="table-heading">禁煙・喫煙</td>
              <td>
                <span class="text-bold">完全喫煙</span><br> 
              </td>
            </tr>
            <tr>
              <td class="table-heading">駐車場</td>
              <td>
                <span class="text-bold">有</span>（3台）<br> 
              </td>
            </tr>
            <tr>
              <td class="table-heading">空間・設備</td>
              <td>
                オシャレな空間、落ち着いた空間、オープンテラスあり
              </td>
            </tr>
            <tr>
              <td class="table-heading">携帯電話</td>
              <td>
                docomo、SoftBank、au、Y!mobile
              </td>
            </tr>
          </table>
        </div>
        <!-- お店基本情報 ============-->
      </div>
    </div>
    <!-- /動画とお店の詳細 ============-->

      <!-- その他のお店のレコメンド ============-->
      <div class="col-md-4 recommend-movie-sidebar">

        <table class="reccomend-movie-table">
          <tr class="tr-for-reccomend-movie">
            <td class="reccomend-movie-photo-td">
              <a href ="/">
                <img src="https://i.ytimg.com/vi/L6PujWVBmRo/default.jpg"  class="reccomend-movie-photo">
              </a>
            </td>
            <td class="recommend-movie-detail-td" valign="top">
              <div class="reccomend-movie-name-div">
                <a href="/" class="a-href-for-reccomend-movie-place-name">
<!--                   <span class="reccomend-movie-place-name text-bold">パンチョ</span>
                  <span class="reccomend-movie-genre">（イタリアン </span>
                  <span class="reccomend-movie-station"> 秋葉原)</span><br> -->
                </a>
                <a href="/" class="a_href_for_reccomend-movie-td">
                  <span class="reccomend-movie-name text-bold">【大食い】情熱の大食漢 第１回 秋葉原「パンチョ」 ミートソース２．３㎏ ２０１４ ＳＱダイアリー</span><br>
                </a>
              </div>    
            </td>
          </tr>

          <tr class="between-reccomend-movie-tr"></tr>

          <tr class="tr-for-reccomend-movie">
            <td class="reccomend-movie-photo-td">
              <a href ="/">
                <img src="https://i.ytimg.com/vi/WAmiSoklrbY/default.jpg"  class="reccomend-movie-photo">
              </a>
            </td>
            <td class="recommend-movie-detail-td" valign="top">
              <div class="reccomend-movie-name-div">
                <a href="/" class="a-href-for-reccomend-movie-place-name">
<!--                   <span class="reccomend-movie-place-name text-bold">パティスリー・ラブリコチエ（Patisserie l’abricotier）</span>
                  <span class="reccomend-movie-genre">（スイーツ </span>
                  <span class="reccomend-movie-station"> 高円寺)</span><br> -->
                </a>
                <a href="/" class="a_href_for_reccomend-movie-td">
                  <span class="reccomend-movie-name text-bold">アイドル加藤未来のグルメリポート</span><br>
                </a>
              </div>    
            </td>
          </tr>

          <tr class="between-reccomend-movie-tr"></tr>

          <tr class="tr-for-reccomend-movie">
            <td class="reccomend-movie-photo-td">
              <a href ="/">
                <img src="https://i.ytimg.com/vi/cVAPlrCX1KM/mqdefault.jpg"  class="reccomend-movie-photo">
              </a>
            </td>
            <td class="recommend-movie-detail-td" valign="top">
              <div class="reccomend-movie-name-div">
                <a href="/" class="a-href-for-reccomend-movie-place-name">
<!--                   <span class="reccomend-movie-place-name text-bold">林屋</span>
                  <span class="reccomend-movie-genre">（寿司 </span>
                  <span class="reccomend-movie-station"> 淡路島)</span><br> -->
                </a>
                <a href="/" class="a_href_for_reccomend-movie-td">
                  <span class="reccomend-movie-name text-bold">山田菜々のぽんこつグルメレポート</span><br>
                </a>
              </div>    
            </td>
          </tr>

          <tr class="between-reccomend-movie-tr"></tr>

          <tr class="tr-for-reccomend-movie">
            <td class="reccomend-movie-photo-td">
              <a href ="/">
                <img src="https://i.ytimg.com/vi_webp/31eHmMs5uCQ/mqdefault.webp"  class="reccomend-movie-photo">
              </a>
            </td>
            <td class="recommend-movie-detail-td" valign="top">
              <div class="reccomend-movie-name-div">
                <a href="/" class="a-href-for-reccomend-movie-place-name">
<!--                   <span class="reccomend-movie-place-name text-bold">WORLD SUSHI DINING BAR 粋</span>
                  <span class="reccomend-movie-genre">（寿司 </span>
                  <span class="reccomend-movie-station"> 福岡)</span><br> -->
                </a>
                <a href="/" class="a_href_for_reccomend-movie-td">
                  <span class="reccomend-movie-name text-bold">HKT48 田島芽瑠のグルメレポート</span><br>
                </a>
              </div>    
            </td>
          </tr>

          <tr class="between-reccomend-movie-tr"></tr>

          <tr class="tr-for-reccomend-movie">
            <td class="reccomend-movie-photo-td">
              <a href ="/">
                <img src="https://i.ytimg.com/vi/apmRAbKVnV0/mqdefault.jpg"  class="reccomend-movie-photo">
              </a>
            </td>
            <td class="recommend-movie-detail-td" valign="top">
              <div class="reccomend-movie-name-div">
                <a href="/" class="a-href-for-reccomend-movie-place-name">
<!--                   <span class="reccomend-movie-place-name text-bold">マル壱そば</span>
                  <span class="reccomend-movie-genre">（ラーメン </span>
                  <span class="reccomend-movie-station"> 沖縄)</span><br> -->
                </a>
                <a href="/" class="a_href_for_reccomend-movie-td">
                  <span class="reccomend-movie-name text-bold">やまもとなおこのツアー グルメレポート沖縄編！</span><br>
                </a>
              </div>    
            </td>
          </tr>

          <tr class="between-reccomend-movie-tr"></tr>

          <tr class="tr-for-reccomend-movie">
            <td class="reccomend-movie-photo-td">
              <a href ="/">
                <img src="https://i.ytimg.com/vi_webp/zRDqmN77CO4/mqdefault.webp"  class="reccomend-movie-photo">
              </a>
            </td>
            <td class="recommend-movie-detail-td" valign="top">
              <div class="reccomend-movie-name-div">
                <a href="/" class="a-href-for-reccomend-movie-place-name">
<!--                   <span class="reccomend-movie-place-name text-bold">お食事処塩田</span>
                  <span class="reccomend-movie-genre">（ラーメン </span>
                  <span class="reccomend-movie-station"> 宮城県気仙沼市)</span><br> -->
                </a>
                <a href="/" class="a_href_for_reccomend-movie-td">
                  <span class="reccomend-movie-name text-bold">リアルタイム東北レポート25〜グルメレポート編〜＜お食事処塩田＞さん</span><br>
                </a>
              </div>    
            </td>
          </tr>

        </table>
      </div>
    </div>

  </div>
<!-- /CONTENT ============-->