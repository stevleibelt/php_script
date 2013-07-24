<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-07-24
 */

$numberOfLoops = 4;
$currentLoop = 1;
$thrownNoExceptionAtLoop = rand(0,5); // 5 is to high, error is wished
$thrownNoExceptionAtLoop = 9; // 5 is to high, error is wished

echo str_repeat('-', 40) . PHP_EOL;
echo 'number of planned loops: ' . $numberOfLoops . PHP_EOL;
echo 'no exception expected at loop: ' . $thrownNoExceptionAtLoop . PHP_EOL;
echo str_repeat('-', 40) . PHP_EOL;
echo PHP_EOL;

while ($currentLoop <= $numberOfLoops) {
    echo 'loop: ' . $currentLoop . ' / ' . $numberOfLoops . PHP_EOL;
    try {
        if ($currentLoop == $thrownNoExceptionAtLoop) {
            echo 'No Exception thrown' . PHP_EOL;
            exit(0);
        }
        throwNewException('exception ' . $currentLoop . ' / ' . $numberOfLoops);
    } catch (Exception $exception) {
        echo 'Catched exception with message: ' . $exception->getMessage() . PHP_EOL;
        $currentLoop++;
    }
}

echo 'ERROR: This line should only be echoed if the throw no exception at loop is higher then the number of loops.' . PHP_EOL;
exit(1);

function throwNewException($message = 'the message is love')
{
    throw new Exception($message);
}
