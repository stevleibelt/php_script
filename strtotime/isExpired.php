<?
echo '<br>testDate(\'2008-12-04 16:18:01\')';
testDate('2008-12-04 16:18:01');
echo '<br>testDate(\'2008-12-08 17:45:01\')';
testDate('2008-12-08 17:45:01');

function testDate($date){
	echo '<br>dateTime::'.strtotime($date);
	if(isExpired($date)){
		echo '<br>zu alt';
	}else{
		echo '<br>noch nicht alt genug';
	}
	echo '<br>currentTime::'.time().'<br>';
}

function isExpired($expiry=null){
	if(is_string($expiry)){
		echo 'strtotime($expiry) < time()::'.strtotime($expiry) < time();
		return strtotime($expiry) < time();
	}else{
		return FALSE;
	}
}
?>
