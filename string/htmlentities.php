<?php
$nl = PHP_EOL;
$str = "A 'quote' is <b>&nbsp;bold</b>";

// Outputs: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
echo htmlentities($str) . $nl;

// Outputs: A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;
echo htmlentities($str, ENT_QUOTES, 'UTF-8') . $nl;
