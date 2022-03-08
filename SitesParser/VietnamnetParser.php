<?php
namespace SitesParser;

use Helpers\Parser;
use Interface\IParse;

class VietnamnetParser extends Parser implements IParse{  
    private $regex_date = '#<span class="ArticleDate">(.*?)</span>#si';
    private $regex_title = '#<h1 class="title .+?">(.*?)</h1>#si';
    private $regex_description = '#<div class="bold ArticleLead"><p>(.*?)</p></div>#si';
    private $regex_details = '#<p class="t-j">(.*?)</p>#si';  
    
    /**
     * getArrayElements
     *
     * @return array
     */
    public function getArrayElements() 
    {
        return $this->parse($this->regex_date, $this->regex_title, $this->regex_description, $this->regex_details);
    }
}