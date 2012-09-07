<?
$template = file_get_contents('test.tpl');

$needle = '{TEMPLATE_';
echo substr(	$template,						//string
				strpos($template, $needle),		//startposition
				(	strpos($template, '}')		//length
				-strpos($template, $needle)
				+1
				)
			);
?>