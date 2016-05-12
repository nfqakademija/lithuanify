<?php

namespace LithuanifyBundle\Crawler\Ru\Mk;

use LithuanifyBundle\Crawler\Ru\Mk\Parser;

class Crawler
{
    private $apiKey;
    private $outerUrl;
    private $innerUrl;
    private $outerFirstPage;
    private $parser;

    function __construct($apiKey, $innerUrl, $outerUrl, $outerFirstPage, Parser $parser)
    {
        $this->apiKey = $apiKey;
        $this->innerUrl = $innerUrl;
        $this->outerUrl = $outerUrl;
        $this->outerFirstPage = $outerFirstPage;
        $this->parser = $parser;
    }

    public function getOuterPage($url = null)
    {
        $outerCrawlerUrl = $this->buildOuterPageUrl($url);
        $outerPage = json_decode($this->makeRequest($outerCrawlerUrl));

        if ($outerPage->pageData->statusCode != 200) {
            return false;
        }

        foreach ($outerPage->extractorData->data[0]->group[0]->LINK as $source) {
            $innerPageData = $this->getInnerPage($source->href);
            $pageInfo = $this->parser->parsePage($innerPageData);
            $pageInfo['url'] = $source->href;
            $this->parser->persistPage($pageInfo);
        }

        $nextPage = null;

        if (isset($outerPage->extractorData->data[0]->group[0]->Next[0]->href)) {
            $nextPage = $outerPage->extractorData->data[0]->group[0]->Next[0]->href;
        }

        $this->parser->flush();

        return $nextPage;
    }

    private function getInnerPage($url)
    {
        $innerPageUrl = $this->buildInnerPageUrl($url);
        return json_decode($this->makeRequest($innerPageUrl));
    }

    private function buildOuterPageUrl($url = null)
    {
        $outerCrawlerUrl = $this->outerUrl;
        $options = [
            '_apikey' => $this->apiKey,
            'url' => is_null($url) ? $this->outerFirstPage : $url
        ];
        $outerCrawlerUrl .= http_build_query($options,'','&');

        return $outerCrawlerUrl;
    }

    private function buildInnerPageUrl($url)
    {
        $innerCrawlerUrl = $this->innerUrl;
        $options = [
            '_apikey' => $this->apiKey,
            'url' => $url
        ];
        $innerCrawlerUrl .= http_build_query($options,'','&');

        return $innerCrawlerUrl;
    }

    private function makeRequest($url)
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}