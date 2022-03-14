<?php 
namespace Refactor\Factory\ContentParser\PictureParsers;

use Interfaces\IParse;
use Refactor\Factory\ContentParser\PictureParser;

class VietnamnetPictureParser extends PictureParser implements IParse {
    protected $imgContainerRegex = '#<td class="FmsArticleBoxStyle-Images image ">(.*?)</td>#si';
    
    /**
     * Return an array of images for display
     *
     * @return array
     */
    public function getArrayElements()
    {
        return $this->parse();
    }
}