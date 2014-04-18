<?
/**
 * checks if a filename (including a timestamp in format "YYMMDD")  is to old to be displayed
 * @todo old code needs a lot of love :-)
 *
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2008-11-21
 */

//__VAR
$body['bgcolor'] = '456789';
$security = new security;

//__CODE
HTML_buildHTMLHead($body);

//$filename = 'center_fragenseite_080201.phtml';		//Jede Datei hat die Endung *_YYMMDD.*
checkFiledate('center_details_81121.phtml');
echo '<br>';
checkFiledate('center_fragenseite_080201.phtml');
echo '<br>';
checkFiledate('center_details_081201.phtml');
echo '<br>';
checkFiledate('center_fragenseite_081101.phtml');
echo '<br>';
checkFiledate('center_fragenseite_neu.phtml');
echo '<br>';
checkFiledate('center_fragenseite_131006.phtml');
echo '<br>';
checkFiledate('center_details_81126.phtml');

HTML_buildHTMLBottom();

//__FUNCTIONS
function checkFiledate($filename)
{
	//__VAR
	global $security;
	$thArray = array('var', 'type', 'content');
	$tableStyle['border'] = '1px solid #333333';
	$tableStyle['background-color'] = '#EEEEEE';
	$contentThStyle = 'style="padding: 0 4px; border: 1px solid #333333; background-color: #AACCDD;"';
	$contentTdStyle = 'style="padding: 0 4px; border: 1px solid #333333; background-color: #FFFFFF;"';

	//__CODE
	HTML_buildTableHead($thArray, $tableStyle, $contentThStyle);
	HTML_outputVar('filename', $filename, $contentTdStyle);
	$filedate = substr(strrchr($filename, '_'), 1);			//Schneidet alles vor "_YYMMDD" aus dem Dateinamen
	$filedate = (int)substr($filedate, 0, strpos($filedate, '.'));	//Entfernt Dateiendung
	HTML_outputVar('filedate', ((int)$filedate), $contentTdStyle);
	//$date = (int)date('ymd');
	$date = (int)(date('ym').'01');
	HTML_outputVar('date', $date, $contentTdStyle);
	if(((int)$filedate) >= $date){
		//die('Dieses Gewinnspiel ist nicht mehr aktuell!');
		HTML_outputVar('access', '<b><font color="#228822">granted</font></b>', $contentTdStyle);
	}else{
		HTML_outputVar('access', '<b><font color="#882222">denied</font></b>', $contentTdStyle);
	}
	if(!$security->checkFiledate($filename)){
		HTML_outputVar('checkFiledate', 'Dieses Gewinnspiel ist nicht mehr aktuell!', $contentTdStyle);
		//die('Dieses Gewinnspiel ist nicht mehr aktuell!');
	}else{
		HTML_outputVar('checkFiledate', '', $contentTdStyle);
		//echo 'foobar!';
	}
	HTML_buildTableBottom();
	unset($date, $filedate, $filename, $tableStyle);
}

function getFiletype($var){
	return gettype($var);
	unset($var);
}

//____HTML
function HTML_buildHTMLBottom(){
	echo "\n".'</html>';
}

function HTML_buildHTMLHead($body = FALSE){
	if($body){
		echo "\n".'<html>'."\n".'<head></head>'."\n".'<body bgcolor="'.$body['bgcolor'].'">';
	}else{
		echo "\n".'<html>'."\n".'<head></head>'."\n".'<body>';
	}
}

function HTML_buildTableBottom(){
	echo "\n".'</table>';
}

function HTML_buildTableHead($thArray, $tableStyle = FALSE, $contentThStyle = ''){
	if(($tableStyle) && (is_array($tableStyle))){
		echo "\n".'<table style="';
		foreach($tableStyle AS $styleName => $style){
			echo $styleName.': '.$style.';';
		}
		echo '">';
	}else{
		echo "\n".'<table>';
	}
	if(count($thArray) > 0){
		echo "\n\t".'<tr valign="top">';
		foreach($thArray AS $th){
			echo "\n\t\t".HTML_buildTh($th, $contentThStyle);
		}
		echo "\n\t".'</tr>';
	}
	unset($th, $thArray);
}

function HTML_buildTd($content, $contentStyle = ''){
	echo '<td '.$contentStyle.'>'.$content.'</td>';
	unset($content);
}

function HTML_buildTh($content, $contentStyle = ''){
	echo '<th align="left" '.$contentStyle.'>'.$content.'</th>';
	unset($content);
}

function HTML_outputVar($varname, $content, $contentStyle = ''){
	echo "\n\t".'<tr>'."\n\t\t".HTML_buildTd($varname, $contentStyle)."\n\t\t".HTML_buildTd(getFiletype($content), $contentStyle)."\n\t\t".HTML_buildTd($content, $contentStyle)."\n\t".'</tr>';
	unset($content, $varname);
}

class security
{
	public function checkFiledate($filename)
    {
       	//Dateiname muss folgender Konvention genuegen: $NAME_YYMMDD.*, YYMMDD = Datum (Bsp. 831006)
		$return = FALSE;

		if (strlen($filename) > 0) {
			$filedate = substr(strrchr($filename, '_'), 1);
			$filedate = (int)substr($filedate, 0, strpos($filedate, '.'));
			$date = (int)date('ym').'01';
			$nextMonth = mktime(0, 0, 0, date('m')+1, 1, date('y'));
			if(($filedate >= $date) || ($filedate < $nextMonth)) ($return = TRUE);
		}

		return $return;
	}

	public function checkVars($variable = '', $startValue)
    {
        //wandelt $variable in int-Zahl um, Achtung, jede Zahl nach einem Text wird ignoriert
		$variable = (int) $variable;
		$startValue = (int) $startValue;
        $return = ($variable >= $startValue) ? $variable : $startValue;

		return $return;
	}
}
