<?PHP

define('LANGUAGE', 'en_EN');
define('TEMPLATENAME', 'superTemplate');
define('TMPL_MANAGER_EXTENSION', '.html');

echo '-=]Standard[=-';
$templateName = TEMPLATENAME.'_'.substr(LANGUAGE, 0, 2);
echo '<br>'.$templateName;
$templateName = substr($templateName, 0, (strlen($templateName)-3));
echo '<br>'.$templateName;

echo '<br><br>-=]With Extension[=-';
$templateName = getTemplateName();
echo '<br>'.$templateName;
$templateName = substr($templateName, 0, (strlen($templateName)-strlen(TMPL_MANAGER_EXTENSION)-3));
$templateName .= TMPL_MANAGER_EXTENSION;
echo '<br>'.$templateName;

echo '<br><br>-=]Harder-Faster-Stronger[=-';
$templateName = getTemplateName();
if($templateName = substr($templateName, 0, (strlen($templateName)-strlen(TMPL_MANAGER_EXTENSION)-3)).TMPL_MANAGER_EXTENSION) echo '<br>'.$templateName;

function getTemplateName(){
	$templateName = TEMPLATENAME.'_'.substr(LANGUAGE, 0, 2);
	$templateName .= TMPL_MANAGER_EXTENSION;
	return $templateName;
	unset($templateName);
}

	function readTemplate( $templateName, $addext = true, $absURI = false) {

		if((LANGUAGE == 'en_EN')){
			$templateName .= '_'.substr(LANGUAGE, 0, 2);
		}
		if( $addext === true)
			$templateName .= TMPL_MANAGER_EXTENSION;

		if( $absURI === true)
			$path = $templateName;
		else
			$path = PATH_TO_TEMPLATES . $templateName;

		if(file_exists($path)) {
			$content =  TmplManager::getFileContent($path);
			$content = TmplManager::replaceDefaultPlaceholder($content);
			return $content;
		}else {
			echo "Template doesn't exist (".$path.")";
			return null;
		}
	}

?>