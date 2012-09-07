<?php
/**
 * Singles_Class_Db
 * Singlton Desingpattern for read and write databaselink
 *
 * @package
 * @author sleibelt
 * @copyright Copyright (c) 2010
 * @version $Id$
 * @access public
 */
define('DB_WRITE_SERVER', 'developwww.sc.freenet.de');
define('DB_WRITE_PORT', '3306');
define('DB_WRITE_USERNAME', 'test');
define('DB_WRITE_PASSWORD', 'test');

define('DB_READ_SERVER', 'developwww.sc.freenet.de');
define('DB_READ_PORT', '3306');
define('DB_READ_USERNAME', 'test');
define('DB_READ_PASSWORD', 'test');

define('DB_NAME', 'profileserver');

$dbRead = Singles_Class_Db::getInstance('read');
$dbWrite = Singles_Class_Db::getInstance('write');
echo $dbWrite->dbLink.'<br>';
echo $dbRead->dbLink.'<br>';
$sql = 'SELECT cid, nickname FROM profile WHERE cid = 721248018;';
$query = mysql_query($sql, $dbRead->dbh);
//$query = mysql_query($sql, $dbRead);
$result = mysql_fetch_array($query);
exit(var_export($result, true));

class Singles_Class_Db
{
    private static $__instances = array();
    public $dbh = false;
    public $dbLink = '';

    private function __construct($dblink = 'read')
    {
        switch($dblink)
        {
            case 'read':
                $dbh = mysql_connect(DB_READ_SERVER.':'.DB_READ_PORT, DB_READ_USERNAME, DB_READ_PASSWORD);
                $this->dbLink = 'read';
                break;
            case 'write':
                $dbh = mysql_connect(DB_WRITE_SERVER.':'.DB_WRITE_PORT, DB_WRITE_USERNAME, DB_WRITE_PASSWORD);
                $this->dbLink = 'write';
                break;
        }
        mysql_select_db(DB_NAME, $dbh);

        if( ( $dbh === false ) )
        {
            echo '<h3>Unable to connect to database. Please check details in configuration file.</h3><br>'.
                 var_export(mysql_error($dbh), true).'<br>'.var_export(mysql_errno($dbh), true);
            exit();
        }

        $this->dbh = $dbh;
    }

    private function __clone()
    {

    }

    public static function getInstance($dbLink = 'read')
    {
        $dbLinks = array('read', 'write');

        if( ( in_array($dbLink, $dbLinks) ) )
        {
            if( ( !isset(self::$__instances[$dbLink]) ) ||
                ( !is_object(self::$__instances[$dbLink]) ) )
            {
                self::$__instances[$dbLink] = new Singles_Class_Db($dbLink);
            }

            return self::$__instances[$dbLink];
        }
    }
}

