<?PHP

$array = array(	0 => 'buuu',
				1 => 'schwing',
				'kalump' => 'doing',
				'gkorp' => array(	'schwing' => 'droell',
									23 => 'die antwort ist 42'
								)
				);

$s = 'schwing';
if(in_array($s, $array))
	echo '<br>Das Wort "'.s.'" ist im array';
else
	echo '<br>Das Wort "'.s.'" ist  nicht im array';

echo '<br>Das Wort "'.$s.'" ist Wert des Schluessels '.array_search($s, $array);

if(array_key_exists($s, $array))
	echo '<br>Das Wort "'.s.'" ist ein Schluessel im array';
else
	echo '<br>Das Wort "'.s.'" ist kein Schluessel im array';

echo '<br><br>Die Schuessel des arrays sind:<br>';
var_dump(array_keys($array));

echo '<br><br>Die Werte des arrays sind:<br>';
var_dump(array_values($array));

echo '<br><br>Das array selbst:<br>';
var_dump($array);
?>