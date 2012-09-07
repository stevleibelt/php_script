<?PHP
/*
**URL-Renamer
****Just a little skript to change some Pathnames into "nice" names
**Author
****artodeto(at)arcor(dot)de
**Date
****2008_10_27
**Version
****0-0-0-1
**Licence
****This Program is licensed under the terms of the GPL3
*/

/*
**Hier wird gezeigt, wie du die Klasse anwendest
*/
$renamer = new renamer('Bergen', '\Galerie/');	//Objekt aus Klasse generieren

//Ein Beispiel
$teststring1 = "http://illqualizer.il.funpic.de/Fotos/Bergen/tn_Bergen16.jpg";
$teststring2 = "\Galerie/Bergen/tn_Bergen16.jpg";

//Ein wenig Ausgbae zur Ueberpruefung das alles geht
echo 'what it is:<br>'.$teststring1.'<br>';
echo 'what it should be:<br>'.$teststring2.'<br>';
echo '<br>';
//Der eigentliche Funktionsaufruf
echo $renamer->getNewName($teststring1).'<br>';

/*
**Hier ist die Klasse, die alles macht.
*/
class renamer{
	
	var $needle;
	var $prename;
	
	public function __construct($needle, $prename){
		$this->setHackNeedle($needle);
		$this->setprename($prename);
	}
	
	public function __destruct(){
		unset($this->needle);
		unset($this->prename);
	}
	
	public function getNewName($url){
		return $this->prename.strstr($url, $this->needle);
	}
	
	private function setHackNeedle($needle){
		$this->needle = $needle;
	}
	
	private function setPrename($prename){
		$this->prename= $prename;
	}
}
?>