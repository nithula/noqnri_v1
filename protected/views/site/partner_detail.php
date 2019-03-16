<?php if($categoryDetails->category_banner!=NULL){?>
	<section class="header-hospitals-main" style="background-image: url('<?php echo Common::urldata().'/uploads/category/banner/'.$categoryDetails->category_banner;?>');">
<?php }else{?>
	<section class="header-hospitals-main">
<?php }?>
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div class="header-text-main">
          <h2><b id="categoryName"><?php echo $categoryDetails->category;?></b></h2>
        </div>
      </div>
      <div class="col-md-5 text-center">
        <!-- <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/noq.png" class="img-responsive"> -->
      </div>
    </div>
  </div>
</section>
<section class="kind-hospitals-main">
    <div class="container">
    	<div class="row">
    		<div class="col-md-3">
              <?php echo $this->renderPartial('//site/privillege_left_menu',array('privilegeList'=>$privilegeList,'categoryDetails'=>$categoryDetails)); ?>
        	</div>
        	<div class="innerContent">
            	<div class="col-md-9 well-c admin-content" id="home">
                    <div class="inner-hsptl-head-2">
                      	<div class="pull-left">
                      		<h3><?php echo $partnerDetail->name;?></h3>
                    	</div>
                        <div class="pull-right">
                              <?php 
                        	    $array_list = array();
                                foreach($reviewList as $review){
                                    array_push($array_list,$review->rating);
                                }
                              ?>
                              <div class="my-rating"></div> <?php echo !empty($array_list)?max($array_list):0;?> Rating
                        </div>
                    </div>
    				<div class="single-hospital">
                  		<div class="row">
                    		<div class="col-md-12">
                    			<?php if(empty($partnerPhotos)){?>
                    			    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    			    <div class="carousel-inner">
                    			    	<div class="item active">
          									 <img src="<?php echo Yii::app()->baseurl."/images/1400x550.png"?>" alt="Default Image"> 
                                              <div class="bottom-left">
                                                <div class="row">
                                                  	<div class="col-md-3">
                                                  		<?php $phoneData = Phone::model()->findAllByAttributes(array('owner_id'=>$partnerDetail->id,'owner_type'=>'1'));
                                    				      foreach($phoneData as $phone){
                                    				          if($phone->phone_type=="Mobile"){
                                    				              $mobile = ($phone->phone_number)?$phone->phone_number:'NA';
                                    				          }else if($phone->phone_type=="Office"){
                                    				              $office = ($phone->phone_number)?$phone->phone_number:'NA';
                                    				          }
                                        				      ?>
                                                              <?php if($mobile!=NULL){?><p><i class="fa fa-mobile"></i> <?php echo $phone->country_code.' '.$mobile;?></p><?php }?>
                                                              <?php if($office!=NULL){?><p><i class="fa fa-phone"></i> <?php echo $phone->country_code.' '.$office;?></p><?php }?>
                                                        <?php }?>
                                                  	</div>
    											  	<div class="col-md-5">
    											  		<?php 
    											  		   $addressData = Address::model()->findByAttributes(array('owner_id'=>$partnerDetail->id,'owner_type'=>'1'));
                                                           $Landmark='';
                                                           $customLocation='';
                                                           if($addressData->Landmark!=NULL){
                                                               $Landmark = ','.$addressData->Landmark;
                                                           }
                                                           $country_name = ($addressData->Country_details)?','.$addressData->Country_details->country_name:'';
                                                           $state_name = ($addressData->State_details)?','.$addressData->State_details->state_name:'';
                                                           $city_name = ($addressData->City_details)?','.$addressData->City_details->name:'';
                                                        ?>
    													<p><i class="fa fa-map-marker"></i> <?php echo $addressData->address.$Landmark.$country_name.$state_name.$city_name;?></p>
                    							  	</div>
    											  	<div class="col-md-4">
                                                        <table class="sing-inn-over-tab">
                                                          <tr>
                                                            <td><i class="fa fa-clock-o"></i></td>
                                                            <td>Mon - Sat</td>
                                                            <td>:</td>
                                                            <td><?php echo $partnerDetail->working_hours;?></td>
                                                          </tr>
                                                        </table>
              										</div>
            									</div>
           									</div>
        								</div>
                    			    </div>
                    			</div>    
                    			<?php }else{?>
                          			<div id="myCarousel" class="carousel slide" data-ride="carousel">
          								<div class="carousel-inner">
            								<?php 
            								$i=0;foreach($partnerPhotos as $photo){?>
                								<div class="item <?php echo ($i==0)?'active':'';?>">
                  									 <img src="<?php echo Common::urldata().'/uploads/partner/'.$partnerDetail->id.'/photo/'.$photo->image;?>" alt="<?php echo $photo->image;?>"> 
                                                      <div class="bottom-left">
                                                        <div class="row">
                                                          	<div class="col-md-3">
                                                          		<?php $phoneData = Phone::model()->findAllByAttributes(array('owner_id'=>$partnerDetail->id,'owner_type'=>'1'));
                                            				      foreach($phoneData as $phone){
                                            				          if($phone->phone_type=="Mobile"){
                                            				              $mobile = ($phone->phone_number)?$phone->phone_number:'NA';
                                            				          }else if($phone->phone_type=="Office"){
                                            				              $office = ($phone->phone_number)?$phone->phone_number:'NA';
                                            				          }
                                                				      ?>
                                                                      <?php if($mobile!=NULL){?><p><i class="fa fa-mobile"></i> <?php echo $phone->country_code.' '.$mobile;?></p><?php }?>
                                                                      <?php if($office!=NULL){?><p><i class="fa fa-phone"></i> <?php echo $phone->country_code.' '.$office;?></p><?php }?>
                                                                <?php }?>
                                                          	</div>
            											  	<div class="col-md-5">
            											  		<?php 
            											  		   $addressData = Address::model()->findByAttributes(array('owner_id'=>$partnerDetail->id,'owner_type'=>'1'));
                                                                   $Landmark='';
                                                                   $customLocation='';
                                                                   if($addressData->Landmark!=NULL){
                                                                       $Landmark = ','.$addressData->Landmark;
                                                                   }
                                                                   
                                                                   $country_name = ($addressData->Country_details)?','.$addressData->Country_details->country_name:'';
                                                                   $state_name = ($addressData->State_details)?','.$addressData->State_details->state_name:'';
                                                                   $city_name = ($addressData->City_details)?','.$addressData->City_details->name:'';
                                                                ?>
            													<p><i class="fa fa-map-marker"></i> <?php echo $addressData->address.$Landmark.$country_name.$state_name.$city_name;?></p>
                            							  	</div>
            											  	<div class="col-md-4">
                                                                <table class="sing-inn-over-tab">
                                                                  <tr>
                                                                    <td><i class="fa fa-clock-o"></i></td>
                                                                    <td>Mon - Sat</td>
                                                                    <td>:</td>
                                                                    <td><?php echo $partnerDetail->working_hours;?></td>
                                                                  </tr>
                                                                </table>
                      										</div>
                    									</div>
                   									</div>
                								</div>
            								<?php $i++;}?>
          								</div>
          								<?php if(count($partnerPhotos)>1){?>
                                          	<a class="left carousel-control cus-co-left" href="#myCarousel" data-slide="prev">
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sliderleft.png">
                                                <span class="sr-only">Previous</span>
                                          	</a>
                                          	<a class="right carousel-control cus-co-right" href="#myCarousel" data-slide="next">
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sliderright.png">
                                                <span class="sr-only">Next</span>
                                          	</a>
                                      	<?php }?>
        							</div>
    							<?php }?>
                    		</div>
                  		</div>
                	</div>
                    <div class="sub-text-single">
                      <div class="row">
                        <div class="col-md-9 col-xs-12">
                          <p class="text-justify">
                            <?php echo $partnerDetail->description;?> 
                           </p>
                        </div>
                        <div class="col-md-3 col-xs-12 text-right">
                          <div class="soc-hsptl">
                             <a href="<?php echo $partnerDetail->faccebook_url;?>"><i class="fa fa-facebook"></i></a>
                             <a href="<?php echo $partnerDetail->twitter_url;?>"><i class="fa fa-twitter"></i></a>
                             <a href="<?php echo $partnerDetail->google_plus_url;?>"><i class="fa fa-google-plus"></i></a>
                          </div>
                          <a href="#" class="btn single-pge-brn-2" role="button" data-toggle="modal" data-target="#myModal-director-16"><i class="fa fa-comments"></i> WRITE REVIEW</a>
                              <div id="myModal-director-16" class="modal fade" role="dialog">
                            	<div class="modal-dialog">
                                	<div class="modal-content">
                                  		<div class="modal-body">
                                            <?php echo $this->renderPartial('//site/write_review',array('review'=>$review,'partnerDetail'=>$partnerDetail)); ?>
                                        </div>
                              		</div>
                            	</div>
    						 </div>
                        </div>
                      </div>
                    </div>
                	<div id="Dynamic_Content">
                        <div class="row">
                        <?php if(!empty($array_list)){?>
                          		<div class="col-md-12 col-xs-12">
                                    <div class="review-header">
                                      <div class="row">
                                        <div class="col-md-8">
                                          	<div class="review-sub-header">
                                      			<h3><i class="fa fa-comments"></i> Reviews & Ratings</h3>
                                    		</div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="tab">
                                              <button class="tablinks active" onclick="openCity(event, 'London')">Popular</button>
                                              <button class="tablinks" onclick="openCity(event, 'Paris')">Recent</button>
                                    	  </div>
                                        </div>
                                      </div>
                                    </div>  
                                    <div class="clearfix"></div>    
                                    <div id="London" class="tabcontent">
                                    	<div class="review-inner-main">
                                    	  <?php 
                                    	    $array_list = array();
                                            foreach($reviewList as $review){
                                                array_push($array_list,$review->rating);
                                            }
                                          ?>
                                          <h4>Overall Ratings (<?php echo !empty($array_list)?max($array_list):'0';?>)</h4>
                                          <div class="my-rating"></div>
                                          <div class="clearfix"></div>
                                          <table class="hstp-si-table">
                                            <tr>
                                              <td>Excellent</td>
                                              <td>
                                                <div class="w3-border">
                                                  <div class="w3-grey" style="height:24px;width:100%;background-color:#FFD700!important;"></div>
                                                </div>
                                              </td>
                                              <td>(4.5 - 5)</td>
                                            </tr>
                                            <tr>
                                              <td>Very Good</td>
                                              <td>
                                                <div class="w3-border">
                                                  <div class="w3-grey" style="height:24px;width:80%;background-color:green!important;"></div>
                                                </div>
                                              </td>
                                              <td>(3.5 - 4)</td>
                                            </tr>
                                            <tr>
                                              <td>Good</td>
                                              <td>
                                                <div class="w3-border">
                                                  <div class="w3-grey" style="height:24px;width:50%;background-color:blue!important;"></div>
                                                </div>
                                              </td>
                                              <td>(2.5 - 3)</td>
                                            </tr>
                                            <tr>
                                              <td>Average</td>
                                              <td>
                                                <div class="w3-border">
                                                  <div class="w3-grey" style="height:24px;width:30%;background-color:purple!important;"></div>
                                                </div>
                                              </td>
                                              <td>(1.5 - 2)</td>
                                            </tr>
                                            <tr>
                                              <td>Poor</td>
                                              <td>
                                                <div class="w3-border">
                                                  <div class="w3-grey" style="height:24px;width:10%;background-color:red!important;"></div>
                                                </div>
                                              </td>
                                              <td>(0.5 - 1)</td>
                                            </tr>
                                          </table>
                                    	</div>
                                    	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
            							<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.star-rating-svg.js"></script>
                                    	<?php $i=0;foreach($reviewList as $review){?>
                                          	<div class="revi-inner-person">
                                                <div class="row">
                                                 <div class="col-md-2">
                                                   <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/unknown-man.png">
                                                 </div> 
                                                 <div class="col-md-10">
                                                  <div class="rev-person-head pull-left">
                                                    <h4><?php echo $review->name;?></h4>
                                                    <div class="my-rating-star<?php echo $i?>"></div>
                                                    <script type="text/javascript">
                                                	<?php if($review->rating=="4.5"||$review->rating=="5"){
                                                	           $Colorvalue = "#FFD700";
                                                	       }else if($review->rating=="3.5"||$review->rating=="4"){
                                                        	    $Colorvalue = "green";
                                                	       }else if($review->rating=="2.5"||$review->rating=="3"){
                                                               $Colorvalue = "blue";
                                                	       }else if($review->rating=="1.5"||$review->rating=="2"){
                                                               $Colorvalue = "purple";
                                                	       }else if($review->rating=="0.5"||$review->rating=="1"){
                                                               $Colorvalue = "red";
                                                	       }else{
                                                	           $Colorvalue = "lightgray";
                                                	       }
                                                	?>
                                                    $(".my-rating-star<?php echo $i?>").starRating({
                                                    	starSize:20,
                                                    	readOnly:true,
                                                    	activeColor:'<?php echo $Colorvalue?>',
                                                		useGradient:false,
                                                    	initialRating: <?php echo $review->rating;?>,
                                                    });
                                                </script>
                                                  </div>
                                                  <div class="rev-person-head pull-right">
                                                    <h4><?php echo Common::getTimezone($review->created_at,'d M y');?></h4>
                                                  </div>
                                                  <div class="clearfix"></div>
                                                  <p><?php echo $review->review;?>.</p>
                                                 </div> 
                                                </div>
                                          	</div>
                                      	<?php $i++;}?>
                                    </div>
                                </div>
                        <?php }?>
                        </div>
                		<?php if(!empty($array_list)){?>
        				<div id="Paris" class="tabcontent">
                          	<div class="review-inner-main">
                        	  <?php 
                        	    $array_list_recent = array();
                        	    foreach($reviewListRecent as $review){
                        	        array_push($array_list_recent,$review->rating);
                                }
                              ?>
                              <h4>Overall Ratings (<?php echo !empty($array_list)?max($array_list):'0';?>)</h4>
                              <div class="my-rating"></div>
                              <div class="clearfix"></div>
                              <table class="hstp-si-table">
                                <tr>
                                  <td>Excellent</td>
                                  <td>
                                    <div class="w3-border">
                                      <div class="w3-grey" style="height:24px;width:100%;background-color:#FFD700!important;"></div>
                                    </div>
                                  </td>
                                  <td>(4.5 - 5)</td>
                                </tr>
                                <tr>
                                  <td>Very Good</td>
                                  <td>
                                    <div class="w3-border">
                                      <div class="w3-grey" style="height:24px;width:80%;background-color:green!important;"></div>
                                    </div>
                                  </td>
                                  <td>(3.5 - 4)</td>
                                </tr>
                                <tr>
                                  <td>Good</td>
                                  <td>
                                    <div class="w3-border">
                                      <div class="w3-grey" style="height:24px;width:50%;background-color:blue!important;"></div>
                                    </div>
                                  </td>
                                  <td>(2.5 - 3)</td>
                                </tr>
                                <tr>
                                  <td>Average</td>
                                  <td>
                                    <div class="w3-border">
                                      <div class="w3-grey" style="height:24px;width:30%;background-color:purple!important;"></div>
                                    </div>
                                  </td>
                                  <td>(1.5 - 2)</td>
                                </tr>
                                <tr>
                                  <td>Poor</td>
                                  <td>
                                    <div class="w3-border">
                                      <div class="w3-grey" style="height:24px;width:10%;background-color:red!important;"></div>
                                    </div>
                                  </td>
                                  <td>(0.5 - 1)</td>
                                </tr>
                              </table>
                        	</div>
                        	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
    						<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.star-rating-svg.js"></script>
                        	<?php $i=0;foreach($reviewListRecent as $review){?>
                              	<div class="revi-inner-person">
                                    <div class="row">
                                     <div class="col-md-2">
                                       <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/unknown-man.png">
                                     </div> 
                                     <div class="col-md-10">
                                      <div class="rev-person-head pull-left">
                                        <h4><?php echo $review->name;?></h4>
                                        <div class="my-rating-star-recent<?php echo $i?>"></div>
                                        <script type="text/javascript">
                                        	<?php if($review->rating=="4.5"||$review->rating=="5"){
                                        	           $Colorvalue = "#FFD700";
                                        	       }else if($review->rating=="3.5"||$review->rating=="4"){
                                                	    $Colorvalue = "green";
                                        	       }else if($review->rating=="2.5"||$review->rating=="3"){
                                                       $Colorvalue = "blue";
                                        	       }else if($review->rating=="1.5"||$review->rating=="2"){
                                                       $Colorvalue = "purple";
                                        	       }else if($review->rating=="0.5"||$review->rating=="1"){
                                                       $Colorvalue = "red";
                                        	       }else{
                                        	           $Colorvalue = "lightgray";
                                        	       }
                                        	?>
                                            $(".my-rating-star-recent<?php echo $i?>").starRating({
                                            	starSize:20,
                                            	readOnly:true,
                                            	activeColor:'<?php echo $Colorvalue?>',
                                        		useGradient:false,
                                            	initialRating: <?php echo $review->rating;?>,
                                            });
                                        </script>
                                      </div>
                                      <div class="rev-person-head pull-right">
                                        <h4><?php echo Common::getTimezone($review->created_at,'d M y');?></h4>
                                      </div>
                                      <div class="clearfix"></div>
                                      <p><?php echo $review->review;?>.</p>
                                     </div> 
                                    </div>
                              	</div>
                          	<?php $i++;}?>
                    	</div>
                	<?php }?>
                </div>
    			</div>
			</div>
        </div>
    </div>
</section>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.star-rating-svg.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweetalert2.all.min.js"></script>
<script type="text/javascript">
//https://github.com/nashio/star-rating-svg/ - Js Library reference
$(document).ready(function(){
    $('#London').show();
    var colorFlag = '<?php echo !empty($array_list)?max($array_list):0;?>';
    if(colorFlag=="4.5"||colorFlag=="5"){
		Colorvalue = "#FFD700";
    }else if(colorFlag=="3.5"||colorFlag=="4"){
    	Colorvalue = "green";
    }else if(colorFlag=="2.5"||colorFlag=="3"){
    	Colorvalue = "blue";
    }else if(colorFlag=="1.5"||colorFlag=="2"){
    	Colorvalue = "purple";
    }else if(colorFlag=="0.5"||colorFlag=="1"){
    	Colorvalue = "red";
    }else{
    	Colorvalue = "lightgray";
    }
    setRating('my-rating',Colorvalue);
    
});

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }

  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function setRating(element,color){
	$("."+element).starRating({
		starSize:20,
		readOnly:true,
		activeColor:color,
		useGradient:false,
		initialRating: <?php echo !empty($array_list)?max($array_list):0;?>,
	});
}

$("#wite_review").submit(function( event ) {
	  $('#write_review').html('Loading..');
	  $('#loading_img').show();
	  $('#Dynamic_Content').html('<img src="<?php echo Yii::app()->request->baseUrl;?>/images/Loader3.gif" alt="Loading">').css({'text-align':'center'});
	  event.preventDefault();
	  $.ajax({
		type:'POST',
		data: $('form#wite_review').serialize(),
		url:'<?php echo Yii::app()->createAbsoluteUrl("Site/ReviewSubmit"); ?>',
		success:function(response){
			if(response=="0"){
				$('#error_showing').html('Error while submiting review,Please try after some time..').css({'color':'red'});
			}else{
				$('#write_review').html('Submit Review');
				$('#loading_img').hide();
				$('.close').click();
				$('#Dynamic_Content').html(response).css({'text-align':'left'});
				$('#London').show();
				$('#LinksAddress').addClass('active');
				swal({
					  position: 'top-end',
					  type: 'success',
					  title: 'Review has been submitted succesfully',
					  showConfirmButton: false,
					  timer: 4000
				})
			}
		},error: function(jqXHR, textStatus, errorThrown) {
			//window.location.reload();
        }
	});
});
</script>