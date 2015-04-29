<?php class Images{
    
    public function  __construct() {
    }

	function extension_archivo ($ruta) {
    	$res = explode(".", $ruta);
	    $extension = $res[count($res)-1];
    	return $extension;
	}

	static public function cambiartam($nombre,$archivo,$ancho,$alto){
		$ext=Images::extension_archivo($nombre);
		if($ext=='png'){
			$imagen= imagecreatefrompng($nombre);
		}elseif($ext=='gif'){
			$imagen = imagecreatefromgif($nombre);
		}else{
			$imagen = imagecreatefromjpeg($nombre);
		}
		$x=imageSX($imagen);
		$y=imageSY($imagen);
		if ($x > $y){
			$w=$ancho;
			$h=$y*($alto/$x);
		}
		if ($x < $y){
			$w=$x*($ancho/$y);
			$h=$alto;
		}
		if ($x == $y){
			$w=$ancho;
			$h=$alto;
		}
		$destino=ImageCreateTrueColor($w,$h);
		imagealphablending($destino, false);     // desactivo el procesamiento automatico de alpha
		imagesavealpha($destino, true);         // hago que el alpha original se grabe en el archivo destino
		imagecopyresampled($destino,$imagen,0,0,0,0,$w,$h,$x,$y); 
		if($ext=='png'){
			imagepng($destino, $archivo);
		}elseif($ext=='gif'){
			imagegif($destino, $archivo);
		}else{
			imagejpeg($destino, $archivo,70);
		}
		imagedestroy($destino); 
		imagedestroy($imagen);
		return $archivo;
	}
	
	public function existe($link){
		$default=Path."/images/motoclub_default.png";
		$f=file_exists(Image_Path.$link);
		if($f)
			$default=Path.$link;
		return $default;
	}

    //como usarlo 
    //echo $archivo=Images::cambiartam("{$ruta}", "{$ruta}", 200, 200);
}?>