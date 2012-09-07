<?php
//__vars
define('NL', '<br />' . "\n");
$allowedSleepTimes = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20);
$sleepTime = (int) $_GET['time'];
$return = '';

//__code
if(in_array($sleepTime, $allowedSleepTimes)) {
   $return .= 'going into sleep for ' . $sleepTime . ' seconds at ' . date('H:i:s') . NL; 
    sleep($sleepTime);
   $return .= 'waking up at ' . date('H:i:s') . '.' . NL; 
} else {
    $return .= 'computer says no.' . NL;
}

//__out
echo $return;
