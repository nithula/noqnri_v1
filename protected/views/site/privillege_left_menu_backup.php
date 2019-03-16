<div class="hsptl-tab-head-side">
   <h3>Categories </h3>
</div>
<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
function get_array_values($arr){
    $retStr = '<ul class="tree-parent collapse sub-li-menu">';
	$i=$i;
	foreach ($arr as $key=>$val){
		$url=$val['id'];
		$cat_name = $val['category'];
		$image = ($val["image"]!=NULL)?'<img class="fixd-25-img" src="'.$actual_link.'/forkind/uploads/category/'.$val["image"].'">':'<img class="fixd-25-img" src='.Yii::app()->baseurl.'/images/25X25.png>';
		if($flag==0){
		    $link = "javascript:void(0);";
		}else{
		    $link = Yii::app()->baseurl."/site/content/".$flag;
		}
		if (count($val['Children'])>0){
		    $retStr .= '<li>'.$image.' <a href="'.$link.'" id="'.$url.'" ref="'.$cat_name.'">'.$val['category'].' </a>' . get_array_values($val['Children'],$i) . '</li>';
		}else{
		    $retStr .= '<li>'.$image.' <a href="'.$link.'" id="'.$url.'" ref="'.$cat_name.'">'.$val['category'].'</a></li>';
		}
		$i++;
	}
	$retStr .= '</ul>';
	return $retStr;
}?>

<ul class="nav nav-pills nav-stacked admin-menu" id="sidebar-menu">
  <?php $i=0;foreach ( $privilegeList as $categories) {
        $class=($categories->id==$categoryDetails->id)?"active":"";
  		?>
			<?php
			if (Partner::model()->check_last_child($categories->id )) {
			        $cat = Partner::model()->get_child_cat ( $categories['id'] );
			        $side_icon = '<i class="fa fa-caret-right pull-right"></i>';
				} else {
					$cat = array ();
					$side_icon = '';
				}?>
				<?php if($flag==0){
				    $link = "javascript:void(0);";
				}else{
				    $link = Yii::app()->baseurl."/site/content/".$flag;
				}?>
				<?php if($categories["category_image"]!=NULL){?>
					<li id="<?php echo $i;?>" class='<?php echo $class;?>'><a href="<?php echo $link;?>" ref="<?php echo $categories['category'];?>" id="<?php echo $categories['id'];?>"><img class="fixd-25-img" src="<?php echo $actual_link;?>/forkind/uploads/category/<?php echo $categories["category_image"];?>"> <?php echo $categories['category'];?><?php echo $side_icon;?></a>
				<?php }else{?>
					<li id="<?php echo $i;?>" class='<?php echo $class;?>'><a href="<?php echo $link;?>" ref="<?php echo $categories['category'];?>" id="<?php echo $categories['id'];?>"><img class="fixd-25-img" src="<?php echo Yii::app()->baseurl.'/images/25X25.png';?>"> <?php echo $categories['category'];?><?php echo $side_icon;?></a>
				<?php }?>				
				<?php if(count($cat)>0){
					echo get_array_values($cat);
				}?>
		</li>
  <?php $i++;} ?> 
</ul>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
<script>
$(function () {
    $("#sidebar-menu li > a").click(function(e) {
    	$('.admin-menu li').removeClass('active');
    	$(this).closest('li').addClass('active');
        var link = $(this);
        var flagLink = '<?php echo $flag;?>';
        e.preventDefault();
        link.next().toggle("slow");
        link.toggleClass("active");
        id = $(this).attr('id');
        $('.innerContent').html('<img src="<?php echo Yii::app()->request->baseUrl;?>/images/Loader3.gif" alt="Loading">').css({'text-align':'center'});
		if(flagLink==0){
            $.ajax({
    			type: "POST",
    			url:'<?php echo Yii::app()->request->baseUrl;?>/site/RenderDetail',
    			data:{'id':id},
    		    success: function(res) 
    		    {
    		    	$('.innerContent').html(res).css({'text-align':'left'});return false;
    			}
    		});
		}else{
			$.ajax({
    			type: "POST",
    			url:'<?php echo Yii::app()->request->baseUrl;?>/site/RenderList',
    			data:{'id':id},
    		    success: function(res) 
    		    {
    		    	$('.innerContent').html(res).css({'text-align':'left'});return false;
    			}
    		});
		}
    });
});
</script>
