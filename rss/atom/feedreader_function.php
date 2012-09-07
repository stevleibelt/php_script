<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

//config
$config = array();
$config['refreshtime'] = 60*30;
$config['url'] = 'http://www.vtoc.de/feed/atom';
$config['dateformat'] = 'H:i d-m-Y';
$config['linktarget'] = '_BLANK';
$config['show']['entrys'] = 4;
$config['show']['createdate'] = 1;
$config['show']['title'] = 1;
$config['show']['author'] = 1;
$config['show']['favicon'] = 1;
$config['tag']['author'] = 'author';
$config['tag']['title'] = 'title';
$config['tag']['entry'] = 'entry';
$config['tag']['createdate'] = 'published';

try {
    $xml = fetchXml($config['url']);
    if(validXml($xml) === true) {
        $previousHash = '';
        $entry = $xml->$config['tag']['entry'];
        $hash = createHash($entry);
        if($previousHash !== $hash) {
            $entrys = readXml($xml);
        }
dump($entrys);
dump($xml);
    }
} catch (Exception $e) {
    echo 'Could not fetch the xml::' . $e->getMessage();
}

function readXml($xml) {
    global $config;
    $i = 0;

    dump($xml);
}

function createHash($string)
{
    return sha1($string);
}

function validXml($xml)
{
    return true;
}

function fetchXml($url)
{
    try {
        $data = fetchFromUrl($url);
        $xml = simpleXml_load_string($data);

        return $xml;
    } catch (Exception $e) {
        echo 'Bad Request::' . $e->getMessage();
    }
}

function fetchFromUrl($url)
{
    $data = false;
    $httpReturnCode = false;
    $httpErrorCodes = array(400, 401, 402, 403, 404);
    $result = array();

    if(strlen($url) > 0) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);

        $httpReturnCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if(in_array($httpReturnCode, $httpErrorCodes) === true) {
            throw new Exception('Bad Webserver Statuscode::' . $httpReturnCode);
        } else {
            $result = $data;

            return $result;
        }
    } else {
        throw new Exception('None valid URL');
    }
}

function dump($item) 
{
    exit(xdebug_var_dump($item));
}