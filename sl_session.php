<?
/*
Simple Sessionclass

2010-01-20
stev leibelt
*/

class sl_session{
	
	public function __construct(){
		$this->setSession();
	}
	
	public function __destruct(){
		
	}

	public function getSessionVar($var){
		return (isset($_SESSION[$var])) ? SL_SYSTEM::validString($_SESSION[$var]) : NULL;
		unset($var);
	}

	public function setSessionVar($varname, $varcontent){
		$_SESSION[SL_SYSTEM::validString($varname)] = SL_SYSTEM::validString($varcontent);
		unset($varcontent, $varname);
	}

	public function setSession($mode = 'start'){
		if($mode == 'start'){
			if(!session_id()) session_start();
		}
		if($mode == 'kill') session_destroy();
		unset($mode);
	}
}
?>