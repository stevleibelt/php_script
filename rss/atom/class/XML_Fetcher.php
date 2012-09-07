<?php
/**
 * The XML_Fetcher provides the ability to load xml data from an http resource
 *
 * This is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * @author artodeto
 * @license http://www.gnu.org/licenses/
 * @package net.bazzline.php.feedreader
 * @since 2011-10-06
 */
require_once 'HTTP_Fetcher.php';

class XML_Fetcher extends HTTP_Fetcher implements Config
{
    protected $config;
    protected $isXmlLoaded;
    protected $isXmlDataProcessed;
    protected $xml;
    protected $xmlData;

    public function __construct($url)
    {
        parent::__construct($url);
        $this->setIsXmlLoaded();
        $this->setIsXmlDataProcessed();
    }

    public function loadData()
    {
        $result = $this->loadXml();

        $this->processXml();

        if($this->getIsXmlDataProcessed()) {
            $result = true;
        }
        //TODO
        /*
        if($this->isNewXmlData() === true) {
            $this->processXml();
        } else {
            $this->loadDataFromCache();
        }
        */

        return $result;
    }

    public function getConfig($section = false)
    {
        if($section !== false) {
            if(isset($this->config[$section])) {
                $result = $this->config[$section];
            } else {
                $message = __FILE__ . '::' . __CLASS__ . '::' . __METHOD__ . '::no valid section given->' . $section;
                throw new Exception($message);
            }
        } else {
            $result = $this->conifig;
        }

        return $result;
    }

    public function getIsXmlLoaded() {
        return $this->isXmlLoaded;
    }

    public function getIsXmlDataProcessed() {
        return $this->isXmlDataProcessed;
    }

    public function getXml()
    {
        return $this->xml;
    }

    /**
     * TODO
     * @return boolean 
     */
    protected function isNewXmlData()
    {
        return true;
    }

    protected function processXml()
    {
        $entrys = false;
        $tags = false;
        $result = false;
        $xml = false;

        if($this->getIsXmlLoaded()) {
            try {
                $tags = $this->getConfig('tag');
            } catch (Exception $e) {
                echo 'Could not load tags from config::' . $e->getMessage();
            }

            if($tags !== false) {
                $i = 0;
                $numberOfEntrys = $this->getConfig('numberOfEntrys');
                $xml = $this->getXml();
                $xml = $xml->$tags['entry'];

                foreach($xml as $entry) {
                    if($i < $numberOfEntrys) {
                        $entryData = array(
                            'link' => $entry->$tags['link'], 
                            'title' => $entry->$tags['title'], 
                            'createdate' => $entry->tags['createdate'], 
                            'author' => $entry->tags['author']);
                        $this->addDataEntry($entryData);
                        $i++;
                    } else {
                        continue;
                    }
                }

                if($i > 0) {
                    $this->setIsXmlDataProcessed(true);
                }

                $result = true;
            }
        }

        return $result;
    }

    protected function loadXml()
    {
        $result = false;

        if(parent::loadData()) {
            $xml = simpleXml_load_string($this->getData());

            if($xml !== false) {
                $result = $this->setXml($xml);
            }
        }

        return $result;
    }

    public function setIsXmlLoaded($boolean = false) {
        $this->isXmlLoaded = (is_bool($boolean)) ? $boolean : false;

        return true;
    }

    public function setIsXmlDataProcessed($boolean = false) {
        $this->isXmlDataProcessed = (is_bool($boolean)) ? $boolean : false;

        return true;
    }

    protected function setXml($xml)
    {
        $result = false;

        if(is_a($xml, 'SimpleXMLElement')) {
            $this->xml = $xml;
            $this->setIsXmlLoaded(true);
            $result = true;
        }

        return $result;
    }
}