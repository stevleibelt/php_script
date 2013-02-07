<?php

$htmlContent = array(
  '<a href="foo/bar">foobar</a>',
  'http://www.foo.bar/name\foo\Bar'
);

foreach ($htmlContent as $content) {
    echo $content . PHP_EOL;
    echo htmlentities($content) . PHP_EOL;
    echo PHP_EOL;
}
