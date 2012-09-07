<?php
Interface Vehicle
{
	public function start($key);
	public function setSpeed($speed);
}

Abstract Class Car implements Vehicle
{
	abstract public function setFabricatorId($id);
	abstract public function setModelName($name);
	abstract public function start($key);
}

Class MyCar extends Car
{
	public function __construct()
	{
		echo 'Hello, i am ' . __CLASS__ . '.';
	}

	public function start($key) {}
	public function setSpeed($speed) {}
	public function setFabricatorId($id) {}
	public function setModelName($name) {}
}

$myCar = new MyCar();
