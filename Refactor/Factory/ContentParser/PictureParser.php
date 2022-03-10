<?php
namespace Refactor\Factory\ContentParser;

use Interface\IRegex;
use Refactor\Factory\Parser;

class PictureParser extends Parser implements IRegex {    
    /**
     * getRegex
     *
     * @return array regex that contains the images  
     */
    public function getRegex()
    {
        return [
            'imgContainerRegex' => $this->imgContainerRegex,
        ];
    }
    
    /**
     * parse
     *
     * @return array of images
     */
    public function parse() {
        $regex = $this->getRegex();

        preg_match_all($regex['imgContainerRegex'], $this->crawler->crawl(), $images);

        return $images;
    }
}