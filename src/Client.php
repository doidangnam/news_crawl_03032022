<?php
class Client
{
    /**
     * Parser object
     *
     * @var Parser
     */
    protected $parser;
        
    /**
     * Set the parser dependency
     *
     * @param  Parser $parser
     * @return void
     */
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