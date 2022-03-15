<?php
class PictureParser extends Parser implements IRegex {
    protected $site; 
    protected $crawler;
    
    /**
     * Set Crawler Object
     *
     * @param  Crawler $crawler
     * @return void
     */
    public function setCrawler(Crawler $crawler) {
        $this->crawler = $crawler;
    }
        
    /**
     * Set the site
     *
     * @param  string $site
     * 
     * @throws SiteException 
     */
    public function setSite($site)
    {
        if (! in_array($site, $this->availableSites)) {
            throw new SiteException('Fail to set unavailable site ' . $site);
        }
        
        $this->site = $site;
    }

    public function setImgContainerRegex($imgContainerRegex)
    {
        $this->imgContainerRegex = $imgContainerRegex;
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