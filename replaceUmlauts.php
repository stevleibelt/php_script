<?
function replaceUmlauts($text, $mode='text') {	//mode1->text, replace the umlauts in an html-text | mode2->replace the umlauts in a filename

	if(strlen($text) > 0){
		$array_umlauts = array('ä', 'ü', 'ö', 'Ä', 'Ü', 'Ö', 'ß');
		$array_replace = ($mode=='filename') ? array('ae', 'ue', 'oe', 'Ae', 'Ue', 'Oe', 'ss') : array('&auml;', '&uuml;', '&ouml;', '&Auml;', '&Uuml;', '&Ouml;', '&szlig;');

		return str_replace($array_umlauts, $array_replace, $text);
	}else{
		return '';
	}

	unset($array_replace, $array_umlauts, $mode, $text);
}
?>