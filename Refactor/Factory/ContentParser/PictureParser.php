<?php
namespace Refactor\Factory\ContentParser;

use Interface\IRegex;
use Refactor\Factory\ContentParser\PictureParsers\VnexpressPictureParser;
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
     * Return an array of images
     *
     * @return array 
     */
    public function parse() {
        $regex = $this->getRegex();

        preg_match_all($regex['imgContainerRegex'], $this->crawler->crawl(), $images);

        return $images;
    }

    public function specifySiteParser() 
    {
        if ($this->site == "vnexpress.net") {
            return new VnexpressPictureParser($this->crawler, $this->site);
        }

        // if ($this->site == "dantri.com.vn") {
        //     $content = new Refactor\Factory\ContentParser\TextParsers\DantriTextParser($crawler);
        //     $imageArr = new Refactor\Factory\ContentParser\PictureParsers\DantriPictureParser($crawler);
        // }

        // if ($this->site == "vietnamnet.vn") {
        //     $content = new Refactor\Factory\ContentParser\TextParsers\VietnamnetTextParser($crawler);
        //     $imageArr = new Refactor\Factory\ContentParser\PictureParsers\VietnamnetPictureParser($crawler);
        // }
    }
}