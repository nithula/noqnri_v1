    <section id="myCarousel" class="carousel slide kind-slider" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner-2.jpg">
          <div id="textSlider" class="row hidden-xs hidden-sm">
              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 iamCol">
              </div>
              <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 slideCol">
                <div class="scroller">
                  <div class="inner">
                    <p>The Wait is Over!</p>
                    <br>
                    <p>Forkind NoQ <br>Privilege Card</p>
                    <br>
                    <p>Consult your <br>doctor without <br>prior appointments</p>
                    <br>
                    <p>No Queues: <br>Save Time & Money!</p>
                    <br>
                    <p>It's Free! <br>All benefits cover <br>your family too!</p>
                    <br>
                  </div>
                </div>
              </div>
      
            </div>
        </div>
        <div class="item">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner-1.jpg">
        </div>
      </div>
      <a class="left carousel-control cus-co-left" href="#myCarousel" data-slide="prev">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sliderleft.png">
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control cus-co-right" href="#myCarousel" data-slide="next">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sliderright.png">
        <span class="sr-only">Next</span>
      </a>
    </section>
    
    <section id="about" class="kind-about">
         <div class="container">
           <div class="row">
             <div class="col-md-6">
              <div class="about-inside">
                <h4>WHAT IS FORKIND</h4>
               <h1>ALL ABOUT ?</h1>
               <p class="text-justify">Forkind is a pioneering project launched by a group of experienced professionals in frontier areas of technology and management. The endeavor of Forkind is to assist an arriving passenger at the international airports for their onward travel, accommodation, food, shopping, medical needs, educational services, financial requirements and/or any other necessities all over Kerala, Tamil Nadu, Karnataka and nearby states.</p>
              </div>
               
             </div>
             <div class="col-md-6">
               <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about.png" class="img-responsive">
             </div>
           </div>
         </div>
    </section>
    <hr>
    <section id="benefits" class="kind-welcome">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/hospital.jpg" class="img-responsive">
          </div>
          <div class="col-md-6">
            <div class="kind-welcome-text">
              <h3>HEALTHCARE BENEFITS</h3>
              <hr class="hr-grn-lne">
              <div class="clearfix"></div>
              <p>Everyday thousands of Non-resident Indians arrive at our international airports. They have limited number of days to include all their commitments – Family visits, Shopping, Functions and Medical Check-ups, to name a few. </p>
              <p>Hospital visits can consume considerable time off from the pre-planned schedule. From making early appointments to waiting in queues for consultations and lab tests might take up days. Forkind NoQ Privilege Card eliminates such time-consuming proceedings and assists each cardholder in effectively utilizing his/her time.</p>
              <h5><b>Benefits of NoQ Privilege Card:</b></h5>
              <ul class="hlth-cre-ul">
                <li>Consult doctors without prior appointments (Except department heads).</li>
                <li>No queues for consultation or lab tests.</li>
                <li>Associated with a wide network of hospitals.</li>
                <li>Saves time and money.</li>
                <li>Covers you and your family members.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

   <section id="Privileges" class="kind-exclusive">
     	<div class="container">
          <div class="exclusive-heading text-center">
            <h3>EXCLUSIVE PRIVILEGES</h3>
            <div class="exc-underline">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/under-line.png">
            </div>
          </div>
           <div class="row text-center">
           	<?php foreach($exclusive_privileges as $ex){?>
             <div class="col-md-2 col-xs-6 col-sm-4">
               <div class="exclusive-inside" id="<?php echo $ex->id;?>">
                 <img src="<?php echo Common::urldata().'/uploads/category/'.$ex->category_image;?>" class="img-responsive"> 
                 <p><?php echo $ex->category;?></p>
               </div>
             </div>
             <?php }?>
             <div class="col-md-2 col-xs-6 col-sm-4">
               <div class="exclusive-inside" id="<?php echo "all";?>">
                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-6.png" class="img-responsive"> 
                 <p>More</p>
               </div>
             </div>
           </div>
		</div>
   </section>
   
   <section class="kind-directors">
     <div class="container">
      <div class="directors-heading text-center">
        <h4>OUR BOARD OF</h4>
        <h1>DIRECTORS</h1>
      </div>
       <div class="row">
         <div class="col-md-15 col-sm-6">
           <div class="directors-inside">
             <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/director-1.jpg" class="img-responsive director-img">
              	<div class="director-overlay">
                    <div class="hover-content">
                      <a href=""><i class="fa fa-facebook"></i></a>
                      <a href=""><i class="fa fa-twitter"></i></a>
                      <a href=""><i class="fa fa-google-plus"></i></a>
                      <br>
                      <a href="#" data-toggle="modal" data-target="#myModal-director-1"><p class="more-plus">More +</p></a>
                    </div>
  				</div>
           </div>
           <div class="director-text text-center">
            <a href="#" data-toggle="modal" data-target="#myModal-director-1"><h5>Mr. Jaison Panikulangara</h5></a>
            <p>Chairman</p>
           </div>
         </div>
         <div class="col-md-15 col-sm-6">
           <div class="directors-inside">
             <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/director-2.jpg" class="img-responsive director-img">
              <div class="director-overlay">
                <div class="hover-content">
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <br>
                  <a href="#" data-toggle="modal" data-target="#myModal-director-2"><p class="more-plus">More +</p></a>
                </div>
  			  </div>
           </div>
           <div class="director-text text-center">
                <a href="#" data-toggle="modal" data-target="#myModal-director-2"><h5>Mr. Arjun J Panikulangara</h5></a>
                <p>Managing Director</p>
           </div>
         </div>
         <div class="col-md-15 col-sm-6">
           <div class="directors-inside">
             <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/director-3.jpg" class="img-responsive director-img">
              <div class="director-overlay">
                <div class="hover-content">
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <br>
                  <a href="#" data-toggle="modal" data-target="#myModal-director-3"><p class="more-plus">More +</p></a>
                </div>
  			  </div>
           </div>
           <div class="director-text text-center">
                <a href="#" data-toggle="modal" data-target="#myModal-director-3"><h5>Ms. Niya Panikulangara</h5></a>
                <p>Director Admin</p>
          </div>
         </div>
         <div class="col-md-15 col-sm-6">
           <div class="directors-inside">
             <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/director-4.jpg" class="img-responsive director-img">
              <div class="director-overlay">
                <div class="hover-content">
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <br>
                  <a href="#" data-toggle="modal" data-target="#myModal-director-4"><p class="more-plus">More +</p></a>
                </div>
  			  </div>
           </div>
           <div class="director-text text-center">
                <a href="#" data-toggle="modal" data-target="#myModal-director-4"><h5>Mr. Jomon Joichan</h5></a>
                <p>Director Technical</p>
           </div>
         </div>
         <div class="col-md-15 col-sm-6">
           <div class="directors-inside">
             <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/director-5.jpg" class="img-responsive director-img">
              <div class="director-overlay">
                <div class="hover-content">
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <br>
                  <a href="#" data-toggle="modal" data-target="#myModal-director-5"><p class="more-plus">More +</p></a>
                </div>
  			  </div>
           </div>
           <div class="director-text text-center">
            <a href="#" data-toggle="modal" data-target="#myModal-director-5"><h5>Ms. Arya Jomon</h5></a>
            <p>Director Finance</p>
           </div>
         </div>
	</div>
   </div>
   </section>
   <section id="contact" class="kind-contact">
     <div class="container">
      <div class="contact-heading text-center">
        <h4>FEEL FREE TO</h4>
        <h1>CONTACT US</h1>
      </div>
       <div class="row">
         <div class="col-md-12">
           <?php
            $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                'id'=>'admin-form',
                'enableAjaxValidation'=>true,//form-inline
                'htmlOptions'=>array('class'=>'form-inline')                
            )); ?> 
      			<div class="form-group col-md-3">
          		  <?php echo $form->labelEx($enquiry,'full_name'); ?>
                  <?php echo $form->textField($enquiry, 'full_name', array('class'=>'form-control-2','placeholder' => 'Full Name','autocomplete'=>'off','data-validation'=>"required")); ?>
                  <?php echo $form->error($enquiry,'full_name',array('style'=>'color:#FF0000'));?>
     			</div>
      			<div class="form-group col-md-3">
          		  <?php echo $form->labelEx($enquiry,'email_id'); ?>
                  <?php echo $form->textField($enquiry, 'email_id', array('class'=>'form-control-2','placeholder' => 'Email Id','autocomplete'=>'off','data-validation'=>"required")); ?>
                  <?php echo $form->error($enquiry,'email_id',array('style'=>'color:#FF0000'));?>
      			</div>
      			<div class="form-group col-md-3">
                    <?php echo $form->labelEx($enquiry,'country_code'); ?>
                    <?php echo $form->dropDownList($enquiry, 'country_code', CHtml::listData(Country::model()->findAll(), 'id', 'country_phone_code'),array('empty'=>'Select Code','class'=>'form-control-2 select2','data-validation'=>"required",'data-placeholder'=>"Select Code")); ?>
                    <?php echo $form->error($enquiry,'country_code',array('style'=>'color:#FF0000'));?>
      			</div>
      			<div class="form-group col-md-3">
        			<?php echo $form->labelEx($enquiry,'mobile_number'); ?>
                    <?php echo $form->textField($enquiry, 'mobile_number', array('class'=>'form-control-2','placeholder' => 'Mobile Number','autocomplete'=>'off','data-validation'=>"required")); ?>
                    <?php echo $form->error($enquiry,'mobile_number',array('style'=>'color:#FF0000'));?>
      			</div>
      			<div class="form-group col-md-9">
    				<?php echo $form->labelEx($enquiry,'address'); ?>
                    <?php echo $form->textArea($enquiry, 'address', array('class'=>'form-control-2 textarea_style','placeholder' => 'Comment','data-validation'=>"required",'rows'=>'1','value'=>'Hello, I would like to know more about Forkind NoQ Privilege Card. Please send me more details.')); ?>
                    <?php echo $form->error($enquiry,'address',array('style'=>'color:#FF0000'));?>
  				</div>
                <div class="form-group col-md-3 col-sm-12 mrgin-5 text-center">
                  <?php $this->widget('bootstrap.widgets.TbButton', array(
                		'buttonType'=>'submit',
                		'type'=>'primary',
                	    'htmlOptions'=>array('id'=>'submit_reg','class'=>'btn btn-1'),
                		'label'=>'SUBMIT NOW',
                	)); ?>
                </div>
    		<?php $this->endWidget(); ?>
         </div>
       </div>
     </div>
   </section>
   <style>
   .select2-container .select2-selection--single{height:53px;}
   .select2-container--default .select2-selection--single .select2-selection__arrow{height: 43px;}
   .select2-container--default .select2-selection--single .select2-selection__rendered{line-height: 45px;}
   </style>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form-validator.min.js"></script> 
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweetalert2.all.min.js"></script>
   <script type="text/javascript">
   $(function () {
		$('.select2').select2()
	})
   $('.exclusive-inside').on('click',function(){
		linkRef = $(this).attr('id');
		window.location.href = Baseurl+'/site/content/'+linkRef;
   });
   $(document).ready(function(){
		<?php if (Yii::app()->user->hasFlash('success_flash_msg')){?>
		//setTimeout(function(){
			swal({
			  position: 'top-end',
			  type: 'success',
			  title: '<?php echo Yii::app()->user->getFlash('success_flash_msg'); ?>',
			  showConfirmButton: false,
			  timer: 4000
			})
		//}, 2000);
		<?php } ?>
		<?php if (Yii::app()->user->hasFlash('error_flash_msg')){?>
		//setTimeout(function(){
			swal({
			  position: 'top-end',
			  type: 'error',
			  title: '<?php echo Yii::app()->user->getFlash('error_flash_msg'); ?>',
			  showConfirmButton: false,
			  timer: 4000
			})
		//}, 2000);
		<?php } ?>
	});
   $.validate({
	    //modules : 'date'
	});
   </script>