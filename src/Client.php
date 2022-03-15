<?php
class Client
{
    /**
     * Parser object
     *
     * @var Parser
     */
    protected $parser;
    
    public function setParser(Parser $parser)
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