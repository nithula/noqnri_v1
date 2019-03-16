<?php
$this->breadcrumbs = array(
    'Error '.$error['code'],
);?>
<div class="box">
    <div class="box-body" style="text-align: center;">
    	<?php if($error['code']=='401'){?>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/401.png">
		<?php }else{?>
		    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/404.png">
		<?php }?>
	</div>
</div>