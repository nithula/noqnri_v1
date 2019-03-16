<div class="row">
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
</div>
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