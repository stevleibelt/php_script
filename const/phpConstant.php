<?php

namespace A;

\a\B::c();

class B
{
  static public function c()
  {
    echo __CLASS__ . PHP_EOL;
    echo __METHOD__ . PHP_EOL;
    echo __FUNCTION__ . PHP_EOL;
  }
}
