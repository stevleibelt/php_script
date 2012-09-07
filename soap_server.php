<?PHP

function helloWorld()
{
	return 'Hello Stev';
}

function  addiere($sum1, $sum2)
{
    return $sum1 + $sum2;
}

$server = new SoapServer(NULL,
 array('uri' => "http://http://dev.scripts/soap.php"));

$server->addFunction('addiere');            //Funktion zum Server hinzufügen
$server->addFunction('helloWorld');

$server->handle();                     //Hier wird die Abfrage abgearbeitet 

?>
