<?
//__config
define('dbHost', 'developwww.sc.freenet.de');
define('dbUser', 'test');
define('dbPwd', 'test');
define('dbName', 'profileserver');

//__function
$link = mysql_connect(dbHost, dbUser, dbPwd);
if (!$link) {
    die('keine Verbindung möglich: ' . mysql_error());
}
mysql_select_db(dbName, $link);
echo 'Verbindung erfolgreich';

$sql = 'SELECT cid, nickname FROM profile WHERE cid = 721248018;';
$query = mysql_query($sql, $link);
$result = mysql_fetch_array($query);

exit(var_export($result, true));
mysql_close($link);
?>
