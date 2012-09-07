<?php

$url_wsdl = 'http://dev.singles.freenet.de/Soap/index/index/?wsdl=show';

$client = new SoapClient($url_wsdl);

echo '<br>--output->soap_server->functionlist';

echo '<br>';
var_dump($client->__getFunctions());
echo '<br>';

echo '<br>--trying to use function "helloWorld"';
echo '<br>'.$client->helloWorld();


/*
$parameters = array(	new SoapParam('10', 'sum1'),
						new SoapParam('20', 'sum2')
					);

$result = $client->__call(	"addiere", 
							$parameters,array(	"uri" => "urn:xmethodsTestServer",             
												"soapaction" => "urn:xmethodsTestServer#addiere"     //irgendein Platzhalter
));

echo $result;
*/
?> 
