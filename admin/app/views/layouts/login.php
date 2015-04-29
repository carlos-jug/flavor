<!DOCTYPE html>  
<html lang="es">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title_for_layout; ?></title>
		<?php echo $this->html->charsetTag("UTF-8"); ?>
		<?php echo $this->html->includeCss("login"); ?>
    	<script type="text/javascript">var Path =  '<?php echo Path; ?>';</script>
        <meta name="description" content="Desarrollo creado por MausHaus Casa creativa S.C.">
        <meta name="author" content="Carlos Jug">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
		<div id="main">
			<?php echo $content_for_layout?>
		</div>
    </body>
</html>