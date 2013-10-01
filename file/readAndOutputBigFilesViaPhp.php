<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-10-01
 */

$filePath = __DIR__ . DIRECTORY_SEPARATOR . __FILE__;

if (file_exists($filePath)) {
    //file exists, sending header informations
    //taken from http://php.net/manual/de/function.readfile.php
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($filePath));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath));

    //now send the content
    $fileHandler = fopen($filePath, 'rb');
    //$fileHandler = fopen('php://output', 'w');

    //taken from http://stackoverflow.com/questions/7457115/how-to-read-huge-file-and-output-it-with-php
    while(!feof($fileHandler)) {
        echo fread($fileHandler, 4096);

        ob_flush();
        flush();
    }

    fclose($fileHandler);
    exit;
    } else {
        'File "' . $filePath . '" does not exists' . PHP_EOL;
}
