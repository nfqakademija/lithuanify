<?php

namespace LithuanifyBundle\Crawler\Ru\Mk;

use LithuanifyBundle\Crawler\Ru\Mk\Parser;

class Crawler
{
    private $pages = [];
    private $apiKey = '5afb00834532417d9e6a033abe6dfc09938db9122c38aa67153f65608831ec19d77821d17f57a1392bf7dd9715a4eb154b71c51886e00681b5924833b907523cff1f1edb5869b759ed2a5ec091fae469';
    private $outerUrl;
    private $innerUrl;
    private $outerFirstPage;

    function __construct()
    {
        //@TODO move this to configs
        $this->innerUrl = 'https://extraction.import.io/query/extractor/e4b61415-4984-4e64-b35c-03694f6efab9?';
        $this->outerUrl = 'https://extraction.import.io/query/extractor/4d588a40-4695-48bc-8c6e-2b0b3445f16e?';
        $this->outerFirstPage = 'http://www.mk.ru/search/?q=%D0%BB%D0%B8%D1%82%D0%B2%D0%B0';
    }

    public function getOuterPage($url = null)
    {
        $parser = new Parser();
        $outerCrawlerUrl = $this->buildOuterPageUrl();
        $outerPage = json_decode(file_get_contents($outerCrawlerUrl));

        foreach ($outerPage->extractorData->data[0]->group[0]->LINK as $source) {
            $innerPageData = $this->getInnerPage($source->href);
            $pageInfo = $parser->parsePage($innerPageData);
            $pageInfo['url'] = $source->href;
        }

        $nextPage = null;

        if (isset($outerPage->extractorData->data[0]->group[0]->Next[0]->href)) {
            $nextPage = $outerPage->extractorData->data[0]->group[0]->Next[0]->href;
//            $a = $this->buildOuterPageUrl($outerPage->extractorData->data[0]->group[0]->Next[0]->href);
//            $outerPage = json_decode(file_get_contents($a));
        }

        return ['pages' => $this->pages, 'nextPage' => $nextPage];
    }

    private function getInnerPage($url)
    {
        $innerPageUrl = $this->buildInnerPageUrl($url);
        return json_decode(file_get_contents($innerPageUrl));
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
}