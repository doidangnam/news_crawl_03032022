<?php 
namespace Refactor\Factory\ContentParser\PictureParsers;

use Interface\IParse;
use Refactor\Factory\ContentParser\PictureParser;

class VietnamnetPictureParser extends PictureParser implements IParse {
    protected $imgContainerRegex = '#<td class="FmsArticleBoxStyle-Images image ">(.*?)</td>#si';

    public function getArrayElements()
    {
        return $this->parse();
    }
}