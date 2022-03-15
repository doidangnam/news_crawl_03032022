<?php
class TextParser extends Parser implements IRegex {   
    private $site; 
    private $crawler;
    
    public function __construct(Crawler $crawler, $site)
    {
        $this->crawler = $crawler;
        $this->site = $site;
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