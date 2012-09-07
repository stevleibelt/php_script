<?PHP
$url = 'http://abschnitt5.leibelt.de/';

$replaceArray = array(	'<a' => array( 'href="/', 'href="'.$url ),
						'<img' => array( 'src="/', 'src="'.$url ),
						'<link' => array( 'href="/', 'href="http://auto.freenet.de/' )
					);

$string = ' <link rel="stylesheet" type="text/css" href="/code/1148150/frn_global_lib2.css" /><br>
			Link1::<br>
			&nbsp;&nbsp;<a id="asd" href="/index.php?/archives/232-The-Nordlichter-proudly-presents-a-new-Wertverlustsgegenstand-formaly-known-as-Udo.html">Link1</a><br>
			Img1::<br>
			<img class="asjlk" alt="Bild" src="/templates/fifty50/img/bg.jpg"><br>
			Link2::<br>
			&nbsp;&nbsp;<a href="/index.php?/archives/229-Sweet-Home-3D-Freier-Innenraumplaner.html" id="asdl">Link2</a>';

$string1 = ' <a class="asljd" href="/askdhasd">askldhas</a><br>
			&nbsp;<link rel="stylesheet" type="text/css" href="/code/1148150/frn_global_lib2.css" /><br>
			Link1::<br>
			&nbsp;&nbsp;<a id="asd" href="/index.php?/archives/232-The-Nordlichter-proudly-presents-a-new-Wertverlustsgegenstand-formaly-known-as-Udo.html">Link1</a><br>
			Img1::<br>
			<img class="asjlk" alt="Bild" src="/templates/fifty50//img/bg.jpg"><br>
			Link2::<br>
			&nbsp;&nbsp;<a href="/index.php?/archives/229-Sweet-Home-3D-Freier-Innenraumplaner.html" id="asdl">Link2</a>';

//out($string, '<br>');
out(replaceWalker($replaceArray, $string));

function replaceWalker($replaceArray, $string)
{
        $string = trim($string);

    	foreach($replaceArray as $v => $k)    //Auessere Schleife, jeder Vater-Zeichenkette wird abgearbeitet
    	{
    		$k[0] = str_replace('/', '\/', $k[0]);    //Da preg_replace verwendet wird, muss "/" escaped werden
    		$working_array = explode($v, $string);
			oute('strpos($string, $v)::'.strpos($string, $v));

			$v_not_in_first_array_value = (strpos($string, $v)>0) ? TRUE : FALSE;

    		$count_array = count($working_array);
    		$string = '';       //String wird geloecht, da er neu aufgebaut wird und anschliessend erneut verwendet wird
    
    		for($i=0;$i<=$count_array;$i++)        //for statt foreach, da for schneller als foreach
    		{
    		    if(isset($working_array[$i]))
        			if( ($i === 0) || ($i === $count_array) )   //am Anfang und am Ende kein $v hinzufuegen
						if($v_not_in_first_array_value)			//erster Feldwert (array-value) besitzt keine Vater-Zeichenkette
							$string .= $working_array[$i];
						else
							$string .= preg_replace('/'.$k[0].'/', $k[1], $working_array[$i], 1);
        			else
        				$string .= $v.preg_replace('/'.$k[0].'/', $k[1], $working_array[$i], 1);
    		}
    	}
    
    	return $string;
}

function out($s, $nes='')
{
	echo '<br>'.$s.$nes."\n";
}
function oute($s, $nes='')
{
	echo '<br>'.htmlspecialchars($s).$nes."\n";
}
?>