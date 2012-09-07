<?PHP
if($_POST['mode'] != 'uploadFile'){
?>
	<table>
		<form action="multiUploadFile.php" method="POST" enctype="multipart/form-data">
			<tr><td>Foto: </td><td><input type="file" name="bewerbung[]"></td></tr>
			<tr><td>Anschreiben: </td><td><input type="file" name="bewerbung[]"></td></tr>
			<tr><td>Lebenslauf: </td><td><input type="file" name="bewerbung[]"><br>
			<br></td></tr>
			<tr><td><input type="submit" name="submit" value="abschicken"></td></tr>
			<input type="hidden" name="mode" value="uploadFile">
		</form>
	</table>
<?
}else{
	echo '<table border="1" cellpadding="1" cellspacing="0">';
	echo '<tr><th>Variable</th><th>Wert</th></tr>';
	$magicFolder = 'gfdgdfgfd';
	$dirPath = dirname($_SERVER['SCRIPT_FILENAME']).'/temp'.'/'.$magicFolder;
	If(mkdir($dirPath, 777)){
		changeChmode($dirPath, 0777);
		moveUploadedFile('bewerbung', 0, $dirPath);
		moveUploadedFile('bewerbung', 1, $dirPath);
		moveUploadedFile('bewerbung', 2, $dirPath);
	}else{
		echo '<tr><td>Fehler!</td><td>Der Ordner<br>'.$dirPath.'<br>konnte nicht erstellt werden!</td></tr>';
	}
	echo '</table>';
	//var_dump($_FILES['bewerbung']);
?>
	<table>
		<form action="multiUploadFile.php" method="POST" enctype="multipart/form-data">
			<tr><td><input type="submit" name="submit" value="nochmal"></td></tr>
			<input type="hidden" name="mode" value="">
		</form>
	</table>
<?
}

function moveUploadedFile($name, $arrayNumber, $destination){
	if(!$_FILES[$name]['error'][$arrayNumber]){
		echo '<tr><td>Name:</td><td>'.$_FILES[$name]['name'][$arrayNumber].'</td></tr>';
		echo '<tr><td>tmpName:</td><td>'.$_FILES[$name]['tmp_name'][$arrayNumber].'</td></tr>';
		if(!move_uploaded_file($_FILES[$name]['tmp_name'][$arrayNumber], $destination.'/'.$_FILES[$name]['name'][$arrayNumber])){
			echo '<tr><td>'.$_FILES[$name]['name'][$arrayNumber].'</td><td>verschieben nach '.$destination.'/'.$_FILES[$name]['name'][$arrayNumber].' gescheitert!</td></tr>';
		}else{
			echo '<tr><td>'.$_FILES[$name]['name'][$arrayNumber].'</td><td>verschieben '.$destination.'/'.$_FILES[$name]['name'][$arrayNumber].' erfolgt!</td></tr>';
		}
		
		echo '<tr><th>&nbsp;</th><th>&nbsp;</th></tr>';
	}else{
		echo '<tr><th>Fehler beim hochladen!</th><th>&nbsp;</th></tr>';
	}
}
function changeChmode($dirPath, $mode = 755){
	if(chmod($dirPath, $mode)){
		echo '<tr><td>Rechte von '.$dirPath.' wurden auf '.$mode.' gesetzt.</td><td>&nbsp;</td></tr>';
	}else{
		echo '<tr><td>Rechte von '.$dirPath.' konnten nicht auf '.$mode.' gesetzt werden.</td><td>&nbsp;</td></tr>';
	}
}
?>