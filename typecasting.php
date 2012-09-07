<?PHP

$a = 'asldasld23';
liloWanders($a);
$b = '23lad';
liloWanders($b);
$c = '42';
liloWanders($c);

function liloWanders($var){
	echo '<br>var::'.$var;
	$var = (int)$var;
	echo '<br>(int)var::'.$var;
	echo '<br>(checkVars)var::'.checkVars($var, '1');
	echo '<br>----';
}

function checkVars($variable, $startValue){
	$variable = (int)$variable;	//wandelt $variable in int-Zahl um, Achtung, jede Zahl nach einem Text wird ignoriert
	if($variable >= $startValue) ($return = $variable); else ($return = $startValue);
	return $return;
	unset($return, $startValue, $variable);
}
?>