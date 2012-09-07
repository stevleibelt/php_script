<?php
/**
 * @author sleibelt
 * @since 2011-06-10
 */
//__VARS
$a = array(0 => array(), 1 => array(), 2 => array());
$getI = 6;

//__GENERATE TESTCONTENT
for($i=0;$i<$getI;$i++)
{
	$a[0][$i] = array('name' => 'Scheibe '.$i, 'weight' => $i);					//array(key = name, value = weight)
}

//__CODE
$a = order($a);
$i = $a[1];
$a = $a[0];

exit(xdebug_var_dump(array('steps'=>$i, 'a'=>$a)));

function order($a)
{
	$i = 0;
	while( ( count($a[0]) > 0 ) )
	{
		$indexTops = getTops($a);
//$indexTops[1] = array('name' => 'schwing', 'weight' => 213);
//$indexTops[2] = array('name' => 'schwing', 'weight' => 203);
		$c_indexTops = count($indexTops);										//get size of $indexTops
		$moved = false;															//top argument from $a[0] is not moved
		$top0 = getTop($a[0]);
//debug($indexTops);
//debug($top0);
		while( ( $moved !== true ) )
		{
			$j = 0;
			$freeSlot = getFreeSlot($indexTops, $top0);
//debug($freeSlot);
			if( ( $freeSlot !== false ) )										//found a free slot
			{
				array_unshift($a[$freeSlot], array_shift($a[0]));
				$moved = true;
				break;
			}
			$j++;
if($j > 3) { debug($a); }
		}
		$i++;
if($i > 3) { debug($a); }
	}

	return array($a, $i);
}

/**
 * Compares to array by key "weight"
 *
 * @author sleibelt
 * @param array $a0
 * @param array $a1
 * @param int $o, order = 0 $a0 < $a1, else $a0 > $a1
 * @return boolean 
 * @since 2011-06-10
 */
function isLighter($a0, $a1, $o = 0)
{
	if( ( $o === 0 ) )
	{
		$b = ( ( isset($a1['weight']) !== true ) ||  
			   ( $a0['weight'] < $a1['weight'] ) ) ? true : false;
	}
	else
	{
		$b = ( ( isset($a0['weight']) !== true ) || 
			   ( $a0['weight'] > $a1['weight']) ) ? true : false;
	}
//debug(array('a0'=>$a0, 'a1'=>$a1, 'o'=>$o, 'b'=>$b));
	return $b;
}

/**
 * Search in array $a for a lighter index
 * If not found, return = false, else return = $key
 *
 * @param array $array
 * @param mixed $index, not false
 * @return mixed 
 */
function getFreeSlot($array, $index = false)
{
	$freeSlot = false;
	$index = ( ( $index === false ) ) ? getTop($array) : $index;
//debug($array);
//debug($index);
	foreach($array as $k => $v)
	{
//debug(array('k'=>$k, 'v'=>$v, 'index'=>$index, 'isLighter'=>isLighter($index, $v)));
		if( ( isLighter($index, $v) === true ) )
		{
//debug(array('k'=>$k, 'v'=>$v));
			$freeSlot = $k;
			break;
		}
	}

	return $freeSlot;
}

/**
 * usefull if you dont want to delete first element by using array_shift
 */
function getTop($a)
{
	return array_shift($a);
}

function getTops($a)
{
	$r = array();

	foreach($a as $k => $v)
	{
		$r[$k] = getTop($v);
	}

	return $r;
}

function debug($v)
{
	exit(xdebug_var_dump($v));
}