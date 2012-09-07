<?php
$nl = '<br>' . PHP_EOL;

$string = 'Foo';

echo 'The following if statement does\'t work as you might think' . $nl;
if(($string != 'bar') 
   || ((strtolower($string) == 'foo' )
       && ($string == 'foo'))) {
	echo '"' . $string . '" is not "bar".' . $nl;
	echo 'If "' . $string . '" is "foo", it is really "foo", not "Foo".' . $nl;
} else {
	echo 'The string "' . $string . '" does not pass the conditions.' . $nl;
}
