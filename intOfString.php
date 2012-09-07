<?php

$string = 'öaskdlwaieoajwkldjawljklaw.-.wa,l,wlkdac';
$hashOfString = sha1($string);
$intOfString = getIntOfString($string);
$intOfHashedString = getIntOfString($hashOfString);

echo 'string::' . $string . PHP_EOL;
echo 'int of string::' . $intOfString . PHP_EOL;
echo 'hash of string::' . $hashOfString . PHP_EOL;
echo 'int of hashed string::' . $intOfHashedString . PHP_EOL;

function getIntOfString($string) {
        $lengthOfString = strlen($string);
        $intOfString = '';

        for($i=0;$i<$lengthOfString;$i++){
                $char = substr($string, $i, 1);
                $intOfString .= ord($char);
        }

        return $intOfString;
}
