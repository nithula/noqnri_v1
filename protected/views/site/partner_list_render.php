<?php if(count($partnerList)>0){?>
<div class="col-md-9 well-c admin-content" id="home">
<div class="tab-content-1">
  <h3><?php echo $categoryDetails->category;?></h3>
  <p><?php echo $categoryDetails->category_discription;?>.</p>
</div>
<div class="inner-hsptl-head">
  	<div class="pull-left">
  		<p><?php echo count($partnerList);?>  <?php echo $categoryDetails->category;?> Listed</p>
	</div>
    <div class="pull-right">
      <select onChange="filter(this);">
        <option value="Latest" <?php echo ($key=="Latest")?"selected":'';?>>Latest</option>
        <option value="Oldest" <?php echo ($key=="Oldest")?"selected":'';?>>Oldest</option>
        <option value="A-Z" <?php echo ($key=="A-Z")?"selected":'';?>>Ascending</option>
        <option value="Z-A" <?php echo ($key=="Z-A")?"selected":'';?>>Descending</option>
      </select>
    </div>
</div>
<div class="clearfix"></div>
  <?php $i=0;
      foreach($partnerList as $part){
          //$PartnerProfilePhoto = ProfileImages::model()->findByAttributes(array('owner_id'=>$part->id,'owner_type'=>'1'));
          $reviewList  = Review::model()->findAllByAttributes(array('status'=>'Y','partner_id'=>$part->id),array("order" => "rating desc"));
          ?>
          <div class="hospital-inner" id="<?php echo $part->id;?>">
            <div class="row">
              <div class="col-md-5">
              	<div class="img-box">
                  	<?php if($part->logo!=NULL){?>
                    	<img src="<?php echo Common::urldata().'/uploads/partner/'.$part->id."/logo/".$part->logo;?>" class="img-responsive">
                    <?php }else{?>
                    	<img src="<?php echo Yii::app()->baseurl."/images/500x300.png";?>" class="img-responsive">
                    <?php }?>
                </div>
              </div>
              <div class="col-md-7">
                <h3><?php echo $part->name;?></h3>
                <table class="star-table">
                 <tr>
                  <?php 
            	    $array_list = array();
                    foreach($reviewList as $review){
                        array_push($array_list,$review->rating);
                    }
                    $countList = !empty($array_list)?max($array_list):0;
                  ?>
                  <th><div class="my-rating-<?php echo $i?>"></div> <?php echo $countList;?> Ratings</th>
                  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
				  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.star-rating-svg.js"></script>
                  <script type="text/javascript">
                    	<?php if($countList=="4.5"||$countList=="5"){
                    	           $Colorvalue = "#FFD700";
                        	   }else if($countList=="3.5"||$countList=="4"){
                                	   $Colorvalue = "green";
                        	   }else if($countList=="2.5"||$countList=="3"){
                                       $Colorvalue = "blue";
                        	   }else if($countList=="1.5"||$countList=="2"){
                                       $Colorvalue = "purple";
                        	   }else if($countList=="0.5"||$countList=="1"){
                                       $Colorvalue = "red";
                    	       }else{
                    	               $Colorvalue = "lightgray";
                    	       }
                    	?>
                        $(".my-rating-<?php echo $i?>").starRating({
                        	starSize:20,
                        	readOnly:true,
                        	activeColor:'<?php echo $Colorvalue?>',
                    		useGradient:false,
                        	initialRating: <?php echo $countList;?>,
                        });
                 	</script>
                 </tr>
                </table>
				<table class="contact-table">
				<?php $phoneData = Phone::model()->findAllByAttributes(array('owner_id'=>$part->id,'owner_type'=>'1'));
				      foreach($phoneData as $phone){
				          if($phone->phone_type=="Mobile"){
				              $mobile = ($phone->phone_number)?$phone->phone_number:'NA';
				          }else if($phone->phone_type=="Office"){
				              $office = ($phone->phone_number)?$phone->phone_number:'NA';
				          }
				          ?>
                         <tr>
                          <?php if($mobile!=NULL){?>
                              <th>        
                              <i class="fa fa-mobile" aria-hidden="true"></i>
                              <?php echo $phone->country_code.' '.$mobile;?>
                              </th>
                          <?php }?>
                          <?php if($office!=NULL){?>
                              <th>
                                  <i class="fa fa-phone" aria-hidden="true"></i>
                                  <?php echo $phone->country_code.' '.$office;?>
                              </th>
                          <?php }?>
                         </tr>
                 	  <?php }?>
               </table>
               <?php 
               $addressData = Address::model()->findByAttributes(array('owner_id'=>$part->id,'owner_type'=>'1'));
               $Landmark='';
               if($addressData->Landmark!=NULL){
                   $Landmark = ','.$addressData->Landmark;
               }
               $country_name = ($addressData->Country_details)?','.$addressData->Country_details->country_name:'';
               $state_name = ($addressData->State_details)?','.$addressData->State_details->state_name:'';
               $city_name = ($addressData->City_details)?','.$addressData->City_details->name:'';
               ?>
			   <p><i class="fa fa-map-marker c-i-cls" aria-hidden="true"></i> <?php echo $addressData->address.$Landmark.$country_name.$state_name.$city_name;?></p>
               <div class="soc-hsptl">
                 <a href="<?php echo $part->faccebook_url;?>"><i class="fa fa-facebook"></i></a>
                 <a href="<?php echo $part->twitter_url;?>"><i class="fa fa-twitter"></i></a>
                 <a href="<?php echo $part->google_plus_url;?>"><i class="fa fa-google-plus"></i></a>
               </div>
              </div>
          </div>
        </div>
    <?php $i++;}?>
</div>
<?php }else{?>
	<div class="noContent text-center"><img src="<?php echo Yii::app()->baseurl."/images/notfound.png"?>" alt="not found" style="text-align:center;"></div>
<?php }?>
<script type="text/javascript">
$('.hospital-inner').on('click',function(){
	linkRef = $(this).attr('id');
	window.location.href = Baseurl+'/site/detail/'+linkRef;
});

function filter(param){
	key = $(param).val();
	id= "<?php echo $categoryDetails->id;?>";
	$('.innerContent').html('<img src="<?php echo Yii::app()->request->baseUrl;?>/images/Loader3.gif" alt="Loading">').css({'text-align':'center'});
	$.ajax({
		type: "POST",
		url:'<?php echo Yii::app()->request->baseUrl;?>/site/RenderList',
		data:{'key':key,'id':id},
	    success: function(res) 
	    {
	    	$('.innerContent').html(res).css({'text-align':'left'});return false;
		}
	});
}
</script>