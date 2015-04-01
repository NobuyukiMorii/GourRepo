<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>GourRepo</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php echo $this->Html->meta('icon'); ?>
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('landing_page/landing_page'); ?>
    <?php echo $this->Html->css('landing_page/bootstrap-theme'); ?>
    <?php echo $this->Html->css('landing_page/default'); ?>
    <?php echo $this->Html->css('landing_page/fancybox'); ?>
    <?php echo $this->Html->css('landing_page/isotope'); ?>
    <?php echo $this->Html->css('landing_page/style'); ?>
    <?php echo $this->Html->css('landing_page/original'); ?>
    <?php echo $this->Html->css('landing_page/agency'); ?>
  </head>
  <body>

  <!-- メインのムービ＾ -->
  <div class="header_img">
      <div class="youtube_bg">
      	<iframe width="560" height="315" src="//www.youtube.com/embed/uFF0zThw7P4?rel=0&showinfo=0&autoplay=1&loop=1&playlist=uFF0zThw7P4&controls=0&modestbranding=1"  allowfullscreen></iframe>
      </div>
      <p>
          <span class="top_header_catch01"><a href="<?php  echo $this->Html->url(array('cnotroller' => 'Movies' , 'action' => 'index')) ;?>" class="acolor">ぐるれぽ</a></span>
          <span class="top_header_catch02">お食事動画の<br />グルメサービス</span>
      </p>
  </div>

<section id="header" class="appear"></section>


    <section class="featured">
      <div class="container"> 
        <div class="row mar-bot40">
          <div class="col-md-8 col-md-offset-2">
            
            <div class="align-center">
              <i class="fa fa-flask fa-5x mar-bot20"></i>
              <a href="<?php  echo $this->Html->url(array('cnotroller' => 'Movies' , 'action' => 'index')) ;?>">
                <?php echo $this->Html->image('GourRepo.png', array('alt' => 'GourRepo Logo' , 'class' => 'logo')); ?>
              </a>
              <h2 class="slogan">行きたいお店がもっと良く分かる</h2>
              <h2 class="slogan">動画のグルメレポートサービス</h2>  
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- services -->
    <section id="section-services" class="section pad-bot30 bg-white">
    <div class="container"> 
    
      <div class="row mar-bot40">
        <div class="col-lg-4" >
          <div class="align-center">
            <i class="fa fa-code fa-5x mar-bot20"></i>
            <h4 class="text-bold">お店の雰囲気がよくわかる</h4>
            <p>店内に広がる笑い声、店員さんの笑顔、できたての料理から湧き上がる湯気など、お食事レポーターがお店の雰囲気をより正しくお伝えします。
            </p>
          </div>
        </div>
          
        <div class="col-lg-4" >
          <div class="align-center">
            <i class="fa fa-terminal fa-5x mar-bot20"></i>
            <h4 class="text-bold">簡単に投稿できる</h4>
            <p>ぐるれぽはYoutubeと連携しているので、あなたのお食事動画を簡単に投稿することが出来ます。
            </p>
          </div>
        </div>
      
        <div class="col-lg-4" >
          <div class="align-center">
            <i class="fa fa-bolt fa-5x mar-bot20"></i>
            <h4 class="text-bold">お店探しが楽しくなる</h4>
            <p>可愛く、コミカルで、美味しそうに食べるお食事レポーターの動画で、あなたのお店探しがもっと楽しくなります。
            </p>
          </div>
        </div>
      
      </div>  

    </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">おすすめのお食事レポートについて</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="https://i.ytimg.com/vi/s5rnMPwozlM/hqdefault.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Round Icons</h4>
                        <p class="text-muted">Graphic Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="http://i.ytimg.com/vi/_NfGEJqTljo/hqdefault.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Startup Framework</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="http://i.ytimg.com/vi/uFF0zThw7P4/hqdefault.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Treehouse</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading2">メンバーについて</h2>
                </div>
            </div>
            <div class="row" style="margin-top:5%;">
              <div class="col-sm-6">
                  <div class="team-member">
                      <?php echo $this->Html->image('member/mory.jpg' , array('class' => 'img-responsive img-circle img-size')); ?>
                      <h4>森井 宣至</h4>
                      <p class="text-muted">Lead programmer</p>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="team-member">
                      <?php echo $this->Html->image('member/taishi.jpg' , array('class' => 'img-responsive img-circle img-size')); ?>
                      <h4>永山大志</h4>
                      <p class="text-muted">Project manager</p>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                  <div class="team-member">
                      <?php echo $this->Html->image('member/shohei.jpg' , array('class' => 'img-responsive img-circle img-size')); ?>
                      <h4>川田 翔平</h4>
                      <p class="text-muted">Database specialist</p>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="team-member">
                      <?php echo $this->Html->image('member/takeshi.jpg' , array('class' => 'img-responsive img-circle img-size')); ?>
                      <h4>渡辺 剛</h4>
                      <p class="text-muted">Lead Designer</p>
                  </div>
              </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->



  <!-- script references -->
  <?php echo $this->Html->script('jquery-1.11.2.min');?>
  <?php echo $this->Html->script('bootstrap');?>
  <?php echo $this->Html->script('input-keypress');?>
  </body>
</html>
