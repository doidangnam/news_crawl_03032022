<?php
namespace Refactor\Factory\ContentParser;

use Interface\IRegex;
use Refactor\Factory\Parser;

class PictureParser extends Parser implements IRegex {    
    /**
     * Return the regular expression of images tag
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
     * Return an array of images with description
     *
     * @return array 
     */
    public function parse() {
        $regex = $this->getRegex();

        preg_match_all($regex['imgContainerRegex'], $this->crawler->crawl(), $images);

        return $images;
    }
}