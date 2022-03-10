<?php 
namespace SitesParser;

use Interface\IParse;
use Refactor\Factory\Parser;

class VnexpressParser extends Parser implements IParse{
    private $regex_date = '#<span class="date">(.*?)</span>#si';
    private $regex_title = '#<h1 class="title-detail">(.*?)</h1>#si';
    private $regex_description = '#<p class="description">(.*?)</p>#si';
    private $regex_details = '#<p class="Normal">(.*?)</p>#si';   

    public function getRegex()
    {
        return [
            'date' => $this->regex_date,
            'title' => $this->regex_title,
            'description' => $this->regex_description,
            'details' => $this->regex_details,
        ];
    }

    public function getArrayElements()
    {
        return $this->parse();
    }
}