<main>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-offset-3 col-sm-6">
            <div class="data-sec">
            <h2 class="dat-title text-center">Data Enquiry</h2>
              <div class="data-item">
                <div class="row d-flex align-items-center">
                  <div class="col-sm-5 offset-1"><h3>Name:</h3></div>
                  <div class="col-sm-6">
                    <h4><?php echo $modelData->full_name;?></h4>
                  </div>
                </div>  
              </div>
              <div class="data-item">
                <div class="row d-flex align-items-center">
                  <div class="col-sm-5 offset-1"><h3>mail:</h3></div>
                  <div class="col-sm-6">
                    <h4><?php echo $modelData->email_id;?></h4>
                  </div>
                </div>  
              </div>
              <div class="data-item">
                <div class="row d-flex align-items-center">
                  <div class="col-sm-5 offset-1"><h3>Mobile Number:</h3></div>
                  <div class="col-sm-6">
                    <h4><?php echo $modelData->country_code." ".$modelData->mobile_number;?></h4>
                  </div>
                </div>  
              </div>
              <div class="data-item">
                <div class="row d-flex align-items-center">
                  <div class="col-sm-5 offset-1"><h3>Enquiry:</h3></div>
                  <div class="col-sm-6">
                    <h4><?php echo nl2br($modelData->address);?></h4>
                  </div>
                </div>  
              </div>
              <?php if($modelData->status=="Y" || $modelData->replay!=NULL){?>
                  <div class="data-item">
                    <div class="row d-flex align-items-center">
                      <div class="col-sm-5 offset-1"><h3>Replay:</h3></div>
                      <div class="col-sm-6">
                        <h4><?php echo ($modelData->replay)?$modelData->replay:'Not updated yet';?></h4>
                      </div>
                    </div>  
                  </div>
              <?php }?>
              <div class="data-item">
                <div class="row d-flex">
                  <div class="col-12">
                  	<h3 class="text-center">Status:
                  	<?php if($modelData->status=="Y"){?>
                  		<span class="data-message-success">Your request has been approved</span>
                  	<?php }else if($modelData->status=="N" && $modelData->replay==NULL){?>
                  		<span class="data-message-eroor">Your request under process</span>
                  	<?php }else{?>
                  		<span class="data-message-eroor">Your request has been rejected</span>
                  	<?php }?>
                  	</h3>
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <style>
  main section {
  position: relative;
  /*background-image: url(../img/main-bg-2.jpg);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;*/
  padding: 4.65% 0;
  background-color: #f1f1f1;
}
main section:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.4);
  display: none;
}
main .data-sec {
  position: relative;
  background: #fff;
  border-radius: 12px;
  padding: 30px;
  box-shadow: 0 0 30px 12px rgba(51, 51, 51, 0.05);
  border: 2px solid #08b9aa;
  /*min-height: 410px;
  max-height: 410px;*/
  z-index: 1;
}
main .dat-title {
    position: relative;
    font-size: 26px;
    font-weight: 600;
    letter-spacing: 1px;
    color: #333;
    margin-bottom: 45px;
}
main .data-item {
  margin-top: 16px;
  padding: 8px 0;
  word-break: break-all;
}
main .data-item > div div:first-child {
  text-align: right;
}
main .data-item h3 {
  font-size: 15px;
  color: #333;
  letter-spacing: .5px;
  font-weight: 600;
  margin:0;
}
main .data-item h4 {
  font-size: 15px;
  color: #333;
  font-weight: 600;
  margin:0;
}
main .dat-title:after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 55px;
    height: 3px;
    bottom: -18px;
    background: #08b9aa;
    border-radius: 35px;
}
main .data-item:last-child {
    border-top: 1px solid #000;
    margin-top: 25px;
    padding-top: 15px;
}
main .data-message {
  margin: 35px 0 10px 0;
}
main .data-message p {
  font-size: 17px;
}
main .data-message-eroor {
  color: #ee5222;
}
main .data-message-success {
  color: #08b9aa;
}
</style>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>