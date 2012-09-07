<?PHP
/*
**Wandelt �, �, � in ae, oe, ue um
*/
error_reporting(E_ALL | E_STRICT);

require_once('inc\html.php');
$html = new html('replaceUmlauts');

$colorCounter = 0;

$text = 'M�rz ist Maerz ist M&auml;rz<br>M�rz ist Moerz ist M&ouml;rz<br>M�rz ist Muerz ist M&uuml;rz<br>';

$html->buildDiv($text, $colorCounter++, $styles='');
$html->buildDiv(textCleaner($text), $colorCounter++, $styles='');
$html->buildDiv(replaceUmlauts($text), $colorCounter++, $styles='');
$html->buildDiv(regExpress($text), $colorCounter++, $styles='');

function replaceUmlauts($text) {

	$umlauts = array('&auml;', '&ouml;', '&uuml;', '�', '�', '�');
	$replace = array('ae', 'oe', 'ue', 'ae', 'oe', 'ue');
	return str_replace($umlauts, $replace, $text);
}

function textCleaner($text){
	$text = str_replace('�', 'ae', $text);
	$text = str_replace('�', 'oe', $text);
	$text = str_replace('�', 'ue', $text);
	
	return $text;
}

function regExpress($text){

	//return ereg_replace("/^[A-Za-z���]{3,}$/",$text);
	//return ereg_replace("&[aou]ml;", "[aou]e",$text);
	//return ereg_replace('uml;', 'e',ereg_replace('&', '',$text));
	return str_replace('uml;', 'e',str_replace('&', '',$text));
}
?>