<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

//----------------
//Interfaces
//----------------
require_once 'interface/Config.php';
require_once 'interface/Data.php';
require_once 'interface/Errorcode.php';
require_once 'interface/Fetcher.php';

//----------------
//Classes
//----------------
require_once 'class/HTML_Output.php';
require_once 'class/XML_Fetcher.php';

//----------------
//CODE
//----------------

$config = array();
$config['refreshtime'] = 60*30;
$config['url'] = 'http://www.vtoc.de/feed/atom';
$config['dateformat'] = 'H:i d-m-Y';
$config['linktarget'] = '_BLANK';
$config['numberOfEntrys'] = 4;
$config['show']['createdate'] = 1;
$config['show']['title'] = 1;
$config['show']['author'] = 1;
$config['show']['favicon'] = 1;
$config['tag']['author'] = 'author';
$config['tag']['link'] = 'link';
$config['tag']['title'] = 'title';
$config['tag']['entry'] = 'entry';
$config['tag']['createdate'] = 'published';

$nl = '<br />' . "\n";

$fetcher = new XML_Fetcher($config['url']);
$output = new HTML_Output();

if($fetcher->setConfig($config)) {
    echo 'Fetcher::Could set config.' . $nl;
    if($fetcher->fetch()) {
        echo 'Fetcher::Could fetch url.' . $nl;
        if($fetcher->loadData()) {
            echo 'Fetcher::Could load Data.'. $nl;
            if($output->setConfig($config)) {
                echo 'Output::Could set config' . $nl;
                if($output->addXmlData('', $fetcher->getXml())) {
                    echo 'Output::Could add data' . $nl;
                    if($output->getData()) {
                        echo 'Output::Could get data' . $nl;
                    } else {
                        echo 'Output::Could not get data' . $nl;
                    }
                } else {
                    echo 'Output::Could not add data' . $nl;
                }
            } else {
                echo 'Output::Could not set config' . $nl;
            }
        } else {
            echo 'Fetcher::Could not load Data.' . $nl;
        }
    } else {
        echo 'Fetcher::Could not fetch url.' . $nl;
    }
} else {
    echo 'Fetcher::Could not set config.' . $nl;
}