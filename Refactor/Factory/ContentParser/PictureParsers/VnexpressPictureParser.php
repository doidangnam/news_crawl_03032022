<?php 
namespace Refactor\Factory\ContentParser\PictureParsers;

use Interface\IParse;
use Refactor\Factory\ContentParser\PictureParser;

class VnexpressPictureParser extends PictureParser implements IParse {
    protected $imgContainerRegex = '#<div class="fig-picture" .+?>(.*?)</div>#si';
    
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