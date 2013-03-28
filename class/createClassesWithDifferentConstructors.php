<?php
/**
* This is an example that shows you how to deal with 
*  different constructors while you are extending a class.
* This example doesn't want to show you hidden magic, it 
*  is there to remember you how php is working.
* 
* @author artodeto
* @since 2013-03-28
*/

class A 
{
	protected $id;
	public function __construct($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}
}

class B extends A
{
	public function __construct($id = null)
	{
		if (!is_null($id)) {
			parent::__construct($id);
		}
	}
}

class C extends B
{
	protected $name;

	public function __construct($name, $id = null)
	{
		parent::__construct($id);
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}

$a = new A(123);
$b = new B();
$bWithId = new B(234);
$c = new C('Max');

echo var_export($a->getId(), true) . PHP_EOL;
echo var_export($b->getId(), true) . PHP_EOL;
echo var_export($bWithId->getId(), true) . PHP_EOL;
echo var_export($c->getId(), true) . PHP_EOL;
echo var_export($c->getName(), true) . PHP_EOL;
