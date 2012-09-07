<?PHP 
$array = array();
$nl = PHP_EOL;

for ($i=0;$i<9;$i++) {
	$array['key' . $i] = 'value' . $i;
}

echo 'array::' . $nl;
echo $nl;
echo 'cleanedArray with 2 keys preserved' . $nl;
$array = cleanArray($array, array('key2', 'key6'));
echo xdebug_var_dump($array);
echo $nl;
echo 'cleanedArray with 1 keys preserved' . $nl;
$array = cleanArray($array, 'key6');
echo xdebug_var_dump($array);

function cleanArray($array, $sessionKeysToPreserve = array()) {
        if (!is_array($sessionKeysToPreserve)) {
            $sessionKeysToPreserve = array($sessionKeysToPreserve);
        }

        if (count($sessionKeysToPreserve) > 0) {
            $preservedSessionValues = array();

            foreach ($sessionKeysToPreserve as $sessionKeyToPreserve) {
                if (isset($array[$sessionKeyToPreserve])) {
                    $preservedSessionValues[$sessionKeyToPreserve] = $array[$sessionKeyToPreserve];
                }
            }
        }

        $array = array();

        if (count($preservedSessionValues) > 0) {
            foreach ($preservedSessionValues as $preservedSessionKey => $preservedSessionValue) {
                $array[$preservedSessionKey] = $preservedSessionValue;
            }
        }

        return $array;
    }
