<?php   
namespace Refactor\Factory;

abstract class SiteParser {
    abstract function getSite();

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