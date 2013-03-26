<?php
/**
 * @author artodeto
 * @since 2013-03-26
 */

$array = array(
    'user' => array(
        'name' => 'max musterman', 
        'date' => '12.3.4567'
    ),
    'car' => 'a fast one',
    'address' => array(
        'street' => 'musterstraße',
        'city' => 'musterstadt'
    )
);

$mandatoryKeys = array(
    'user', 'car', 'address'
);
$mandatoryKeysWithSubarray = array(
    'user' => array('name'), 'car'
);
$mandatoryKeysWithSubarrayInvalidEntries = array(
    'user' => array('name', 'bar'), 'car', 'foo'
);

echo var_export(isValidArray($array, $mandatoryKeys), true) . PHP_EOL;
echo var_export(isValidArray($array, $mandatoryKeysWithSubarray), true) . PHP_EOL;
echo var_export(isValidArray($array, $mandatoryKeysWithSubarrayInvalidEntries), true) . PHP_EOL;

function isValidArray($array, $mandatoryKeys)
{
    $isValid = true;

    foreach ($mandatoryKeys as $key => $value) {
        if (is_array($value)) {
            if ((!isset($array[$key]))
                || (!isValidArray($array[$key], $value))) {
                $isValid = false;
                break;
            }
        } else if (!isset($array[$value])) {
            $isValid = false;
            break;
        }
    }

    return $isValid;
}
