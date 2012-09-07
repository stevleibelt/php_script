<?php

//----------------------------------------------------------------
//============================
//----------------------------------------------------------------
class foo {

    public function __construct()
    {
        //simplexml
        $content = $this->getContentFromUrl($config['url']);
        $xml = new SimpleXMLElement($content);
        $entrys = $xml->$config['tag']['entry'];

        $html = '';

        foreach($entrys as $entry) {
            $html .= "\n" . getHtmlRssItem($entry->link, $entry->title, $entry->published);
        }

        $html = $this->getHtml($html);

        exit(xdebug_var_dump($html));
    }

    public function get_url_data()
    {
        $xml_content = $this->get_url("http://wordpress.org/development/feed/");
        $dom = new DOMDocument();
        @$dom->loadXML($xml_content);
        $xpath = new DomXPath($dom);
        $content_title = $xpath->query('//channel//title/text()');
        return $content_title;
    }

    public function getContentFromUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function getHtml($items)
    {
        return 
    '<h3 class="serendipitySideBarTitle serendipity_plugin_remoterss">blog.fefe.de</h3>
        <div class="serendipitySideBarContent">
            ' . $items . '
            <div class="serendipity_edit_nugget">
        </div>
        <div class="serendipitySideBarFooter"></div>
    </div>';
    }

   public  function getHtmlRssItem($url, $title, $date)
    {
        return
    '<div class="rss_link">
        <a target="_blank" href="' . $url . '">' . $title . '</a>
    </div>
    <br>
    <div class="serendipitySideBarDate">' . $date . '</div>
    </div>';
    }
}