<?php

$xml = new SimpleXmlElement('<examples></examples>');

$xml->addAttribute('type', 'scripts');

$exampleOne = $xml->addChild('example');
$exampleOne->addChild('title', 'this adds a string');
$exampleOne->addChild('string', 'i am the string');

$exampleTwo = $xml->addChild('example');
$exampleTwo->addChild('title', 'i am another example');
$exampleTwo->addChild('int', 42);

$dom = new DOMDocument('1.0');

$dom->presaveWhiteSpace = false;
$dom->formatOutput = true;

$domXml = dom_import_simplexml($xml);
$domXml = $dom->importNode($domXml, true);
$domXml = $dom->appendChild($domXml);

echo $dom->saveXml();
echo PHP_EOL;
echo 'withouth version (for usage inside an other xml string)' . PHP_EOL;
echo PHP_EOL;
echo str_replace('<?xml version="1.0"?>' . "\n", '', $dom->saveXml());
