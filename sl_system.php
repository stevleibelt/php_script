<?
/*
Simple class with usefull functions

2010-01-20
stev leibelt
*/

class sl_system{
	
	public function __construct(){
	
	}
	
	public function __destruct(){
		
	}

	public function validMAIL($mail){	//prueft ob die email ein "@"-Zeichen und ein "."-Punkt besitzt
		return (ereg("^.+@.+\\..+$", $mail)) ? TRUE : FALSE;
		unset($mail);
	}

	public function validGET($var, $mode = 'string'){
		
		if(isset($_GET[$var])){
			switch($mode){
				case 'string':
					return SL_SYSTEM::validString($_GET[$var]);
					break;
				case 'int':
					return SL_SYSTEM::validInt($_GET[$var]);
					break;
				case 'others': //keine Prüfung
					return ($_GET[$var]);
					break;
				default:
					return NULL;
			}
		}
		unset($mode, $var);
	}
	
	public function validPOST($var, $mode = 'string'){
		
		if(isset($_POST[$var])){
			switch($mode){
				case 'string':
					return SL_SYSTEM::validString($_POST[$var]);
					break;
				case 'int':
					return SL_SYSTEM::validInt($_POST[$var]);
					break;
				case 'others': //keine Prüfung
					return ($_POST[$var]);
					break;
				default:
					return NULL;
			}
		}
		unset($mode, $var);
	}
	
	public function generateTimestamp(){
		return mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));
	}

	public function generateUUID(){
		$randstr = md5(uniqid(mt_rand(), TRUE));
		$uuid = substr($randstr,0,8) . '-';
		$uuid .= substr($randstr,8,4) . '-';
		$uuid .= substr($randstr,12,4) . '-';
		$uuid .= substr($randstr,16,4) . '-';
		$uuid .= substr($randstr,20,12);
		return $uuid;
		unset($randstr, $uuid);
	}
	
	public function validString($string){
		return addslashes($string);
		unset($string);
	}
	
	public function validInt($int){
		return (int)$int;
		unset($int);
	}

	public function validSessionID($sid){
		return (strlen($sid)<32) ? $sid.SYSTEM::addChar('0', (32-strlen($sid))) : ( (strlen($sid)>32) ? substr($sid, 0, 32) : $sid);	//verlaengert oder verkuerzt sid auf 32 zeichen
		unset($sid);
	}

	public function addChar($length, $char){
		$return = '';
		for($i=0;$i<strlen($length);$i++){
			$return .= $char; 
		}
		return $return;
		unset($return, $char, $length);
	}
}
?>