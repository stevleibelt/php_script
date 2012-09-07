<?PHP
/*
Helperfile for reading directories
2010-02-09
Stev Leibelt
*/
define('DEFAULT_DIR', '.');
define('FILE_SPACER', '&nbsp;');

readDir2();

function readDir2($dir = DEFAULT_DIR, $order = 0){
	$a = array();
	$dirs = array();
	$files = array();
	$output = array();
	$useles = array(".", "..", ".DS_Store", "_notes", "Thumbs.db");

	$a = scandir($dir);
	$a = array_diff($a, $useles);
	$a_count = count($a);

	for($i=0;$i<=$a_count;$i++){
		if(is_dir($a[$i]))
			$dirs[] = $a[$i];
		if(is_file($a[$i]))
			$files[] = $a[$i];
	}

	if($order == 0){
		$output[] = linkDirs($dirs);
		$output[] = linkFiles($files);
	}else{
		$output[] = linkFiles($files);
		$output[] = linkDirs($dirs);		
	}
	output($output[0]);
	output($output[1]);
}

function output($a = array()){
	$count = count($a);
	for($i=0;$i<$count;$i++){
		if(strlen($a[$i])>0)
			echo $a[$i].'<br>'."\n";
	}
}

function linkDirs($dirs){
	$return = array();
	$count = count($dirs);
	for($i=0; $i<$count;$i++){
		$return[] = makeLink($dirs[$i], '', 'intern');
	}
	return $return;
	unset($dirs, $return, $count, $i);
}

function linkFiles($files){
	$return = array();
	$count = count($files);
	for($i=0; $i<$count;$i++){
		$return[] = makeLink($files[$i], FILE_SPACER, 'extern');
	}
	return $return;
	unset($files, $return, $count, $i);
}

function makeLink($name, $spacer = '', $mode = 'intern'){
	$return = $spacer.'<a href="'.$name.'"';
	if($mode == 'extern')
		$return .= ' target="_BLANK"';
	$return .= '>'.$name.'</a>';
	return $return;
	unset($return, $name, $mode);
}
?>