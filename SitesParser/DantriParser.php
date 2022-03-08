<?php 
namespace SitesParser;

use Helpers\Parser;
use Interface\IParse;

class DantriParser extends Parser implements IParse{
    private $regex_date = '#<time class="author-time" .+?>(.*?)</time>#si';
    private $regex_title = '#<h1 class="title-page detail">(.*?)</h1>#si';
    private $regex_description = '#<h2 class="singular-sapo">(.*?)</h2>#si';
    private $regex_details = '#<p>(.*?)</p>#si';

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
