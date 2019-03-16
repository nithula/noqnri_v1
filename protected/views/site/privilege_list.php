<section class="header-privileges-main">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="header-text-main">
              <h2><b>EXCLUSIVE PRIVILEGES</b></h2>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/noq.png" class="img-responsive">
          </div>
        </div>
      </div>
</section>
<section id="Privileges" class="kind-exclusive-main">
 <div class="container">
      <div class="exclusive-heading text-center">
        <h3>EXCLUSIVE PRIVILEGES</h3>
        <div class="exc-underline">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/under-line.png">
        </div>
     </div>
     <div class="privi-sub-lists text-center">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 white-color border-grey">
          <?php 
                $i=0;
                foreach($privilegeList as $privilege){
                    if($i==0){
                        $classIdentifi = "inner-sub-priv-active";
                    }else{
                        $classIdentifi='';
                    }
                    if($i%2==0){
                        $background_class = "grey-color"; 
                    }else{
                        $background_class = "white-color"; 
                    }
              ?>
              <div class="row inner-sub-priv <?php echo $background_class;?> <?php echo $classIdentifi;?>" id="<?php echo $privilege->id;?>">
                <div class="col-md-2 col-xs-2">
                <?php if($privilege->category_image!=NULL){?>
                  	<img src="<?php echo Common::urldata().'/uploads/category/'.$privilege->category_image;?>">
                  <?php }else{?>
                  	<img src="<?php echo Yii::app()->baseurl."/images/50X50.png";?>">
                  <?php }?>
                </div>
                <div class="col-md-8 col-xs-8 text-left">
                  <h4><?php echo $privilege->category;?></h4>
                </div>
                <div class="col-md-2 col-xs-2">
                  <i class="fa fa-angle-right fa-4x"></i>
                </div>
              </div>
          <?php $i++;}?>          
        </div>
        <div class="col-md-2"></div>
      </div>
     </div>
 </div>
</section>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.inner-sub-priv').hover(function(){
		$('.inner-sub-priv').each(function(){
			$(this).removeClass('inner-sub-priv-active');
		});
	});
});

$('.inner-sub-priv').on('click',function(){
	linkRef = $(this).attr('id');
	window.location.href = Baseurl+'/site/content/'+linkRef;
});
</script>