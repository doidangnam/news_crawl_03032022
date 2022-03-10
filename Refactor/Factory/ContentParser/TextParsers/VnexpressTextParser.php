<?php 
namespace Refactor\Factory\ContentParser\TextParsers;

use Interface\IParse;
use Refactor\Factory\ContentParser\TextParser;

class VnexpressTextParser extends TextParser implements IParse {
    protected $regex_date = '#<span class="date">(.*?)</span>#si';
    protected $regex_title = '#<h1 class="title-detail">(.*?)</h1>#si';
    protected $regex_description = '#<p class="description">(.*?)</p>#si';
    protected $regex_details = '#<p class="Normal">(.*?)</p>#si';   

    public function getArrayElements()
    {
        return $this->parse();
    }
}