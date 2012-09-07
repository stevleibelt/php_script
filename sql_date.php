<?PHP

$dateString = '2009-10-06 07:34:00';
echo '<br>dateString::'.$dateString;
getDateParts($dateString);
echo '<br>';

$dateString = '2009-10-06 07:34:14';
echo '<br>dateString::'.$dateString;
getDateParts($dateString);
echo '<br>';

$dateString = '2009-10-06';
echo '<br>dateString::'.$dateString;
getDateParts($dateString);
echo '<br>';

$dateString = '07:34:00';
echo '<br>dateString::'.$dateString;
getDateParts($dateString);
echo '<br>';

$dateString = '09-10-06 7:34';
echo '<br>dateString::'.$dateString;
getDateParts($dateString);
echo '<br>';


$dateString = '09_10_06::7-34';
echo '<br>dateString::'.$dateString;
getDateParts($dateString, array('_', '::', '-'));
echo '<br>';

function getDateParts($dateString, $pattern=''){
	if(strlen($dateString)>1){	//wenigst Jahr in '09' muss angegeben sein
		if( (!is_array($pattern)) || (count($pattern) < 3) ) $pattern = array('-', ' ', ':');
		//Anzahl der enthaltenen Elemente zaehlen		
		$count[$pattern[0]] = substr_count($dateString, $pattern[0]);	//DATE-SEPERATOR
		$count[$pattern[1]] = substr_count($dateString, $pattern[1]);	//DATE-TIME-SEPERATOR
		$count[$pattern[2]] = substr_count($dateString, $pattern[2]);	//TIME-SEPERATOR
		//Allgemeine Variablen setzen
		$date = '';
		$time = '';

		if($count[$pattern[1]] == 1){	//Vollstaendiger dateTime-String
			list($date, $time) = explode($pattern[1], $dateString);
			$date = explode($pattern[0], $date);
			$time = explode($pattern[2], $time);
		}else{
			if($count[$pattern[0]] > 1) $date = explode($pattern[0], $dateString);	//Befuelle date
			if($count[$pattern[2]] > 1) $time = explode($pattern[2], $dateString);	//Befuelle time
		}
		$count['date'] = ($date != '') ? count($date) : 0;
		$count['time'] = ($time != '') ? count($time) : 0;
		if($count['date'] < 3){
			if( is_array($date) ){
				for($i=0;$i<3;$i++){
					if(!isset($date[$i])) $date[$i] = ($i == 0) ? date('Y') : ( ($i == 1) ? date('m') : date('d') );
				}
			}else{
				$date = array(date('Y'), date('m'), date('d'));
			}
		}
		$date[0] = (strlen($date[0])==2) ? substr(date('Y'), 0, 2).$date[0] : $date[0];
		if($count['time'] < 3){
			if( is_array($time) ){
				for($i=0;$i<3;$i++){
					if(!isset($time[$i])) $time [$i] = 0;
				}
			}else{
				$time = array(0, 0, 0);
			}
		}
		for($i=0;$i<3;$i++){
			if(strlen($time[$i])==1) $time[$i] = '0'.$time[$i];
		}

		//Ausgabe
		echo '<br>$count[\'date\'] ::'.$count['date'];
		echo '<br>$count[\'time\']::'.$count['time'];
		echo '<br>date::';
		for($i=0;$i<3;$i++){
			echo $date[$i];
		}
		echo '<br>time::';
		for($i=0;$i<3;$i++){
			echo $time[$i];
		}
		
		echo '<br>Timestamp::'.mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]);
	}
}
?>