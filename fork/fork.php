<?php

ini_set('max_execution_time', 300); 

$numberOfChilds = 10;
$pids = array();
$startTime = date('H:i:s', mktime());

for($i=1; $i<=$numberOfChilds; $i++) {
    $pid = pcntl_fork();
    if($pid === -1) {
        exit('Could not fork process.' . "\n");
    } elseif ($pid) {
        $pids[$i] = $pid;
        continue;
    } else {
        executeTask($i);
        break;
    }
}

//erzeuge endlosschleife
while(true) {
    $numberOfProcess = 0;
    foreach($pids as $processNumer => $pid) {
        $status = null;
        $result = pcntl_waitpid($pid, $status, WNOHANG);
        if($result === 0) {
            $numberOfProcess++;
        }
        if($numberOfProcess == 0) {
            echo 'script startet at ' . $startTime . "\n";
            echo 'script ended at ' . date('H:i:s', mktime()) . "\n";
            exit('All process finished' . "\n");
        }
        echo 'Process with number ' . $numberOfProcess . ' and pid ' . $pid . ' sill working' . "\n";
        sleep(1);
    }
}

function executeTask($i)
{
    echo 'Process with number ' . $i . ' starts working' . "\n";
    $time = rand(10, 20);
    sleep($time);
    echo 'Process with number ' . $i . ' finished work in ' . $time . ' seconds' . "\n";
    exit();
}