<?php 
namespace SitesParser;

use Helpers\Parser;

class DantriParser extends Parser {    
    /**
     * getArrayElements
     *
     * @return array
     */
    public function getArrayElements() 
    {
        return parent::parse(REGEX_DANTRI_DATE, REGEX_DANTRI_TITLE, REGEX_DANTRI_DESCRIPTION, REGEX_DANTRI_DETAILS);
    }
}

// Regex Dantri
    // Date
    define('REGEX_DANTRI_DATE', '#<time class="author-time" .+?>(.*?)</time>#si');
    // Title
    define('REGEX_DANTRI_TITLE', '#<h1 class="title-page detail">(.*?)</h1>#si');
    // Date
    define('REGEX_DANTRI_DESCRIPTION', '#<h2 class="singular-sapo">(.*?)</h2>#si');
    // Title
    define('REGEX_DANTRI_DETAILS', '#<p>(.*?)</p>#si');