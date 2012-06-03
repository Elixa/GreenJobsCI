<?php
function dateToPhp($fecha){
    
	$fecha = explode(" ", $fecha);
    
    list($anio,$mes,$dia)=explode("-",$fecha[0]);
    return $dia."/".$mes."/".$anio." ".$fecha[1];
}  

function dateToMysql($fecha){
    
    $fecha = explode(" ", $fecha);
    
    list($dia,$mes,$anio) = explode("/",$fecha[0]);
    return $anio."-".$mes."-".$dia." ".$fecha[1];
}  

function br2nl($string)
{
    return str_replace('<br />', "\n", $string);
} 

function stringToUrl($s)
{
	
	$s = str_replace('�','',$s);
	$s = str_replace(" - ",'-',$s);
	$s = str_replace(' ','-',$s);
	$s = str_replace('_','-',$s);
	$s = str_replace('?','',$s);
	$s = str_replace('.','',$s);
	$s = str_replace('"','',$s);
	$s = str_replace("'",'',$s);
	$s = str_replace("(",'',$s);
	$s = str_replace(")",'',$s);
    //$s = str_replace(";",'',$s);
    $s = strtolower($s);
    
   	$array_1 = array("&aacute;","&eacute;"."&iacute;","&iacute;","&oacute;","&uacute;","&ntilde;");
	$array_2 = array("a","e","i","o","u","n");
	
	$s = str_replace($array_1, $array_2, $s);
	
	return $s;
}

function urlToString($s)
{
	$s = str_replace('_',' ',$s);
	$s = ucfirst($s);
	
	return $s;
}

function fechaToString($fecha)
{
	$fecha = explode(" ", $fecha);
	list($anio,$mes,$dia)=explode("-",$fecha[0]);
	
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	
	$mes = (substr($mes,0,1) == '0')?substr_replace($mes,"",0,1):$mes;
	
	return $dia." de ".$meses[$mes-1]." del ".$anio;
}

function mesToString($mes)
{
	
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	
	$mes = (substr($mes,0,1) == '0')?substr_replace($mes,"",0,1):$mes;
	
	return $meses[$mes-1];
}


function remplazarEnBlanco($texto,$p)
{
	while(substr(strip_tags($texto), $p, 1) != " ")
	{
		$p++;	
	}
    return substr_replace(strip_tags($texto),'...',$p);
}


function printList($text){
    $temp = ereg_replace("</p>.+<p\s*.*>.*[^<p\s*.*>]{readmore}</p>","...{explode}",$text);
    
    if($temp != $text)
    {
        $temp = explode('{explode}',$temp);
        return $temp[0];   
    }
    
    return $text;   
}

function printDetail($text){
    $temp = ereg_replace("</p>.+<p\s*.*>.*[^<p\s*.*>]{readmore}</p>","",$text);
    
    return $temp;   
}


function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

 function keephtml($string){
          $res = htmlentities($string);
          $res = str_replace("&lt;","<",$res);
          $res = str_replace("&gt;",">",$res);
          $res = str_replace("&quot;",'"',$res);
          $res = str_replace("&amp;",'&',$res);
          return $res;
}



function isAdmin()
{
	if(isset($_SESSION['admin']))
	{
		return true;
	}
    else
    {
        return false;
    }
}

?>