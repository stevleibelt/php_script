<?php
$generatedUUIDs = array();
$generatedMd5s = array();

for($i = 0;$i<10000;$i++) {
	$generatedUUID = createUUID();
	$generatedMd5 = md5($generatedUUID);
	if (in_array($generatedUUID, $generatedUUIDs)) {
		echo 'matching same uuid in run ' . $i . PHP_EOL;
		exit();
	} else {
		$generatedUUIDs[] = $generatedUUID;
	}
	if (in_array($generatedMd5, $generatedMd5s)) {
		echo 'matching same md5 in run ' . $i . PHP_EOL;
		exit();
	} else {
		$generatedMd5s[] = $generatedMd5;
	}
}
echo 'Run ' . $i . ' creations of UUIDs successfully.' . PHP_EOL;

function createUUID() 
{
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                       mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                       mt_rand(0, 0x0fff) | 0x4000,
                       mt_rand(0, 0x3fff) | 0x8000,
                       mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
}
