<?php

$modes = mcrypt_list_modes();
$algorithms = mcrypt_list_algorithms();
foreach($algorithms as $cipher)
{
    echo 'cipher::' . $cipher . PHP_EOL;
    foreach($modes as $mode)
    {
        echo 'mode::' . $mode . PHP_EOL;
        @$td = mcrypt_module_open(
            $cipher,
            '/usr/local/libmcrypt-2.5.8/modules/algorithms/',
            $mode,
            '/usr/local/libmcrypt-2.5.8/modules/modes/');
        @$key_size = mcrypt_enc_get_key_size($td);
        @$block_size = mcrypt_get_block_size($cipher,$mode);
        @$iv_size = mcrypt_get_iv_size($cipher, $mode);
        @mcrypt_module_close($td);

        echo 'keysize::' . ((!is_null($key_size)) ? $key_size : 'n/a') . PHP_EOL;
        echo 'blocksize::' . ((!is_null($block_size)) ? $block_size : 'n/a') . PHP_EOL;
        echo 'iv_size::' . ((!is_null($iv_size)) ? $iv_size : 'n/a') . PHP_EOL;

        unset($td, $key_size, $block_size, $iv_size);
    }
}

