<?php 
namespace SitesParser;

use Interface\IParse;
use Refactor\Factory\Parser;

class DantriParser extends Parser implements IParse{
    private $regex_date = '#<time class="author-time" .+?>(.*?)</time>#si';
    private $regex_title = '#<h1 class="title-page detail">(.*?)</h1>#si';
    private $regex_description = '#<h2 class="singular-sapo">(.*?)</h2>#si';
    private $regex_details = '#<p>(.*?)</p>#si';

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
