<?php
$content = 'This is a content line';
$filePath = '/tmp/bazzlineScriptsFOpen';
$nl = PHP_EOL;

$fh = fopen($filePath, 'w');

$numberOfBytesWritten = fwrite($fh, $content);
$filePointerPosition = ftell($fh);

fclose($fh);

echo '----------------' . $nl;
echo 'Opened file "' . $filePath . '"' . $nl;
echo 'Written content "' . $content . '"' . $nl;
echo 'Number of bytes written "' . $numberOfBytesWritten . '"' . $nl;
echo 'Current position of file handler "' . $filePointerPosition . '"' . $nl;
echo '----------------' . $nl;

