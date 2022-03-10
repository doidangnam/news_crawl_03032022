<?php
namespace SitesParser;

use Interface\IParse;
use Refactor\Factory\Parser;

class VietnamnetParser extends Parser implements IParse{  
    private $regex_date = '#<span class="ArticleDate">(.*?)</span>#si';
    private $regex_title = '#<h1 class="title .+?">(.*?)</h1>#si';
    private $regex_description = '#<div class="bold ArticleLead"><p>(.*?)</p></div>#si';
    private $regex_details = '#<p class="t-j">(.*?)</p>#si';  
    
    public function getRegex()
    {
        return [
            'date' => $this->regex_date,
            'title' => $this->regex_title,
            'description' => $this->regex_description,
            'details' => $this->regex_details,
        ];
    }
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