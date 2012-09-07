<?PHP
//based on: http://www.phpsnaps.com/snaps/view/rijndael-256-bit-encryption-using-mcrypt/

$key = '34FskofBn49dvBawF3hVVd4Bwh648430';	//32 byte, cause auf 256 bit
$string = 'Ich bin ein Teststrings';
$encrypt = mc_encrypt($string, $key);
//$encrypt = '1l824vT7f2a1B423V+o0+hi0DmVamxoVp7HrV40Enmc=';

echo 'key::'.$key.'<br>';
echo 'string::'.$string.'<br>';
echo 'encrypt::'.$encrypt.'<br>';
echo 'decrypt::'.mc_decrypt($encrypt, $key).'<br>';

//encrypt function
function mc_encrypt($encrypt, $mc_key)
{
	$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
	$passcrypt = trim(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $mc_key, trim($encrypt), MCRYPT_MODE_ECB, $iv));
	$encode = base64_encode($passcrypt);

	return $encode;
}

//decrypt function
function mc_decrypt($decrypt, $mc_key)
{
	$decoded = base64_decode($decrypt);
	$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
	$decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $mc_key, trim($decoded), MCRYPT_MODE_ECB, $iv));

	return $decrypted;
}
?>
