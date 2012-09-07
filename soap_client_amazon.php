<?php

$wsdl_url =
  "http://soap.amazon.com/schemas3/AmazonWebServices.wsdl";

$client     = new SoapClient($wsdl_url);

echo '<br>output->soap_server->functions';
var_dump($client->__getFunctions());

echo '<br>trying->ArtistSearchRequest(\'Anthony Rother\')';
echo $client->ArtistSearchRequest('Anthony Rother');

?>
