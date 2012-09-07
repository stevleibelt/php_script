<?
$input = '<script type="text/javascript">alert("XSS - DANGER - XSS")</script></p> "SELECT * FROM -- SELECT * FROM';
echo '<br>input::'.$input;
$output = htmlspecialchars($input);
echo '<br>output::'.$output."\n";
$output = htmlentities($input);
echo '<br>output::'.$output."\n";
$output = str_replace('--', '', htmlentities($input));
echo '<br>output::'.$output."\n";
$input = 'SELECT "THUEGA_OU_QUESTIONS".* from "THUEGA_OU_QUESTIONS"';
$output = str_replace('--', '', htmlentities($input));
echo '<br>output::'.$output."\n";
?>