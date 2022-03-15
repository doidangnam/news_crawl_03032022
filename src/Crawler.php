<?php
class Crawler {
    private $link;

    public function setLinkAttribute($link)
    {   
        $this->link = $link;
    }
        
    public function getLinkAttribute()
    {
        return $this->link;
    }
    /**
     * crawl
     *
     * @return string
     */
    public function crawl()
    {
        // From URL to get webpage contents
        $url = $this->link;
        
        // Initialize a CURL session.
        $ch = curl_init();
        
        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        // Grab URL and pass it to the variable
        curl_setopt($ch, CURLOPT_URL, $url);
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}