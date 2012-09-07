<?php
$nl = '<br>' . PHP_EOL;

$string = 'Life everyday as if your ass is on fire';

echo 'string: ' . $string . $nl;
echo 'startsWith(life)' . $nl;
echo xdebug_var_dump(startsWith($string, 'lIfE'));

function startsWith($string, $search, $beCaseSensitive = false)
    {
        $result = false;

        if($beCaseSensitive) {
            $position = strpos($string, $search);
        }else{
            $position = stripos($string, $search);
        }

        if($position !== false) {
            $result = true;
        }

        return $result;
    }
