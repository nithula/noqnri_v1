<footer class="kind-footer">
     <div class="container">
       <div class="row">
         <div class="col-md-2">
           <div class="footer-logo">
             <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" class="img-responsive">
             <div class="footer-socio">
               <a href="#"><i class="fa fa-facebook"></i></a>
             <a href="#"><i class="fa fa-twitter"></i></a>
             <a href="#"><i class="fa fa-google-plus"></i></a>
             <a href="#"><i class="fa fa-youtube-play"></i></a>
             </div>
             
           </div>
         </div>
         <div class="col-md-10">
          <div class="row inside-contact">
           <div class="col-md-4">
            <div class="col-md-3">
              <div class="inside-contact-icon">
               <i class="icon-Asset-2"></i>
             </div>
            </div>
            <div class="col-md-9">
              <div class="inside-contact-text">
                <h5>LOCATE US</h5>
                <p>Kumaraserry P.O,
				   Ernakulam, Kochi - 683 579
				</p>
              </div>
            </div>
             
           </div>
           <div class="col-md-4">
            <div class="col-md-3">
              <div class="inside-contact-icon">
               <i class="icon-Asset-3"></i>
             </div>
            </div>
            <div class="col-md-9">
              <div class="inside-contact-text">
                <h5>CALL US</h5>
                <p>+91 9447 157109 <br>
                   +91 8111 828877</p>
              </div>
            </div>
             
           </div>
           <div class="col-md-4">
            <div class="col-md-3">
              <div class="inside-contact-icon">
               <i class="icon-Asset-4"></i>
             </div>
            </div>
            <div class="col-md-9">
              <div class="inside-contact-text">
                <h5>MAIL US</h5>
                <p>info@noqnri.com<br>
                   mail@noqnri.com</p>
              </div>
            </div>
             
           </div>
           </div>
           <div class="row kind-sub-footer align-center-custom">

            <div class="col-md-6">
              <ul type="none">
                <li><a href="#">Privacy Policy</a></li>
                <li>|</li>
                <li><a href="#">Terms of use</a></li>
              </ul>
            </div>

            <div class="col-md-6 text-right align-center-custom">
              <ul type="none">
                <li><i class="fa fa-copyright" aria-hidden="true"></i> 2018 Forkind</li>
                <li>|</li>
                <li><a href="#">All right reserved</a></li>
              </ul>
            </div>
             
           </div>
         </div>
       </div>
     </div>
   </footer>



    <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/select2.full.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>
	<script type="text/javascript">
	// ===== Scroll to Top ==== 
	$(window).scroll(function() {
	    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
	        $('#return-to-top').fadeIn(200);    // Fade in the arrow
	    } else {
	        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
	    }
	});
	$('#return-to-top').click(function() {      // When arrow is clicked
	    $('body,html').animate({
	        scrollTop : 0                       // Scroll to top of body
	    }, 500);
	});
	$(document).on('click', 'a[href^="#"]', function(e) {
	    var id = $(this).attr('href');
	    var $id = $(id);
	    console.log($id);
	    if ($id.length === 0) {
	        return;
	    }
	    e.preventDefault();
	    var pos = $id.offset().top-90;
	    $('body, html').animate({scrollTop: pos});
	
	});
	$('.navbar-nav').on('click', 'li', function() {
	    $('.navbar-nav  li.active').removeClass('active');
	    $(this).addClass('active');
	});
	</script>
  </body>
</html>
