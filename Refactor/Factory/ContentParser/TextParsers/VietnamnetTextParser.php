<?php
namespace Refactor\Factory\ContentParser\TextParsers;

use Interface\IParse;
use Refactor\Factory\ContentParser\TextParser;

class VietnamnetTextParser extends TextParser implements IParse {  
    protected $regex_date = '#<span class="ArticleDate">(.*?)</span>#si';
    protected $regex_title = '#<h1 class="title .+?">(.*?)</h1>#si';
    protected $regex_description = '#<div class="bold ArticleLead"><p>(.*?)</p></div>#si';
    protected $regex_details = '#<p class="t-j">(.*?)</p>#si';  
    /**
     * getArrayElements
     *
     * @return array
     */
    public function getArrayElements() 
    {
        return $this->parse();
    }
}