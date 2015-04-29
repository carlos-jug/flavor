<?php

class html extends singleton {

	protected $registry;
	protected $validateErrors;
	protected $path;
	public $type = "views";

	public function __construct() {
		$this->registry = registry::getInstance();
		$this->path = $this->registry["path"];
	}

	public function useTheme($name) {
		$this->type = $name;
		$this->type= "themes/".$this->type;
	}

	public static function getInstance($class = null) {
		return parent::getInstance(get_class());
	}

	public function includeCanonical($url = ""){
		$canonical = "<link rel=\"canonical\" href=\"".$this->path.$url."\" />";
		return $canonical;
	}
	
	public function charsetTag($charSet) {
		$charSet = "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".$charSet."\"/>\n";
		return $charSet;
	}

	public function includeCss($css) {
		$css = "<link rel=\"stylesheet\" href=\"".$this->path."app/".$this->type."/css/".$css.".css\" type=\"text/css\" />\n";
		return $css;
	}

	public function includeCssAbsolute($css) {
		$css = "<link rel=\"stylesheet\" href=\"".$this->path."app/libs/".$css.".css\" type=\"text/css\" />\n";
		return $css;
	}

	public function includeJs($js) {
		if($this->type == "views"){
			$js = "<script type=\"text/javascript\" src=\"" . $this->path . "app/libs/js/" . $js . ".js\"></script>\n";
		}else{
			$js = "<script type=\"text/javascript\" src=\"" . $this->path . "app/" . $this->type . "/js/" . $js . ".js\"></script>\n";
		}
		return $js;
	}

	public function includeJsAbsolute($js) {
		$js = "<script type=\"text/javascript\" src=\"".$this->path."app/libs/js/".$js.".js\"></script>\n";
		return $js;
	}

	public function includePluginFacebox() {
		$js = $this->includeCss("facebox");
		$js .= "\t<script type=\"text/javascript\">\n";
		$js .= "\t	var path = '".$this->path."';\n";
	  	$js .= "\t</script>\n";
		$js .= $this->includeJs("facebox");
		$js .= "\t<script type=\"text/javascript\">\n";
		$js .= "\t	jQuery(document).ready(function($) {\n";
		$js .= "\t	  $('a[rel*=facebox]').facebox() \n";
		$js .= "\t	})\n";
	  	$js .= "\t</script>\n";
		return $js;
	}

	public function includeFavicon($icon="favicon.ico") {
		$favicon = "<link rel=\"shortcut icon\" href=\"".$this->path.'app/'.$this->type."/images/".$icon."\" />\n";
		return $favicon;
	}

	public function includeRSS($rssUrl="feed/rss/") {
		$rss = "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS 2.0\" href=\"".$this->path.$rssUrl."\" />\n";
		return $rss;
	}

	public function includeATOM($atomUrl="feed/atom/") {
		$atom = "<link rel=\"alternate\" type=\"application/atom+xml\" title=\"Atom 1.0\" href=\"".$this->path.$atomUrl."\" />\n";
		return $atom;
	}

	public function validateError($field) {
		$html = "";
		$this->validateErrors = (isset($_SESSION["flavor_php_session"]["validateErrors"])) ? $_SESSION["flavor_php_session"]["validateErrors"] : NULL ;
		if (!is_null($this->validateErrors)) {
			if ($val = $this->findInArray($this->validateErrors, $field) ) {
				$html = "<div class=\"error\">".$val."</div>";
				$this->unsetError($field);
			}
		}		
		return $html;
	}

	/* Esta funci�n es para ser utilizada por validateError($field){...} */
	private function unsetError($field){
		if(is_array($_SESSION["flavor_php_session"]["validateErrors"])){
			foreach($_SESSION["flavor_php_session"]["validateErrors"] as $k => $v){
				if(is_array($v)){
					foreach($v as $kk => $vv){
						if($kk == $field){
							unset($_SESSION["flavor_php_session"]["validateErrors"][$k][$kk]);
						}
					}
				}
			}
		}
		return false;
	}
	
	private function findInArray($arr, $str) {
		$response = "";
		foreach ($arr as $key=>$element){
			foreach ($element as $name=>$value){
				if ($name == $str) {
					$response = $value['message'];
				}
			}    
		}
		return $response;
	}

	public function form($url, $method="POST" , $html_attributes = ""){
		return "<form action=\"".$this->path.$url."\" method=\"" . $method. "\" " . $html_attributes .">";
	}
	
	public function formAbsolute($url, $method="POST" , $html_attributes = ""){
		return "<form action=\"".$url."\" method=\"" . $method. "\" " . $html_attributes .">";
	}

	public function formFiles($url){
		return "<form action=\"".$this->path.$url."\" method=\"post\" enctype=\"multipart/form-data\">";
	}

	public function linkTo($text, $url="", $html_attributes="", $absolute = false) {
		$html = "<a href=\"".(!$absolute?$this->path:'').$url;
		$html .= "\"";
		$html .= " $html_attributes ";
		$html .= ">".$text."</a>";
		return $html;
	}

	public function linkToConfirm($text, $url="", $html_attributes=""){
		$html = $this->linkTo($text, $url, "$html_attributes onclick=\"return confirm('¿Estás seguro??');\"");
		return $html;
	}

	public function image($name, $alt=""){
		return "<img src=\"".$this->path.'app/'.$this->type."/images/".$name."\" alt=\"".$alt."\" title=\"".$alt."\" />";
	}

	public function imageAbsolute($name, $alt="", $html_attributes = ""){
		return "<img src=\"".$name."\" alt=\"".$alt."\" title=\"".$alt."\" $html_attributes />";
	}

	public function imageLink($text, $url="", $html_attributes="", $name, $alt=""){
		$html = "<a href=\"".$this->path.$url;
		$html .= "\"";
		$html .= " $html_attributes ";
		$html .= ">";
		$html .= "<img src=\"".$this->path.'app/'.$this->type."/images/".$name."\" alt=\"".$alt."\" title=\"".$alt."\" />";
		$html .= "</a>";
		return $html;
	}

	public function imageLinkConfirm($text, $url="", $name, $alt=""){
		$html = $this->imageLink($text,$url,"onclick=\"return confirm('¿Estás seguro??');\"",$name,$alt);
		return $html;
	}

	public function checkBox($name, $html_attributes=""){
		$html = "<input type=\"checkbox\" name=\"".$name."\"";
		$html .= $html_attributes;
		$html .= " />\n";
		return $html;
	}
		
	public function radioButton($name, $value, $html_attributes=""){
		$html = "<input type=\"radio\" value=\"".$value."\" name=\"".$name."\" ";
		$html .= $html_attributes;
		$html .= " />";
		return $html;
	}
	
	public function textField($name, $value="", $html_attributes=""){
		$html = "<input type=\"text\" name=\"".$name."\" id=\"".$name."\" value=\"$value\" ";
		$html .= $html_attributes;
		$html .= " />";
		return $html;
	}
	
	public function textArea($name, $value="", $html_attributes=""){
		$html = "<textarea id=\"".$name."\" name=\"".$name."\" ";
		$html .= $html_attributes;
		$html .= ">";
		$html .= $value;
		$html .= "</textarea>";
		return $html;
	}
	
	public function hiddenField($name, $value= "", $html_attributes=""){
		$html = "<input type=\"hidden\" name=\"".$name."\" value=\"$value\"";
		$html .= $html_attributes;
		$html .= " />";
		return $html;
	}
	
	public function passwordField($name, $value, $html_attributes=""){
		$html = "<input type=\"password\" name=\"".$name."\" value=\"$value\" ";
		$html .= $html_attributes;
		$html .= " />";
		return $html;
	}

	public function select($name, $values, $selected="", $numericKey=false, $html_attributes="") {
		$html = "<select class=\"element\" name=\"".$name."\" ".$html_attributes.">\n";
		foreach ($values as $key=>$value){
			$html .= "\t<option ";
			if (!$numericKey) {
				if (is_numeric($key)){
					$key = $value;
				}
			}
			$html .= " value=\"$key\"";
			if($selected==$key){
				$html .= " selected=\"selected\"";
			}
			$html .= ">$value</option>\n";
		}		
		$html .= "</select>\n";
		return $html;
	}
        
    // Function to create a html select component from a model result.
    public function selectFromModel($name, $items, $selected="", $descriptionKey=NULL, $valueKey=NULL, $htmlAttributs = ""){
        $html = "<select name=\"".$name."\" $htmlAttributs>\n";
        foreach ($items as $key => $item){
            $html .= "\t<option";

            // Set value 
            $value = $valueKey == NULL ? $key : ( isset($item[$valueKey])? $item[$valueKey] : $key );
            $html .= " value=\"$value\"";
            if($selected == $value){
                    $html .= " selected=\"selected\"";
            }
            
            // Set description
            $description = $descriptionKey == NULL ? $item : ( isset($item[$descriptionKey])? $item[$descriptionKey] : $item ); ;
            $html .= ">$description</option>\n";
        }
        $html .= "</select>\n";
        return $html;
    }
	
	public function num2letras($num, $fem = false, $dec = true) {
		$matuni[2] = "dos";
		$matuni[3] = "tres";
		$matuni[4] = "cuatro";
		$matuni[5] = "cinco";
		$matuni[6] = "seis";
		$matuni[7] = "siete";
		$matuni[8] = "ocho";
		$matuni[9] = "nueve";
		$matuni[10] = "diez";
		$matuni[11] = "once";
		$matuni[12] = "doce";
		$matuni[13] = "trece";
		$matuni[14] = "catorce";
		$matuni[15] = "quince";
		$matuni[16] = "dieciseis";
		$matuni[17] = "diecisiete";
		$matuni[18] = "dieciocho";
		$matuni[19] = "diecinueve";
		$matuni[20] = "veinte";
		$matunisub[2] = "dos";
		$matunisub[3] = "tres";
		$matunisub[4] = "cuatro";
		$matunisub[5] = "quin";
		$matunisub[6] = "seis";
		$matunisub[7] = "sete";
		$matunisub[8] = "ocho";
		$matunisub[9] = "nove";

		$matdec[2] = "veint";
		$matdec[3] = "treinta";
		$matdec[4] = "cuarenta";
		$matdec[5] = "cincuenta";
		$matdec[6] = "sesenta";
		$matdec[7] = "setenta";
		$matdec[8] = "ochenta";
		$matdec[9] = "noventa";
		$matsub[3] = 'mill';
		$matsub[5] = 'bill';
		$matsub[7] = 'mill';
		$matsub[9] = 'trill';
		$matsub[11] = 'mill';
		$matsub[13] = 'bill';
		$matsub[15] = 'mill';
		$matmil[4] = 'millones';
		$matmil[6] = 'billones';
		$matmil[7] = 'de billones';
		$matmil[8] = 'millones de billones';
		$matmil[10] = 'trillones';
		$matmil[11] = 'de trillones';
		$matmil[12] = 'millones de trillones';
		$matmil[13] = 'de trillones';
		$matmil[14] = 'billones de trillones';
		$matmil[15] = 'de billones de trillones';
		$matmil[16] = 'millones de billones de trillones';
		$de = '';

		//Zi hack
		$float = explode('.', $num);
		$num = $float[0];
		if ($num % 1000000 == 0) {$de = ' de ';} 

		$num = trim((string)@$num);
		if ($num[0] == '-') {
			$neg = 'menos ';
			$num = substr($num, 1);
		} else
			$neg = '';
		while ($num[0] == '0')
			$num = substr($num, 1);
		if ($num[0] < '1' or $num[0] > 9)
			$num = '0' . $num;
		$zeros = true;
		$punt = false;
		$ent = '';
		$fra = '';
		for ($c = 0; $c < strlen($num); $c++) {
			$n = $num[$c];
			if (!(strpos(".,'''", $n) === false)) {
				if ($punt)
					break;
				else {
					$punt = true;
					continue;
				}
			} elseif (!(strpos('0123456789', $n) === false)) {
				if ($punt) {
					if ($n != '0')
						$zeros = false;
					$fra .= $n;
				} else
					$ent .= $n;
			} else
				break;
		}
		$ent = '     ' . $ent;
		if ($dec and $fra and !$zeros) {
			$fin = ' coma';
			for ($n = 0; $n < strlen($fra); $n++) {
				if (($s = $fra[$n]) == '0')
					$fin .= ' cero';
				elseif ($s == '1')
					$fin .= $fem ? ' una' : ' un';
				else
					$fin .= ' ' . $matuni[$s];
			}
		} else
			$fin = '';
		if ((int)$ent === 0)
			return 'Cero ' . $fin;
		$tex = '';
		$sub = 0;
		$mils = 0;
		$neutro = false;
		while (($num = substr($ent, -3)) != '   ') {
			$ent = substr($ent, 0, -3);
			if (++$sub < 3 and $fem) {
				$matuni[1] = 'una';
				$subcent = 'as';
			} else {
				$matuni[1] = $neutro ? 'un' : 'uno';
				$subcent = 'os';
			}
			$t = '';
			$n2 = substr($num, 1);
			if ($n2 == '00') {
			} elseif ($n2 < 21)
				$t = ' ' . $matuni[(int)$n2];
			elseif ($n2 < 30) {
				$n3 = $num[2];
				if ($n3 != 0)
					$t = 'i' . $matuni[$n3];
				$n2 = $num[1];
				$t = ' ' . $matdec[$n2] . $t;
			} else {
				$n3 = $num[2];
				if ($n3 != 0)
					$t = ' y ' . $matuni[$n3];
				$n2 = $num[1];
				$t = ' ' . $matdec[$n2] . $t;
			}
			$n = $num[0];
			if ($n == 1) {
			if ($num == '100' )
			{$t = ' cien' . $t; }
			else
			{$t = ' ciento' . $t; }
			}elseif ($n == 5){ 
				$t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t;
			} elseif ($n != 0) {
				$t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t;
			}
			if ($sub == 1) {
			} elseif (!isset($matsub[$sub])) {
				if ($num == 1) {
					$t = ' mil';
				} elseif ($num > 1) {
					$t .= ' mil';
				}
			} elseif ($num == 1) {
				$t .= ' ' . $matsub[$sub] . '?n';
			} elseif ($num > 1) {
				$t .= ' ' . $matsub[$sub] . 'ones';
			}
			if ($num == '000')
				$mils++;
			elseif ($mils != 0) {
				if (isset($matmil[$sub]))
					$t .= ' ' . $matmil[$sub];
				$mils = 0;
			}
			$neutro = true;
			$tex = $t . $tex;
		}
		$tex = $neg . substr($tex, 1) . $fin;
		//Zi hack --> return ucfirst($tex);
		//$end_num = ucfirst($tex) . ' pesos ' . $float[1] . '/100 M.N.';
		if(strlen($float[1])==0){
		$end_num=ucfirst($tex).$de.' pesos '.$float[1].'0/100 M.N.';
		}else{
		$end_num=ucfirst($tex).$de.' pesos '.$float[1].'/100 M.N.';
		}
		return $end_num;
	}
	
	function cleanString($text){
        $utf8 = array(
            '/[áàâãªä]/u'   =>   'a',
            '/[ÁÀÂÃÄ]/u'    =>   'A',
            '/[ÍÌÎÏ]/u'     =>   'I',
            '/[íìîï]/u'     =>   'i',
            '/[éèêë]/u'     =>   'e',
            '/[ÉÈÊË]/u'     =>   'E',
            '/[óòôõºö]/u'   =>   'o',
            '/[ÓÒÔÕÖ]/u'    =>   'O',
            '/[úùûü]/u'     =>   'u',
            '/[ÚÙÛÜ]/u'     =>   'U',
            '/ç/'           =>   'c',
            '/Ç/'           =>   'C',
            '/ñ/'           =>   'n',
            '/Ñ/'           =>   'N',
            '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
            '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
            '/[“”«»„]/u'    =>   ' ', // Double quote
            '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
        );
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
    }
}