<?php
//class
class cA implements iA
{
	public function foo()
	{
		echo __METHOD__ . PHP_EOL;
	}
}

class cB extends cA implements iB
{
	public function bar()
	{
		echo __METHOD__ . PHP_EOL;
	}
}


//interface
interface iA
{
	public function foo();
}

interface iB
{
	public function bar();
}

$a = new cA();
$b = new cB();

$a->foo();
$b->foo();
$b->bar();

if ($a instanceof iA) {
    echo 'a implements interface iA' . PHP_EOL;
} else {
    echo 'a does not implements interface iA' . PHP_EOL;
}

if ($a instanceof iB) {
    echo 'a implements interface iB' . PHP_EOL;
} else {
    echo 'a does not implements interface iB' . PHP_EOL;
}
