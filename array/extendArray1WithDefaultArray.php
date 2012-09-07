<?php

$options = array(
  'myOption2' => 'two',
  'myOption3' => 'three'
);

$defaultOptions = array(
  'myOption1' => 'defaultOne',
  'myOption2' => 'defaultTwo',
  'myOption3' => 'defaultThree'
);

$extendedArray = extendOptionsWithDefaultOptions($options, $defaultOptions);
$mergedArray = array_merge($options, $defaultOptions);

echo 'extendedArray' . PHP_EOL . xdebug_var_dump($extendedArray) . PHP_EOL;
echo 'mergedArray' . PHP_EOL . xdebug_var_dump($mergedArray) . PHP_EOL;
echo '----------------' . PHP_EOL;
echo 'options' . PHP_EOL . xdebug_var_dump($options) . PHP_EOL;
echo 'defaultOptions' . PHP_EOL . xdebug_var_dump($defaultOptions) . PHP_EOL;

function extendOptionsWithDefaultOptions(array $options, array $defaultOptions)
{
  if ((is_array($defaultOptions) == true) 
      && (count($defaultOptions) > 0)) {
      foreach ($defaultOptions as $optionKey => $defaultValue)
      {
          if (!isset($options[$optionKey])) {
              $options[$optionKey] = $defaultValue;
          }
      }
  }
        
  return $options;
}
