<?php
$array1 = $array2 = array();

for ($i=0;$i<9;$i++) {
	$array1['k' . $i] = 'a1v' . $i;
	$array2['k' . $i] = 'a2v' . $i;
}

unset($array1['k7']);

echo 'array1::' . PHP_EOL;
echo xdebug_var_dump($array1);
echo 'array2::' . PHP_EOL;
echo xdebug_var_dump($array2);
$array3 = _mapValuesFromArray2ToArray1($array1, $array2, array('k2', 'k6', 'k7', 'k13'));
echo 'array3::' . PHP_EOL;
echo xdebug_var_dump($array3);
$array4 = _mapValuesFromArray2ToArray1($array1, $array2, array('k2', 'k6', 'k7', 'k13'), true);
echo 'array4::' . PHP_EOL;
echo xdebug_var_dump($array4);

function _mapValuesFromArray2ToArray1($array1 = array(), $array2 = array(), $keysToMap = array(), $overwriteValue = false)
    {
        //parameter validation
        if ($overwriteValue !== true) {
            $overwriteValue = false;
        }

        if (!is_array($keysToMap)) {
            $keysToMap = array($keysToMap);
        }

        //code for mapping
        if (count($keysToMap) > 0
	    && is_array($array1)
	    && is_array($array2)) {
            foreach ($keysToMap as $keyToMap) {
                if (isset($array2[$keyToMap])
                    && (!isset($array1[$keyToMap]) 
                        || $overwriteValue)) {
                    $array1[$keyToMap] = $array2[$keyToMap];
                }
            }
        }

        return $array1;
    }
