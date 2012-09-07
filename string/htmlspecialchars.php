<?php
$nl = '<br />' . PHP_EOL;
$specialCharHtmlString = '<html>&nbsp;fufü+*#';

echo 'the string' . $nl;
echo $specialCharHtmlString . $nl;

$string = htmlentities($specialCharHtmlString, ENT_NOQUOTES);
echo 'using htmlentities with ENT_NOQUOTES' . $nl;
echo $string . $nl;

$string = htmlentities($specialCharHtmlString, ENT_QUOTES);
echo 'using htmlentities with ENT_QUOTES' . $nl;
echo $string . $nl;

$string = html_entity_encode($specialCharHtmlString);
echo 'using html_entity_encode' . $nl;
echo $string . $nl;

