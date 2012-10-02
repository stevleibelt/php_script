<?php
$input = '<script type="text/javascript">alert("XSS - DANGER - XSS")</script></p> "SELECT * FROM -- SELECT * FROM';
$output = htmlspecialchars($input);
echo '<br>output::'.$output."\n";
$output = htmlentities($input);
echo '<br>output::'.$output."\n";
$output = str_replace('--', '', htmlentities($input));
echo '<br>output::'.$output."\n";
//echo '<br>input::'.$input;
$input = 'SELECT "THUEGA_OU_QUESTIONS".* from "THUEGA_OU_QUESTIONS"';
$output = str_replace('--', '', htmlentities($input));
echo '<br>output::'.$output."\n";
