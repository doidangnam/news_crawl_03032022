<?php 
namespace SitesParser;

use Helpers\Parser;
use Interface\IParse as InterfaceIParse;

class VnexpressParser extends Parser implements InterfaceIParse{    
    private $regex_date = '#<span class="date">(.*?)</span>#si';
    private $regex_title = '#<h1 class="title-detail">(.*?)</h1>#si';
    private $regex_description = '#<p class="description">(.*?)</p>#si';
    private $regex_details = '#<p class="Normal">(.*?)</p>#si';  
    
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