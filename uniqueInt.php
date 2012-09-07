<?php
$arrayOfInts = array();

//for($i = 0;$i<10000000;$i++) {
for($i = 0;$i<10000;$i++) {
	$currentUUID = createUUID();
	$currentIntOfUUID = getIntOfString($currentUUID);
	if (in_array($currentIntOfUUID, $arrayOfInts)) {
		echo 'matching same uuid in run ' . $i . PHP_EOL;
		exit();
	} else {
		$arrayOfInts[] = $currentIntOfUUID;
	}
}
echo 'Run ' . $i . ' creations of UUIDs successfully.' . PHP_EOL;

function getIntOfString($string) {
        $lengthOfString = strlen($string);
        $intOfString = '';

        for($i=0;$i<$lengthOfString;$i++){
                $char = substr($string, $i, 1);
                $intOfString .= ord($char);
        }

        return $intOfString;
}


function createUUID() 
{
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                       mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                       mt_rand(0, 0x0fff) | 0x4000,
                       mt_rand(0, 0x3fff) | 0x8000,
                       mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
}
