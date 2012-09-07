<?

$template = file_get_contents('test.tpl');	//liest das template ein

echo "\n".'Unangetastetes template<br>';
echo $template;

include_once('test.php');
foreach($content as $pattern){
	$template = preg_replace("/\{".$pattern[0]."\}/", $pattern[1], $template);
}
echo "\n".'<br>Angetastetes template<br>';
echo $template;
?>