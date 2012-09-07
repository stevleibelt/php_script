<?PHP
if($_POST['mode'] != 'uploadFile'){
?>
	<form action="uploadFile.php" method="POST" enctype="multipart/form-data">
		<br><input type="file" name="bewerbung">
		<br>
		<br><input type="submit" name="submit" value="abschicken">
		<input type="hidden" name="mode" value="uploadFile">
	</form>
<?
}else{
	var_dump($_FILES['bewerbung']);
	if($_FILES['bewerbung']){
		echo '<br>schwingschwing';
	}
	if(!$_FILES['bewerbung']['error']){
		echo '<br>schwangschwang';
	}
}
?>