<?php

$feedUrl = 'http://www.vtoc.de/feed/atom';

//xmlReader
$xmlReader = new XMLReader();
$xmlReader->open($feedUrl);

while($xmlReader->read()) {
    switch($xmlReader->nodeType) {
        case XMLReader::ELEMENT:
        echo 'tag::open->' . $xmlReader->name . "<br />\n";
            break;
        case XMLReader::END_ELEMENT:
            echo 'tag::close->' . $xmlReader->name . "<br />\n";
            break;
        case XMLReader::TEXT:
            echo 'tag::text->' . $xmlReader->value . "<br />\n";
            break;
        case XMLReader::END_ENTITY:
            echo 'schluss' . $xmlReader->name . '<br>';
            break;
    }
}

exit('done');