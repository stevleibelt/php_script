<?
$failed = 'we pray the hard way!';
$i = 0;

echo '<br>test '.++$i.'<br>';

if(($failed) && (is_string($failed))){
	echo 'failed == true';
}else{
	echo 'failed != true';
}

echo '<br><br>test '.++$i.'<br>';

$failed = NULL;

if(($failed) && (is_string($failed))){
	echo 'failed == true';
}else{
	echo 'failed != true';
}

echo '<br><br>test '.++$i.'<br>';

$failed = TRUE;

if(($failed) && (!is_string($failed))){
	echo 'failed == true';
}else{
	echo 'failed != true';
}
?>