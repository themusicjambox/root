<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TheMusicJamBox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <?php
    echo $this->Html->css('bootstrap');
    echo $this->Html->css('mystyle');
    echo $this->Html->css('modal');
    ?>    
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <div style="width: 100%;">
        <div style="float: right;">
        <a style="display:none;" href="http://www.facebook.com/TheMusicJamBox" target="_blank"><?php echo $this->Html->image('logos/facebook_square-128.png', array('alt' => 'fb_logo', 'width' => '32', 'height' => '32')); ?></a>
        <a style="display:none;" href="http://www.twitter.com/TheMusicJamBox" target="_blank"><?php echo $this->Html->image('logos/twitter_square-128.png', array('alt' => 'tw_logo', 'width' => '32', 'height' => '32')); ?></a>
        <a style="display:none;" href="http://www.instagram.com/TheMusicJamBox" target="_blank"><?php echo $this->Html->image('logos/twitter_square-128.png', array('alt' => 'tw_logo', 'width' => '32', 'height' => '32')); ?></a>
        </div> 
        <a href="http://www.TheMusicJamBox.com">
        <img id="main_logo_img" src="img/labels/themusicjambox.png" style="display: block; margin-left: auto; margin-right: auto;">
        </a>
        </div>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li id="jam" class="active"><a href="./">Jam!</a></li>
                <li id="archive"><a href="./Archive">Archive</a></li>
                <li id="aar"><a href="./AerialAudioRecordings">Aerial Audio Recordings</a></li>
                <li id="lib"><a href="./Library">Library</a></li>
                <li id="misc"><a href="#" onclick="whoweare();">About</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <?php echo $this->fetch('content'); ?>
      </div>      

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php
    echo $this->Html->script('jquery-1.11.1.min');
    echo $this->Html->script('bootstrap-transition');
    echo $this->Html->script('bootstrap-alert');
    echo $this->Html->script('bootstrap-modal');
    echo $this->Html->script('bootstrap-dropdown');
    echo $this->Html->script('bootstrap-scrollspy');
    echo $this->Html->script('bootstrap-tab');
    echo $this->Html->script('bootstrap-tooltip');
    echo $this->Html->script('bootstrap-popover');
    echo $this->Html->script('bootstrap-button');
    echo $this->Html->script('bootstrap-collapse');
    echo $this->Html->script('bootstrap-carousel');
    echo $this->Html->script('bootstrap-typeahead');
    ?>
    <script type="text/javascript">
    !function(d,s,id){
      var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
      if(!d.getElementById(id)){
        js=d.createElement(s);
        js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js,fjs);}}
      (document,"script","twitter-wjs");

    function whoweare(){
      alert("Live video-streaming of jam sessions with high quality sound. Experimental, fresh & authentic harmonies. Establishing avant-garde since 1991.\n\ncontact@themusicjambox.com\n\nTheMusicJamBox 2015 ©");
    };
  </script>

  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57412371-1', 'auto');
  ga('send', 'pageview');

  </script>
  </body>
</html>
