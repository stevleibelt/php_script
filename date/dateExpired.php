<?php
date_default_timezone_set('Europe/Berlin');
$date = '2009-02-28 00:00:01';

echo 'date to validate: ' . $date . PHP_EOL;

if( !isExpired($date) ){
  echo 'not expired' . PHP_EOL;
}else{
  echo 'is expired' . PHP_EOL;
}

function isExpired($date)
{
  if (isset($date)) {
    return  strtotime($date) < time();
  } else {
    return false;
  }
}

