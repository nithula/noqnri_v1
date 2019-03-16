<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png">
        <title><?php echo $this->pageTitle?></title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/navbar-fixed-top.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" rel="stylesheet"> 
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweetalert2.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/star-rating-svg.css">
    </head>
    <body>
    <script type="text/javascript">
    	var Baseurl = '<?php echo Yii::app()->request->baseUrl; ?>';
    </script>
	<body class="hold-transition skin-blue sidebar-mini">
        <?php echo $this->renderPartial('//layouts/header', array()); ?>
        <div class="content-wrapper">
        	<?php echo $content; ?>
        </div>
        <?php echo $this->renderPartial('//layouts/footer', array()); ?>
	</body>
	<div class="se-pre-con"></div>
</html>
