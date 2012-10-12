<?php

$parent = new DarthVader();
$child = new LukeSkywalker();

echo 'parent hello world' . PHP_EOL;
$parent->helloWorld();

echo 'child hello world' . PHP_EOL;
$child->helloWorld();

echo 'child hello parent world' . PHP_EOL;
$child->helloParentWorld();

class DarthVader
{
  public function helloWorld()
  {
    echo 'Hello world, parent is calling' . PHP_EOL;
  }
}

class LukeSkywalker extends DarthVader
{
  public function helloWorld()
  {
    echo 'Hello world, child is calling' . PHP_EOL;
  }

  public function helloParentWorld()
  {
    parent::helloWorld();
  }
}
