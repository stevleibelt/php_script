<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$foo = new Foo(new Bar(), new Bar());
$foofoo = new Foo(new Bar());

class Foo
{
  //public function __constructor(Bar $bar, Bar $barTwo = null)
  public function __constructor(Bar $bar, Bar $barTwo)
  {
  }
}

class Bar
{
  public function __construct()
  {
  }
}

