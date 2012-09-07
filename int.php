<?php
define('FOO', 'asd');

$echo = '';

if( ( defined('FOO') === true ) )
{
	$echo .= '<br>FOO is defined';

	$echo .= '<br>FOO = '.(int) FOO;

	$echo .= '<br>'.var_dump(extractNumber(FOO), true);
}
else
{
	$echo .= '<br>FOO !defined';
}

echo $echo;

function extractNumber($string)
{
	$numbers = array();
	$number = null;

	preg_match_all('/[0-9\(\)+.\- ]/s', $string, $numbers);
//exit(xdebug_var_dump($numbers[0]));
	$number = implode('', $numbers[0]);

	return $number;
}
?>