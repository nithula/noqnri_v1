<div id="myModal-director-1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <?php echo $this->renderPartial('//site/director_1'); ?>
      </div>
    </div>
  </div>
</div>

<div id="myModal-director-2" class="modal fade" role="dialog">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-body">
                <?php echo $this->renderPartial('//site/director_2'); ?>
			</div>
  		</div>
	</div>
</div>

<div id="myModal-director-3" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <?php echo $this->renderPartial('//site/director_3'); ?>
	</div>
   </div>
  </div>
</div>

<div id="myModal-director-4" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <?php echo $this->renderPartial('//site/director_4'); ?>
	</div>
   </div>
  </div>
</div>

<div id="myModal-director-5" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <?php echo $this->renderPartial('//site/director_5'); ?>
      </div>
    </div>
  </div>
</div>

<nav class="res-sub-header hidden-lg hidden-md">
  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-sm-6">
        <a href="http://app.noqnri.com/" target="_blank"><i class="fa fa-lock"></i> Login </a>
      </div>
      <div class="col-xs-6 col-sm-6 text-right">
        <a href="http://app.noqnri.com/site/register" target="_blank"><i class="fa fa-user"></i> Register </a>
      </div>
    </div>
  </div>
</nav>
<!-- responsive sub header -->
<nav class="kind-sub-menu">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="kind-who-we">
        <ul type="none">
          <li class="margin-r-su-menu"><a href="#about">Who We Are</a></li>
          <li class="margin-r-su-menu"><a href="#helps">Why Us</a></li>
          <li class="margin-r-su-menu"><a href="#contact">Contact</a></li>
        </ul>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <div class="kind-info">
        <ul type="none">
          <li class="margin-l-su-menu"><a href="http://app.noqnri.com/" target="_blank"><i class="fa fa-lock"></i> Login </a></li>
          <li class="margin-l-su-menu"><a href="#"><i class="fa fa-envelope"></i> info@noqnri.com</a></li>
          <li class="margin-l-su-menu margin-r-su-menu"><a href="http://app.noqnri.com/site/register" target="_blank"><i class="fa fa-user"></i> Register </a></li>
        </ul>
        </div>
      </div>
      <div class="col-md-2">
        <div class="sub-menu-social">
          <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          <a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo Yii::app()->baseurl."/site/index";?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
      <?php 
            $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            //echo $uri_path;die;
            $uri_segments = explode('/', $uri_path);
            //echo "<pre>";print_r($uri_segments);die;
            if($uri_segments[2]=="content" || $uri_segments[2]=="detail" || $uri_segments[2]=="checkmystatus"){?>
            <li class="margin-r-menu"><a href="<?php echo Yii::app()->baseurl."/site/index";?>">Home</a></li>
            <li class="margin-r-menu"><a href="<?php echo Yii::app()->baseurl."/";?>#about">About</a></li>
            <li class="margin-r-menu"><a href="<?php echo Yii::app()->baseurl."/";?>#benefits">Benefit</a></li>
            <li class="margin-r-menu active"><a href="<?php echo Yii::app()->baseurl."/";?>#Privileges">Privileges</a></li>
        <?php }else{?>
        	<li class="margin-r-menu active"><a href="#myCarousel">Home</a></li>
            <li class="margin-r-menu"><a href="#about">About</a></li>
            <li class="margin-r-menu"><a href="#benefits">Benefit</a></li>
            <li class="margin-r-menu"><a href="#Privileges">Privileges</a></li>
        <?php }?>
        <li class="no-border-cls"><input type="text" placeholder=""><i class="fa fa-search search-inside" aria-hidden="true"></i></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>