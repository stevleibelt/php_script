<?PHP

$classes = array();
$class = array('foo', 'bar');

foreach($class as $item){
	$classes[$item] = new $item;
}

echo '<br>';
$classes['foo']->meltMe();
$classes['bar']->meltYou();

class foo{
	public function __construct(){
		echo '<br>there is foo!';
	}
	
	public function meltMe(){
		echo '<br>But gods will is';
	}
}

class bar{
	public function __construct(){
		echo '<br>there is bar!';
	}

	public function meltYou(){
		echo '<br>There is no foo without a bar!';
	}
}
?>