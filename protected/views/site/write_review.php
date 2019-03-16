<button type="button" class="close" data-dismiss="modal">&times;</button>  
<?php
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'wite_review',
    'enableAjaxValidation'=>true,
));
?> 
<div class="row">
    <div class="col-md-12">
     <div class="box box-primary">
           <div class="box-body">
    			<div class="form-group">
                  <div class="form-group">
                      <?php echo $form->labelEx($review,'name'); ?>
                      <?php echo $form->textField($review,'name',array('class'=>'form-control','maxlength'=>16,'placeholder'=>'Name','autocomplete'=>'off','data-validation'=>"required",'value'=>'')); ?>
                      <?php echo $form->error($review,'name'); ?>
                  </div>
                  <div class="form-group">
                      <?php echo $form->labelEx($review,'email'); ?>
                      <?php echo $form->textField($review,'email',array('class'=>'form-control','maxlength'=>150,'placeholder'=>'Email','autocomplete'=>'off','value'=>'')); ?>
                      <?php echo $form->error($review,'email'); ?>
                  </div>
                  <div class="form-group">
                      <?php echo $form->labelEx($review,'review'); ?>
                      <?php echo $form->textArea($review,'review',array('class'=>'form-control','placeholder'=>'Review','autocomplete'=>'off','data-validation'=>"required",'value'=>'')); ?>
                      <?php echo $form->error($review,'review'); ?>
                  </div>
                  <div class="form-group">
                  		<?php echo $form->labelEx($review,'rating'); ?>
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="Review[rating]" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4half" name="Review[rating]" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            <input type="radio" checked id="star4" name="Review[rating]" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3half" name="Review[rating]" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                            <input type="radio" id="star3" name="Review[rating]" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2half" name="Review[rating]" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            <input type="radio" id="star2" name="Review[rating]" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1half" name="Review[rating]" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                            <input type="radio" id="star1" name="Review[rating]" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            <input type="radio" id="starhalf" name="Review[rating]" value=".5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                        </fieldset>
                  </div>
                  <div class="form-group" style="float: right;">
                  		<span id="error_showing"></span>
                    	<img id="loading_img" src="<?php echo Yii::app()->request->baseUrl; ?>/images/loading_second.gif" style="display: none;">
                        <?php $this->widget('bootstrap.widgets.TbButton', array(
                    		'buttonType'=>'submit',
                    		'type'=>'primary',
                    	    'htmlOptions'=>array('id'=>'write_review'),
                    	    'label'=>'Submit Review',
                    	)); ?>
                    	<input type="hidden" value="<?php echo $partnerDetail->id;?>" name="Review[partner_id]">
                	  	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            	 	</div>
    			</div> 
    		</div>
    	</div>
    </div>
</div>
<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}
.rating > .half:before { 
  content: "\f089";
  position: absolute;
}
.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/
.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */
.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
<?php $this->endWidget();?>  
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form-validator.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	$('#wite_review')[0].reset();
});
$.validate({
    //modules : 'date'
});
</script>