<?php
//__var
//___define
ini_set('max_execution_time', 300); 
if(is_array($argv) === true) {
    if(in_array('cli', $argv)) {
    define('NL', "\n");
    } else {
        define('NL', '<br />' . "\n");
    }
} else {
    exit('I\'m not such a script.');
}
//___set
$baseUrl = 'http://local.php.script/fork/server.php?time=';
$numberOfChilds = 10;
$pids = array();
$processes = array();
$startTime = date('H:i:s', mktime());

/*
for($i=1; $i<=$numberOfChilds; $i++) {
    $pid = pcntl_fork();
    if($pid === -1) {
        exit('Could not fork process.' . NL);
    } elseif($pid) {
        $pids[$i] = $pid;
        continue;
    } else {
        $processes[$i] = array('time'=>rand(1, 20));
        executeTask($processes[$i]['time'], $baseUrl);
    }
}
*/

for($i=1; $i<=$numberOfChilds; $i++) {
    $processes[$i] = array('time' => rand(1, 20));
}

//__code
//___step 1 - forking process
foreach($processes as $process => $options) {
    $pid = pcntl_fork();
    if($pid === -1) {
        exit('Could not fork process.' . NL);
    } elseif ($pid) {
        $pids[$process] = $pid;
        continue;
    } else {
        executeTask($options['time'], $baseUrl);
        break;
    }
}

//___step 2 - run script until all process have finished their work
while(true) {
    $numberOfProcess = 0;
    foreach($pids as $processNumer => $pid) {
        $status = null;
        $result = pcntl_waitpid($pid, $status, WNOHANG);
        if($result === 0) {
            $numberOfProcess++;
        }
        if($numberOfProcess == 0) {
            $string = NL;
            $string .= 'All process finished' . NL;
            $string .= NL;
            $string .= 'output statistics' . NL;
            $string .= '+---------------+---------------+' . NL;
            $string .= "|    process\t| Execution Time |" . NL;
            $string .= '+---------------+---------------+' . NL;
            foreach($processes as $i => $options) {
                $string .= "|\t" . $i . "\t|\t" . $options['time'] . "\t|" . NL;
            }
            $string .= '+---------------+---------------+' . NL;
            $string .= 'script startet at ' . $startTime . NL;
            $string .= 'script ended at ' . date('H:i:s', mktime()) . NL;
            exit($string);
        }
        echo 'Process with number ' . $numberOfProcess . ' and pid ' . $pid . ' sill working' . NL;
        sleep(1);
    }
}

function executeTask($time, $url)
{
    $url = $url . $time;
    echo 'open url::' . $url . NL;
    echo fetchHttp($url);
    exit();
}


function fetchHttp($url)
{
    $errorCode = '';
    $httpErrorCodes = array(400, 401, 402, 403, 404);
    $result = false;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);

    $errorCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if(in_array($errorCode, $httpErrorCodes) !== true) {
        $result = $data;
    } else {
        $result = 'Error accured::' . $errorCode;
    }

    return $result;
}
