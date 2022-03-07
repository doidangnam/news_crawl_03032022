<?php 
namespace SitesParser;

use Helpers\Parser;

class VnexpressParser extends Parser {    
    /**
     * getArrayElements
     *
     * @return array
     */
    public function getArrayElements() 
    {
        return parent::parse(REGEX_VNEXPRESS_DATE, REGEX_VNEXPRESS_TITLE, REGEX_VNEXPRESS_DESCRIPTION, REGEX_VNEXPRESS_DETAILS);
    }
}

// Regex Vnexpress
    // Date
    define('REGEX_VNEXPRESS_DATE', '#<span class="date">(.*?)</span>#si');
    // Title
    define('REGEX_VNEXPRESS_TITLE', '#<h1 class="title-detail">(.*?)</h1>#si');
    // Date
    define('REGEX_VNEXPRESS_DESCRIPTION', '#<p class="description">(.*?)</p>#si');
    // Title
    define('REGEX_VNEXPRESS_DETAILS', '#<p class="Normal">(.*?)</p>#si');