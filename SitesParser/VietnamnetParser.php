<?php
namespace SitesParser;

use Helpers\Parser;

class VietnamnetParser extends Parser {    
    /**
     * getArrayElements
     *
     * @return array
     */
    public function getArrayElements() 
    {
        return parent::parse(REGEX_VIETNAMNET_DATE, REGEX_VIETNAMNET_TITLE, REGEX_VIETNAMNET_DESCRIPTION, REGEX_VIETNAMNET_DETAILS);
    }
}

// Regex Vietnamnet
    // Date
    define('REGEX_VIETNAMNET_DATE', '#<span class="ArticleDate">(.*?)</span>#si');
    // Title
    define('REGEX_VIETNAMNET_TITLE', '#<h1 class="title .+?">(.*?)</h1>#si');
    // Date
    define('REGEX_VIETNAMNET_DESCRIPTION', '#<div class="bold ArticleLead"><p>(.*?)</p></div>#si');
    // Title
    define('REGEX_VIETNAMNET_DETAILS', '#<p class="t-j">(.*?)</p>#si');