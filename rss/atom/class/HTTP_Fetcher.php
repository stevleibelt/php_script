<?php
/**
 * The HTTP_Fetcher provides the ability to load data from an http resource
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
class HTTP_Fetcher Implements Fetcher, Data, Errorcode
{
    protected $config;
    protected $data;
    protected $errorcode;
    protected $fetchedData;
    protected $isDataFetched;
    protected $isDataLoaded;
    protected $url;

    public function __construct($url) 
    {
        $this->setIsDataFetched(false);
        $result = $this->setUrl($url);

        return $result;
    }

    public function fetch()
    {
        $httpErrorCodes = array(400, 401, 402, 403, 404);
        $result = false;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        $data = curl_exec($ch);

        $this->setErrorcode(curl_getinfo($ch, CURLINFO_HTTP_CODE));
        curl_close($ch);

        if(in_array($this->getErrorcode(), $httpErrorCodes) !== true) {
            $result = $this->setFetchedData($data);
            $this->setIsDataFetched(true);
        }

        return $result;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getFetchedData() 
    {
        return $this->fetchedData;
    }

    public function getIsDataFetched()
    {
        return $this->isDataFetched;
    }

    public function getIsDataLoaded() 
    {
        return $this->isDataLoaded;
    }

    public function getErrorCode()
    {
        return $this->errorcode;
    }

    public function loadData()
    {
        $result = false;

        if($this->getIsDataFetched() === true) {
            $this->setData($this->getFetchedData());
            $result = true;
        } else {
            //TODO getErrorcode ->
        }

        return $result;
    }

    public function setConfig($config)
    {
        $result = false;

        if(!is_null($config)) {
            $this->config = $config;
            $result = true;
        }

        return $result;
    }

    protected function addDataEntry($value, $key = false)
    {
        $result = false;

        if($this->getIsDataLoaded()) {
            if(!is_array($this->data)) {
                $this->data[] = $this->data;
            }

            $result = true;
            if($key) {
                $this->data[$key] = $value;
            } else {
                $this->data[] = $value;
            }
        }

        return $result;
    }

    protected function setData($data) 
    {
        $this->data = $data;

        return true;
    }

    protected function setFetchedData($data)
    {
        $this->fetchedData = $data;

        return true;
    }

    protected function setIsDataFetched($boolean)
    {
        $this->isDataFetched = $boolean;

        return true;
    }

    public function setIsDataLoaded($boolean) 
    {
        $this->isDataLoaded = $boolean;

        return true;
    }

    protected function setErrorcode($errorcode)
    {
        $this->errorcode = $errorcode;

        return true;
    }

    protected function setUrl($url)
    {
        $result = false;

        if(strlen($url) > 0) {
            $this->url = $url;
            $result = true;
        } else {
            if(is_null($this->url) === true) {
                $this->url = '';
            }
        }

        return $result;
    }
}