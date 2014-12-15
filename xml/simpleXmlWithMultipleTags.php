<?php
/**
 * Example how to iterate over a xml with multiple entries of same tag
 *
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-05-25
 */

$xmlContent = <<<EOXML
<?xml version="1.0" encoding="utf-8" ?>
<example>
    <multipleTag>
        first entry
    </multipleTag>
    <multipleTag>
        second entry
    </multipleTag>
    <multipleTag>
        third entry
    </multipleTag>
</example>
EOXML;

$xmlObject = new SimpleXMLElement($xmlContent);

echo var_export((array) $xmlObject->multipleTag, true);
