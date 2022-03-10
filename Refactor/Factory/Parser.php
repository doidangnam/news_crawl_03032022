<?php   
namespace Refactor\Factory;

use Helpers\Crawler;
use Interface\IParse;

abstract class Parser {
    private $crawler;
    
    public function __construct(Crawler $crawler)
    {   
        $this->crawler = $crawler;
    }

    abstract function getRegex();

    public function parse()
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
}


