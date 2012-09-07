<?php
//soap client for dev.test.url.soap

$soap_server_url ="http://dev.test.url/soap/soap.php"; 

$client = new SoapClient(NULL, array(	"location" => $soap_server_url,
										"uri" => "urn:xmethodsTestServer",
										"style" => SOAP_RPC, 
										"use" => SOAP_ENCODED
						));

$parameters = array(	new SoapParam('10', 'sum1'),
						new SoapParam('20', 'sum2')
					);

$helloWorld = $client->__call( 'helloWorld', array());

$addiere = $client->__call(	"addiere", 
							$parameters,array(	"uri" => "urn:xmethodsTestServer",             
												"soapaction" => "urn:xmethodsTestServer#addiere"     //irgendein Platzhalter
));


$tab = '&nbsp;&nbsp;';

echo '<br>soap_server_url::<br>'.$tab.$soap_server_url;
echo '<br>';
echo '<br>hellowWorld::<br>'.$tab.$helloWorld;
echo '<br>addiere::<br>'.$tab.$addiere;

?> 
