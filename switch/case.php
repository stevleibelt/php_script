<?php

$foo = 'bar';

switch($foo) {
	case 'foo' :
		$string = 'foo';
		break;
	case 'foobar' ;
		$string = 'foobar';
		break;
	case 'bar' : 
		$string = 'bar';
		break;
	default : 
		$string = 'There can not be foo without bar';
		break;
}

echo $string;
