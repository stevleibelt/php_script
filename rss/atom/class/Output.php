<?php
/**
 * The Output provides the general ability to output data in a well formed way
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
class Output implements Config, Errorcode
{
    protected static $dataKeys = array('link', 'title', 'author', 'createdate');

    protected $config;
    protected $data;
    protected $isDataLoaded;

    public static function getDataKeys()
    {
        return self::$dataKeys;
    }

    public function __construct()
    {
        $this->setIsDataLoaded(false);
    }

    public function build()
    {
        
    }

    //TODO
    public function getErrorCode()
    {
        ;
    }

    public function addData($section, $data)
    {
        $isData = ((is_array($data)) && (count($data) > 0));
        $result = false;
        $isSection = ((is_string($section)) 
                       || ((is_array($section)) && (count($section) > 0)));

        if($isData && $isSection) {
            $keys = self::getDataKeys();
            $dataToSet = array();
            $numberOfKeys = count($keys);
            $result = true;

            foreach($data as $dataset) {
                $set = array();
                foreach($keys as $key) {
                    if(isset($dataset[$key])) {
                        $set[$key] = $dataset[$key];
                    } else {
                        continue;
                    }
                }
                if(count($set) === $numberOfKeys) {
                    $dataToSet[] = $set;
                }
            }

            if(count($dataToSet) > 0) {
                $dataToSet = array_merge($dataToSet, (array)$this->data);
                $this->data = $dataToSet;
                $this->setIsDataLoaded(true);
            }
        }

        return $result;
    }

    public function addXmlData($section, $xmlData)
    {
        $isXml = (is_a($xmlData, 'SimpleXMLElement'));
        $result = false;
        $isSection = ((is_string($section)) 
                       || ((is_array($section)) && (count($section) > 0)));

        if($isSection && $isXml) {
            $keys = self::getDataKeys();
            $dataToSet = array();
            $numberOfKeys = count($keys);
            $result = true;
            $entryTag = $this->config['tag']['entry'];
            $xmlData = $xmlData->$entryTag;

            foreach($xmlData as $xmlDataset) {
                $set = array();
                foreach($keys as $key) {
                    if(isset($this->config['tag'][$key])) {
                        $tag = $this->config['tag'][$key];
                        if(isset($xmlDataset->$tag)) {
                            $set[$key] = $xmlDataset->$tag;
echo xdebug_var_dump($key);
echo xdebug_var_dump($set[$key]);
                        } else {
                            continue;
                        }
                    } else {
                        continue;
                    }
                }

                if(count($set) === $numberOfKeys) {
                    $dataToSet[] = $set;
                }
            }

echo xdebug_var_dump($dataToSet);

            if(count($dataToSet) > 0) {
                $dataToSet = array_merge($dataToSet, (array)$this->data);
                $this->data = $dataToSet;
                $this->setIsDataLoaded(true);
            }
        }

        return $result;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setConfig($config)
    {
        $this->config = $config;

        return true;
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

    protected function setIsDataLoaded($boolean)
    {
        $result = false;

        if(is_bool($boolean)) {
            $this->isDataLoaded = $boolean;
            $result = true;
        }

        return $result;
    }
}