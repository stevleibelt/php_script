<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-29
 */

$uris = array(
    'pdf' => 'http://www.mini.at/_downloads/pdf/test_financial_services_brochure.pdf',
    'html' => 'http://www.leibelt.de'
);

foreach ($uris as $expectedType => $uri)
{
    echo 'expected type: ' . $expectedType . PHP_EOL;
    echo var_export(get_headers($uri, 1), true) . PHP_EOL;
    echo PHP_EOL;
}
