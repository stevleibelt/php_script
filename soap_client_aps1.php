<?PHP

//$server = 'http://developwww.sc.freenet.de/manage/soap/';
$server = 'http://aps1.sc.freenet-rz.de:8020/manage/soap/';
$service = 'mobile/index.html?wsdl';

$url = $server.$service;
$out = '';

/*
$client = new SoapClient(NULL, array(	"location" => $url,
										"uri" => "urn:xmethodsTestServer",
										"style" => SOAP_RPC, 
										"use" => SOAP_ENCODED
						));
*/

$client = new SoapClient($url, array('trace'=>1,
									 'exceptions'=>0));

$functions = $client->__getFunctions();
if(is_soap_fault($functions))
{
	$out .= '<br>soap-Aufruf fehlgeschlagen!<br>Fehlernummer: '.$functions->faultcode.'<br>Fehlermeldung: '.$functions->faultstring;
}

//__OUT

$out .= '<br>getFunctions::';
if( is_array($functions))
{
	$out .= '<br>';
	$out .= var_export($functions, true);
}
else
	$out .= $functions;
$out .= '<br>';

$cid = 721248018;
$pid = 3280380;
$out .= '<br>call->getProfileDataByProfileId('.$pid.'))';

//$result = $client->__soapCall('getProfileIdsByCid', array('cid' => 719281276));

if(!isset($_GET['soapCall']))
{
	echo $out;
	echo '<br>file_get_contents('.$url.')<br>';
	echo file_get_contents($url);
	echo '<br>LastResponse<br>'.$client->__getLastResponse();
}
else
{
	try
	{
		switch($_GET['soapCall'])
		{
			case 0:
				$result = $client->__soapCall('getProfileDataByProfileId', array('pid' => $pid));
				break;
		}
	}
	catch (SoapFault $exception)
	{
		echo '<br>EXCEPTION::<br>'.$exception;
		echo '<br>LastHeaderResponse<br>'.$client->__getLastResponseHeaders();
		echo '<br>LastResponse<br>'.$client->__getLastResponse();
		echo '<br>LastRequest<br>'.$client->__getLastRequest();
	}

	echo trim(var_export($result));
	echo '<br>LastHeaderResponse<br>'.$client->__getLastResponseHeaders();
	echo '<br>LastResponse<br>'.$client->__getLastResponse();
	echo '<br>LastRequest<br>'.$client->__getLastRequest();

	echo '<br>----<br>';
	echo var_export($client->getProfileDataByProfileId($pid));
}
?> 
