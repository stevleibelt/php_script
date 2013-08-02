<?php
$mail = 'test@web.de';

$result = dns_get_record($mail);

echo 'email: ' . $mail . PHP_EOL;
echo var_export($result, true) . PHP_EOL;
