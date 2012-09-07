<?
if(defined('SUPERGLOBAL')) echo '<br>SUPERGLOBAL::'.SUPERGLOBAL; else echo '<br>!SUPERGLOBAL :-(';
define('SUPERGLOBAL', 'BONANZA!');
if(defined('SUPERGLOBAL')) echo '<br>SUPERGLOBAL::'.SUPERGLOBAL; else echo '<br>!SUPERGLOBAL :-(';

echo '<br>'.LANGUAGE;
if(!defined('LANGUAGE')) define('LANGUAGE', 'de_DE');
echo '<br>'.LANGUAGE;
?>