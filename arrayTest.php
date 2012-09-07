<?
$i = 0.2;
for($j = 0; $j < 100; $j++){
	$i += ($i*0.05);
}
//Einfacher Zinsatz laut http://de.wikipedia.org/wiki/Zinsrechnung#Einfache_Zinsen_.28lineare.2Fstetige_Verzinsung.29
echo '<br>Nach '.$j.' Jahren sind 20 Cent bei einem Jahreszins von 5% '.number_format($i, 2).' Euro wert.';

echo '<table>';
for($i = 0; $i <= 9; $i++){
	foo($i);
}
echo '</table>';

function foo($bar){
	$i = 7;
	$j = 8;
	$k = 9;
	$l = 4;
	$m = 6;
	$n = 7;
	echo '<tr>';
	while(($i>=0) || ($j>=0) || ($k>=0) || ($l>=0) || ($m>=0) || ($n>=0)){
		if($bar >= 0) $content = '<div style="width: '.$bar.'px; height:18px; background-color: #FFFFFF;">&nbsp;</div>'; else ($content = '&nbsp');
		echo '<td bgcolor="#'.$i--.$j--.$k--.$l--.$m--.$n--.'" width="10px" height="10px">'.$content.'</td>';
		$bar--;
	}
	echo '</tr>';
}

//if (true == $success) echo '<br>fii'; else echo '<br>faa';
$array0 = array();
$array0 = array(2, 4, 6, 5, 5, 3);
echo '<br>array_push<br>';
array_push($array0, 1, 3, 2, 2, 5, 4);	//fuegt Elemente ein
var_dump($array0);
$array1 = array(4, 3, 5, 1, 1, 2);
echo '<br>array_merge<br>';
$array0 = array_merge($array0, $array1);
var_dump($array0);

$array1 = array(
	'Bereich1' => array(
		'Spalte1' => array(
			'Kommentar'
		),
		'Spalte2' => array(
			'Kommentar'
		),
		'Spalte3' => array(
			'Kommentar'
		)
	),
	'Bereich2' => array(
		'Spalte1' => array(
			'Kommentar'
		),
		'Spalte2' => array(
			'Kommentar'
		),
		'Spalte3' => array(
			'Kommentar'
		)
	)
);

echo '<br> array1<br>';
var_dump($array1);

$array2 = array(
	'Bereich' => 2,
	'Spalte' => 1,
	'Kommentar' => 'hui'
);


$array3 = array(
	'Bereich' => 1,
	'Spalte' => 4,
	'Kommentar' => 'mui'
);

echo '<br> array2<br>';
var_dump($array2);
	
$array1['Bereich2']['Spalte1'][] = $array2['Kommentar'];
$array1['Bereich2']['Spalte1'][] = $array3['Kommentar'];
$array1['fuu']['baa'][] = 'so isses';
$array1['fuu']['baa'][] = 'noe';
$array1['fuu']['baa'][] = 'doch!';
$array1['fuu']['baa'][] = 'hmm';
$array1['fuu']['baa'][] = 'eventuell?';

echo '<br> array1<br>';
var_dump($array1['Bereich2']['Spalte1']);
echo '<br>Laenge::'.strlen($array1['Bereich2']['Spalte1'][0]);
echo '<br>Inhalt::'.$array1['Bereich2']['Spalte1'][0];
echo '<br> array1<br>';
var_dump($array1);	
?>