<?PHP
$index = 'md5me.php';
if($_POST['mode'] != 'md5me'){
?>
	<table>
		<form action="<? $index; ?>" method="POST">
			<tr><td>input: </td><td><input type="text" name="input"></td></tr>
			<tr><td><input type="submit" name="submit" value="abschicken"></td></tr>
			<input type="hidden" name="mode" value="md5me">
		</form>
	</table>
<?
}else{
?>
	<table>
		<form action="<? $index; ?>" method="POST">
			<tr><td><? echo $_POST['input']; ?>: </td><td><? echo md5($_POST['input']); ?></td></tr>
			<tr><td><input type="submit" name="submit" value="abschicken"></td></tr>
			<input type="hidden" name="mode" value="!md5me">
		</form>
	</table>
<?
}
?>