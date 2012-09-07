<?PHP
//include_once 'SOAP/Client.php';

include_once '/usr/lib/zend/plugins/org.eclipse.php.core_2.2.0.v20100324-1300/Resources/language/php5.3/soap.php';

//include_once '/usr/lib/zend/plugins/org.eclipse.php.core_2.2.0.v20100324-1300/Resources/language/php5/soap.php';

class Weather
{
	public $tmp;
	public $zipcode;

	private $__wsdl;
	private $__soapClient;

	public function __construct($zipcode)
	{
		$this->zipcode = $zipcode;
		$this->__getTemp($zipcode);
	}

	private function __getTemp($zipcode)
	{
		if(!$this->__soapClient)
		{
			$query = 'http://www.xmethods.net/sd/2001/TemperatureService.wsdl';
			$wsdl = new SOAP_WSDL($query);
			$this->__soapClient = $wsdl->getProxy();
		}
		$this->tmp = $this->__soapClient->getTemp($zipcode);
	}
}

function generate_navigation_weather($zip)
{
	$weather = new Weather($zip);
	?>
	The current Temperatur in <?= $weather->zipcode ?> is:<br />
	<?= $weather->temp ?>
	<?PHP
}

generate_navigation_weather(09599);
?>
