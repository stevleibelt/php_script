<?
$city = 'Ulm';

if(check_city($city)){
	echo '<br>Ulm == '.$city;
}else{
	echo '<br>Ulm != '.$city;
}

echo '<br>'.addslashes($city).' == '.$city;

function check_city($city){
	if( (strlen($city) > 2) && ( (addslashes($city) == $city) ) ){
		return TRUE;
	}else{
		return FALSE;
	}
}
?>