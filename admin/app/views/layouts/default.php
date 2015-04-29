<!DOCTYPE html>
<html lang="es" xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<title><?=$title_for_layout; ?></title>
		<meta name="description" content="Desarrollado por Juice Consultoria & Desarrollo" />
		<meta name="author" content="Carlos Jug" />
        <?=$this->html->charsetTag("UTF-8");?>
		<?=$this->html->includeCss("bootstrap.min");?>
		<?=$this->html->includeCss("sb-admin");?>
		<?=$this->html->includeCss("plugins/morris");?>
		<?=$this->html->includeCss("../fonts/font-awesome/css/font-awesome.min");?>
		<?=$this->html->includeCss("style");?>
		<!-- <link rel="shortcut icon" href="<?php echo Path; ?>/sisadmin/images/logos/"> -->
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body id="<?=$controllerName;?>" class="<?=$function;?>">
		
		<div id="wrapper">
	        <?=$this->renderElement("menu");?>
	        <div id="page-wrapper">
	            <div class="container-fluid">
					<?=$content_for_layout;?>
	            </div>
	        </div>
	    </div>
		
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	    <?=$this->html->includeJs("bootstrap.min");?>
	    <?=$this->html->includeJs("script");?>
  </body>
</html>