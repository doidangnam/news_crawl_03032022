<?php
class TextParser extends Parser implements IRegex {   
    protected $site; 
    protected $crawler;
    protected $availableSites = ["vnexpress.net", "dantri.com.vn", "vietnamnet.vn"];
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

    public function setTextRegex($regex_date, $regex_title, $regex_description, $regex_details) {
        $this->regex_date = $regex_date;
        $this->regex_title = $regex_title;
        $this->regex_description = $regex_description;
        $this->regex_details = $regex_details;
    }

    /**
     *  Return an array of regex
     *
     * @return array 
     */
    public function getRegex() {
        return [
            'date' => $this->regex_date,
            'title' => $this->regex_title,
            'description' => $this->regex_description,
            'details' => $this->regex_details,
        ];
    }
    
    /**
     * Return the array of html elements from the site 
     *
     * @return array
     */
    protected function parse()
    {
        $regex = $this->getRegex();

        preg_match($regex['date'], $this->crawler->crawl(), $date);
        preg_match($regex['title'], $this->crawler->crawl(), $title);
        preg_match($regex['description'], $this->crawler->crawl(), $description);
        preg_match_all($regex['details'], $this->crawler->crawl(), $details);

        return [
            'date' => $date,    
            'title' => $title,
            'description' => $description,
            'details' => $details
        ];
    }

    public function specifySiteParser() 
    {
        if ($this->site == "vnexpress.net") {
            return new VnexpressTextParser($this->crawler, $this->site);
        }

        if ($this->site == "dantri.com.vn") {
            return new DantriTextParser($this->crawler, $this->site);
        }

        if ($this->site == "vietnamnet.vn") {
            return new VietnamnetTextParser($this->crawler, $this->site);
        }
    }
}