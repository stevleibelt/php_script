<?php

$xml = new SimpleXmlElement('<examples></examples>');

$xml->addAttribute('type', 'scripts');

$exampleOne = $xml->addChild('example');
$exampleOne->addChild('title', 'this adds a string');
$exampleOne->addChild('string', 'i am the string');

$exampleTwo = $xml->addChild('example');
$exampleTwo->addChild('title', 'i am another example');
$exampleTwo->addChild('int', 42);

echo $xml->asXml();
