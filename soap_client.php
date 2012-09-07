<?php

$client = new SoapClient(NULL, array(	"location" => "http://dev.scripts/soap_server.php",
										"uri" => "urn:xmethodsTestServer",
										"style" => SOAP_RPC, 
										"use" => SOAP_ENCODED
						));

$parameters = array(	new SoapParam('10', 'sum1'),
						new SoapParam('20', 'sum2')
					);

echo '<br>'.$client->__call( 'helloWorld', array());

$result = $client->__call(	"addiere", 
							$parameters,array(	"uri" => "urn:xmethodsTestServer",             
												"soapaction" => "urn:xmethodsTestServer#addiere"     //irgendein Platzhalter
));

echo '<br>'.$result;

?> 
