<?PHP
/*
**Wandelt ä, ö, ü in ae, oe, ue um
*/
error_reporting(E_ALL | E_STRICT);

require_once('inc\html.php');
$html = new html('replaceUmlauts');

$colorCounter = 0;

$text = 'März ist Maerz ist M&auml;rz<br>Mörz ist Moerz ist M&ouml;rz<br>Mürz ist Muerz ist M&uuml;rz<br>';

$html->buildDiv($text, $colorCounter++, $styles='');
$html->buildDiv(textCleaner($text), $colorCounter++, $styles='');
$html->buildDiv(replaceUmlauts($text), $colorCounter++, $styles='');
$html->buildDiv(regExpress($text), $colorCounter++, $styles='');

function replaceUmlauts($text) {

	$umlauts = array('&auml;', '&ouml;', '&uuml;', 'ä', 'ö', 'ü');
	$replace = array('ae', 'oe', 'ue', 'ae', 'oe', 'ue');
	return str_replace($umlauts, $replace, $text);
}

function textCleaner($text){
	$text = str_replace('ä', 'ae', $text);
	$text = str_replace('ö', 'oe', $text);
	$text = str_replace('ü', 'ue', $text);
	
	return $text;
}

function regExpress($text){

	//return ereg_replace("/^[A-Za-zäöü]{3,}$/",$text);
	//return ereg_replace("&[aou]ml;", "[aou]e",$text);
	//return ereg_replace('uml;', 'e',ereg_replace('&', '',$text));
	return str_replace('uml;', 'e',str_replace('&', '',$text));
}
?>