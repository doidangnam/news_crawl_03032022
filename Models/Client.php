<?php 
namespace Models;

use Refactor\Factory\Parser;


class Client
{
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }
    
    /**
     * Return an array of contents
     *
     * @return array
     */
    public function getContent() {
        return $this->parser->init();
    }
}