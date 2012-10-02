<?
//__config
define('dbHost', 'hosturl');
define('dbUser', 'test');
define('dbPwd', 'test');
define('dbName', 'profileserver');

//__function
$link = mysql_connect(dbHost, dbUser, dbPwd);
if (!$link) {
    die('could not connect: ' . mysql_error());
}
mysql_select_db(dbName, $link);
echo 'database connection linked' . PHP_EOL;

$sql = 'SHOW DATABASES;';
$query = mysql_query($sql, $link);
$result = mysql_fetch_array($query);

echo var_export($result, true);
echo PHP_EOL . 'closing link' . PHP_EOL;
mysql_close($link);
