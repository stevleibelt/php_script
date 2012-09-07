<?
/*
A simple Test, if Sessionmanagement works on a Server.
Session-File one of two
needs the files "sl_system.php" and "sl_session.php" in the same directory

2010-01-20
stev leibelt
*/

define('FILENAME', 'test_session');
define('INDEX', FILENAME.'_01.php');
define('VARNAME', 'testVar');

include_once('sl_css.php');
include_once('sl_session.php');
include_once('sl_system.php');

SL_SESSION::setSession();
$sesstionVar = SL_SESSION::getSessionVar(VARNAME);

echo outputform($sesstionVar, 'get');
echo outputform($sesstionVar, 'post');

echo outputform($sesstionVar, 'get', FILENAME.'_02.php');
echo outputform($sesstionVar, 'post', FILENAME.'_02.php');

SL_SESSION::setSessionVar(VARNAME, ($sesstionVar+1));

function outputform($sesstionVar = 0, $method = 'get', $action = INDEX){

	$postVar = SL_SYSTEM::validPOST(VARNAME);
	$getVar = SL_SYSTEM::validGET(VARNAME);

	

	$method = ($method == 'post') ? 'post' : 'get';

	$return = '
		<form action="'.$action.'" method="'.$method.'">
			<table>
				<tr>
					<td>method</td>
					<td>'.$method.'</td>
				</tr>
				<tr>
					<td>action</td>
					<td>'.$action.'</td>
				</tr>
				<tr>
					<td colspan="2">Output</td>
				</tr>
				';
	if($method == 'post'){
		$return .= '
				<tr>
					<td>post</td>
					<td>'.$postVar.'</td>
				</tr>
				';
	}else{
		$return .= '
				<tr>
					<td>get</td>
					<td>'.$getVar.'</td>
				</tr>
				';
	}
	$return .= '
				<tr>
					<td>session</td>
					<td>'.$sesstionVar.'</td>
				</tr>
				<tr>
					<td colspan="2">Input</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="go" class="button1"></td>
				</tr>
				<input type="hidden" name="'.VARNAME.'" value="'.($postVar+1).'">
			</table>
		</form>
		';

	return $return;
	unset($action, $return);
}

function testInt($int){
	$int = ( (int)$int > 0) ? $int : 1;
	$int = ( (int)$int > 10) ? 1 : $int;
	return $int;
	unset($int);
}
?>