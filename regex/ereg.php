<?php
testReg('https://foo.bar.net/foo/bar/index.html');
testReg('https://foo.bar.net/barz/index.html');

function testReg($url){
  if (ereg('barz', $url) !== FALSE) {
    echo 'barz!' . PHP_EOL;
  }else{
    echo 'nothing' . PHP_EOL;
  }
}
