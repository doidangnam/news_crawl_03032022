<?php
namespace Refactor\Factory\ContentParser;

use Helpers\Crawler;
use Interface\IRegex;
use Refactor\Factory\ContentParser\PictureParsers\DantriPictureParser;
use Refactor\Factory\ContentParser\PictureParsers\VietnamnetPictureParser;
use Refactor\Factory\ContentParser\PictureParsers\VnexpressPictureParser;
use Refactor\Factory\Parser;

class PictureParser extends Parser implements IRegex {
    private $site; 
    private $crawler;
    
    public function __construct(Crawler $crawler, $site)
    {
        $this->crawler = $crawler;
        $this->site = $site;
    }
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
    protected function parse() {
        $regex = $this->getRegex();

        preg_match_all($regex['imgContainerRegex'], $this->crawler->crawl(), $images);

        return $images;
    }

    public function specifySiteParser() 
    {
        if ($this->site == "vnexpress.net") {
            return new VnexpressPictureParser($this->crawler, $this->site);
        }

        if ($this->site == "dantri.com.vn") {
            return new DantriPictureParser($this->crawler, $this->site);
        }

        if ($this->site == "vietnamnet.vn") {
            return new VietnamnetPictureParser($this->crawler, $this->site);
        }
    }
}