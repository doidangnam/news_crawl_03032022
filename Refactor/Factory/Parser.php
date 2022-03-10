<?php   
namespace Refactor\Factory;

use Helpers\Crawler;

abstract class Parser {
    protected $crawler;
    
    public function __construct(Crawler $crawler)
    {   
        $this->crawler = $crawler;
    }

    abstract function parse(); 
}


