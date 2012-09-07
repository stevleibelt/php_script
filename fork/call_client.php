<?php
//__var
define('NL', '<br />' . "\n");

//__code
echo 'call_client::executing systemcall' . NL;
system('php client.php');
echo 'finished :-)' . NL;
