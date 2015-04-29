<div class="wrapper error" style="display: inline-block; width: 100%">
	<div class="main-content">
        <div class="perfil" class="clearfix datos-perfil">
            <div class="left_column" style="float: left; padding: 50px 70px 50px 30px;">
                <div class="imagen-icon-big-alert">
                    <img src="<?=Path;?>/images/Alerta.png">
                </div> 
            </div>
            <div class="right_column">
                <br /><br />
            	<div id="panel">
                    <h1>Error</h1>
                    <div class="pleca"></div>
                    <ul>
                    	<?php
							if ($error_string["code"] == "") {
								$code = "404";
							} else {
								$code = $error_string["code"];
							}
							
							if ($error_string["message"] == "") {
								$message = "No se ha encontrado la página que buscas o ya no existe";
							} else {
								$message = $error_string["message"];
							}
						?>
                    	<li><span class="e_code"><?php echo $code; ?></span></li>
                        <li><span class="e_message"><?php echo $message; ?></span></li>
                        <li>Si crees que esto es un fallo, te agradeceremos si lo reportas a:</li>
                        <li class="e_mail"><a href="mailto:carlos@jug.mx">carlos@jug.mx</a></li>
                    </ul>
                </div>
			</div>
        </div>
	</div>
</div>
