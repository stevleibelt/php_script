<?PHP
/*
A simple Test, enter a (please valid) mailaddress an see if you could send a mail
needs the files "sl_system.php" in the same directory

2009-06-16
stev leibelt
*/

define('FILENAME', 'test_mailme');
define('INDEX', FILENAME.'.php');

include_once('sl_css.php');
include_once('sl_system.php');

if(SL_SYSTEM::validPOST('mode') != 'mailme'){
?>
	<table>
		<form action="<? echo INDEX ?>" method="POST">
			<tr>
				<td>input: </td><td><input type="text" name="mail"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="abschicken" class="button1"></td>
			</tr>
			<input type="hidden" name="mode" value="mailme">
		</form>
	</table>
<?
}else{
$mailstatus = (mail(SL_SYSTEM::validPOST('mail'), 'test', date('Y-m-d'), '')) ? 'gesendet' : 'nicht gesendet';
?>
	<table>
		<form action="<? echo $INDEX ?>" method="POST">
			<tr>
				<td><? echo SL_SYSTEM::validPOST('mail'); ?>: </td><td><? echo $mailstatus; ?></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="abschicken" class="button1"></td>
			</tr>
			<input type="hidden" name="mode" value="!mailme">
		</form>
	</table>
<?
}
?>