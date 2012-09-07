<?PHP
$workingDir = AddSlashes(dirname($_SERVER['SCRIPT_FILENAME']));
$dirname = '/testtest';
$dirpath = '/test';
$chmode = 0777;

echo '<br>Arbeitsverzeichnis<br>'.$workingDir;
echo '<br>Der Besitzer der Datei ist: '.fileowner($_SERVER['SCRIPT_FILENAME']);
echo '<br>Die Gruppe der Datei ist: '.filegroup($_SERVER['SCRIPT_FILENAME']);
clearstatcache();
echo '<br>Die Zugriffsrechte der Datei sind: '.fileperms($_SERVER['SCRIPT_FILENAME']);

echo '<br>';

if(!file_exists($_SERVER['SCRIPT_FILENAME']).$dirpath.$dirname){

	//changeChmode($workingDir.$dirname.$dirpath, 777);

	echo '<br>';

	if(mkdir(AddSlashes(dirname($_SERVER['SCRIPT_FILENAME'])).$dirpath.$dirname, $chmode)){
		echo '<br>'.$dirname.' wurde erfolgreich angelegt.';
	}else{
		echo '<br>'.$dirname.' konnte nicht angelegt werden.';
	}

	echo '<br>';

	//changeChmode($workingDir.$dirname.$dirpath, 760);
}else{
	echo '<br>Ordner bereits vorhanden!';
}

function changeChmode($dirPath, $mode = 755){
	if(chmod($dirPath, $mode)){
		echo '<br>Rechte von '.$dirPath.' wurden auf '.$mode.' gesetzt.';
	}else{
		echo '<br>Rechte von '.$dirPath.' konnten nicht auf '.$mode.' gesetzt werden.';
	}
}
?>