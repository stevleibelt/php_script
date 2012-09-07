<?php
$nl = '<br>' . PHP_EOL;

$array = array(
	0 => array(
		'level' => 0,
		'label' => 'zero',
	),
	1 => array(
		'level' => 1,
		'label' => 'one'
	),
	2 => array(
		'level' => 0,
		'label' => 'two',
	),
	3 => array(
		'level' => 2,
		'label' => 'three',
	),
);

$levelToFilter = 1;

$array2 = array_filter($array, function ($arrayItem) use ($levelToFilter) {
	return ($arrayItem['level'] !== $levelToFilter);
});

echo 'array::' . $nl;
echo xdebug_var_dump($array);
echo 'array2::' . $nl;
echo xdebug_var_dump($array2);
