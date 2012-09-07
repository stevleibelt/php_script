<?PHP
$state = (isset($_POST['state'])) ? $_POST['state'] : 0;
$userTimestamp = (isset($_POST['userTimestamp'])) ? $_POST['userTimestamp'] : '';
if($userTimestamp=='') $state = 0;
$currentTimestamp = generateTimestamp();

echo '
<html>
	<head>
		<title>working with timestamps</title>
	</head>
	<body>
		<div id="firstDiv">
			current timestamp:'.$currentTimestamp.'<br>
			current date:'.generateDate($currentTimestamp).'
		</div>
';

if($state==1){
	echo '
			<div id="secondDiv">
				your timestamp'.$userTimestamp.'<br>
				your date:'.generateDate($userTimestamp).'<br>
			</div>
	';
}
echo '
		<div id="thirdDiv">
			<br>
			convert timestamp into date<br>
			<form action="timestamp.php" method="post">
				<input type="text" name="userTimestamp"><br>
				<input type="submit" name="convert" value="convert">
				<input type="hidden" name="state" value="1">
			</form>
		</div>
';

echo '
	</body>
</html>
';

function generateDate($t){
	return date('Y_m_d-H:i:s', $t);
}

function generateTimestamp($d=''){
	if(!is_array($d)){
		return mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));
	}else{
		return mktime($d['t'][0], $d['t'][1], $d['t'][2], $d['d'][1], $d['d'][0], $d['d'][2]);
	}
}
?>