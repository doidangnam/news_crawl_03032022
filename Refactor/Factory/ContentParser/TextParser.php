<?php
namespace Refactor\Factory\ContentParser;

use Interface\IRegex;
use Refactor\Factory\Parser;

class TextParser extends Parser implements IRegex {    
    /**
     * getRegex
     *
     * @return array of content regex 
     */
    public function getRegex() {
        return [
            'date' => $this->regex_date,
            'title' => $this->regex_title,
            'description' => $this->regex_description,
            'details' => $this->regex_details,
        ];
    }

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