<?php
namespace url;
//$url = URL_getScriptUrl();
//echo 'this url is ' . $url;

function getScriptUrl()
{
  $url = '';
  $protocol = 'http';
  $path = $_SERVER['REQUEST_URI'];

  if ( isset($_SERVER['HTTPS']) 
      && $_SERVER['HTTPS'] == 'on') {
    $protocol .= 's';
  }

  if ($_SERVER['SERVER_PORT'] != 80) {
    $port = $_SERVER['SERVER_PORT'];
    $usePort = true;
  } else {
    $usePort = false;
  }

  $url .= $protocol . '://' . $_SERVER['SERVER_NAME'];

  if ($usePort) {
    $url .= ':' . $port;
  }

  $url .= $path;

  return $url;
}
