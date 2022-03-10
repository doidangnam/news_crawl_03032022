<?php 
namespace Refactor\Factory\ContentParser\TextParsers;

use Interface\IParse;
use Refactor\Factory\ContentParser\TextParser;

class DantriTextParser extends TextParser implements IParse {
    protected $regex_date = '#<time class="author-time" .+?>(.*?)</time>#si';
    protected $regex_title = '#<h1 class="title-page detail">(.*?)</h1>#si';
    protected $regex_description = '#<h2 class="singular-sapo">(.*?)</h2>#si';
    protected $regex_details = '#<p>(.*?)</p>#si';
    
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
