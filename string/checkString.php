<?PHP
//date:	2008_11_24
//function:	checks if a filename (including a timestamp in format "YYMMDD")  is to old to be displayed
//author:	stev leibelt

output('&&N&E');
output('&83<script>XSS</script>');
output('&&455483  < asdasd  sad a  sdasd ;"SELECT * FROM `FOO`;</script>');
output('');
output('<script type="text/javascript">alert("XSS - DANGER - XSS")</script></p> "SELECT * FROM -- SELECT * FROM');

function output($loesung){
	echo "\n".'<br>Loesung::&nbsp;'.$loesung;
	echo "\n".'<br>checkLoesung::&nbsp;'.validLoesung($loesung)."\n";
}

function validLoesung($string){										//Only Capitals and "&" allowed
	$pattern = '/[^a-zA-Z&]/';										//XSS-proved!
	$replacement = '';
	$string = preg_replace($pattern, $replacement, $string);		//Entfernt alle Zahlen und Sonderzeichen ausser "&" aus dem Text
	$string = strtoupper($string);
	return $string;
	unset($pattern, $replacement, $string);
}
?>