<?php 
namespace Helpers;

class Parser {
    private $crawler;
    
    public function __construct(Crawler $crawler)
    {   
        $this->crawler = $crawler;
    }
        
    /**
     * parse
     *
     * @param  string $regexDate 
     * @param  string $regexTitle
     * @param  string $regexDescription
     * @param  string $regexDetails
     * @return array
     */
    public function parse($regexDate, $regexTitle, $regexDescription, $regexDetails)
    {
        preg_match($regexDate, $this->crawler->crawl(), $date);
        preg_match($regexTitle, $this->crawler->crawl(), $title);
        preg_match($regexDescription, $this->crawler->crawl(), $description);
        preg_match_all($regexDetails, $this->crawler->crawl(), $details);

        return [
            'date' => $date,
            'title' => $title,
            'description' => $description,
            'details' => $details
        ];
    }
}