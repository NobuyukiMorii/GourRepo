<?php echo $this->Html->css('view-serchResult/common-setting'); ?>
<?php echo $this->Html->css('view-serchResult/place-title.css'); ?>
<?php echo $this->Html->css('view-serchResult/movie-list.css'); ?>
<?php echo $this->Html->css('view-serchResult/select-page-button-movie.css'); ?>
<?php echo $this->Html->css('view-serchResult/view-reccomend-movie-for-movie.css'); ?>

<!--ビューにファイルをアップロードする-->


  <!-- CONTENT ============-->
  <div class="row main-content">

    <!-- お店の概要 ============-->
    <div class="row">
      <div class="col-md-7 view-header-place-name-div bg-color">
      </div>

    </div>
  <!-- /お店の概要 ============-->

<?php pr($results) ; ?>
  <!-- 動画とお店の詳細 ============-->
  <div class="row">
    <div class="col-md-7">
      <div class="row">
        <!-- 動画 ============-->
        <table class="movie-list-table table table-striped">
          <?php for ($i = 0; $i < count($results); ++$i): ?>
          <tr class="movie-list-tr">
            <td class="movie-list-photo-td">
              <a href ="<?php echo $this->html->url(array('controller' => 'Movies' , 'action' => 'view' , $results[$i]['Movie']['id'])) ;?>" class="movie-list-photo-a">
                <img src="<?php echo $results[$i]['Movie']['thumbnails_url'] ;?>"  class="movie-list-photo">
              </a>
            </td>
            <td class="movie-list-description-td" valign="top">
              <div class="movie-list-description-div">
                <a href="/" class="movie-list-description-title-ahref">
                  <span class="movie-list-description-title">フォリオリーナ・デッラ</span><br>
                </a>
                <a href="/" class="movie-list-reporter-introduction-ahref">
                  <span class="label label-default">最寄駅</span>&nbsp;<span class="black-text"><?php echo $results[$i]['Restaurant']['access_station'] ;?></span> &nbsp;&nbsp;
                  <span class="label label-default">ジャンル</span>&nbsp;<span class="black-text"><?php echo $results[$i]['Restaurant']['category'] ;?></span> &nbsp;&nbsp;
                  <span class="label label-default">料金</span>&nbsp;<span class="black-text"><?php echo $results[$i]['Restaurant']['budget'] ;?>円</span> &nbsp;&nbsp;
                  <br>
                  <span class="movie-list-reporter-introduction"><?php echo $results[$i]['Movie']['description'] ;?></span>
                </a>  
              </div>  
            </td>
          </tr>
          <?php endfor ; ?>

        </table>
        <!-- /動画 ============-->
      </div>
    </div>
    <!-- /動画とお店の詳細 ============-->

      <!-- その他のお店のレコメンド ============-->
      <div class="col-md-4 recommend-movie-sidebar">

        <div class="recommend">
          おすすめのお店
        </div>

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
                  <span class="reccomend-movie-place-name text-bold">パンチョ</span>
                  <span class="reccomend-movie-genre">（イタリアン </span>
                  <span class="reccomend-movie-station"> 秋葉原)</span><br>
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
                  <span class="reccomend-movie-place-name text-bold">パティスリー・ラブリコチエ（Patisserie l’abricotier）</span>
                  <span class="reccomend-movie-genre">（スイーツ </span>
                  <span class="reccomend-movie-station"> 高円寺)</span><br>
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
                  <span class="reccomend-movie-place-name text-bold">林屋</span>
                  <span class="reccomend-movie-genre">（寿司 </span>
                  <span class="reccomend-movie-station"> 淡路島)</span><br>
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
                  <span class="reccomend-movie-place-name text-bold">WORLD SUSHI DINING BAR 粋</span>
                  <span class="reccomend-movie-genre">（寿司 </span>
                  <span class="reccomend-movie-station"> 福岡)</span><br>
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
                  <span class="reccomend-movie-place-name text-bold">マル壱そば</span>
                  <span class="reccomend-movie-genre">（ラーメン </span>
                  <span class="reccomend-movie-station"> 沖縄)</span><br>
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
                  <span class="reccomend-movie-place-name text-bold">お食事処塩田</span>
                  <span class="reccomend-movie-genre">（ラーメン </span>
                  <span class="reccomend-movie-station"> 宮城県気仙沼市)</span><br>
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