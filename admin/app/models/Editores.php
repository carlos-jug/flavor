<?php class Editores extends models{

	public function __construct(){
		parent::__construct();
	}

	private $count;
    
    public function getCount(){
        return $this->count;
    }
    
	public function get_all($fields=null, $order=null, $limit=null, $extra=null){
	    $limitQuery = is_null($limit)?"":" {$limit}";
        $result = $this->findAll("SQL_CALC_FOUND_ROWS *", $order, $limitQuery, $extra);
        $rs = $this->db->query("SELECT FOUND_ROWS() as foundRows");
        $row = $this->db->fetchRow();
        $this->count = $row['foundRows'];
        return $result;
    }
    
    public function imagen($nombre_imagen){
        if (($_FILES[$nombre_imagen]["type"] == "image/gif")
          || ($_FILES[$nombre_imagen]["type"] == "image/jpeg")
          || ($_FILES[$nombre_imagen]["type"] == "image/pjpeg")
          || ($_FILES[$nombre_imagen]["type"] == "image/png")
           ){
            $imagen = time()."_".$_FILES[$nombre_imagen]['name'];
            $ruta = "../images/editores/".$imagen;
            copy($_FILES[$nombre_imagen]['tmp_name'], $ruta);
            return $imagen;
        }else{
            return '';
        }
    }
	
	public function extension_archivo($ruta) {
		$res = explode(".", $ruta);
		$extension = $res[count($res)-1];
		return $extension;
	}
	
	public function cambiartam($nombre,$archivo,$ancho,$alto){
		$ext=$this->extension_archivo($nombre);
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
			imagejpeg($destino, $archivo,90);
		}
		imagedestroy($destino); 
		imagedestroy($imagen);
		return $archivo;
	}
	
} ?>