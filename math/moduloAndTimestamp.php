<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-18
 */

//available seconds
$seconds = array(1, 2, 3, 4, 6, 9, 15);
$initialTime = time();
//number of loops
$loops = 53;

echo str_repeat('-', 40) . PHP_EOL;
echo 'initial time ' . $initialTime . PHP_EOL;
echo str_repeat('-', 40) . PHP_EOL;

for($i=0;$i<$loops;$i++) {
    $currentTime = time();
    $timeDifference = $currentTime - $initialTime;

    echo 'current loop: ' . ($i+1) . '/' . $loops . PHP_EOL;
    echo str_repeat('-', 20) . PHP_EOL;
    echo 'current time ' . $currentTime . PHP_EOL;
    echo 'time difference ' . $timeDifference . PHP_EOL;
    echo str_repeat('-', 20) . PHP_EOL;

    foreach ($seconds as $second) {
        $isTriggered = (($timeDifference % $second) === 0);
        echo $second . ' is triggered ' . ($isTriggered ? 'yes' : 'no') . PHP_EOL;
    }
    echo str_repeat('-', 40) . PHP_EOL;
    sleep(1);
}
