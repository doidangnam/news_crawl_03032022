<?php 
class Parser {
    private $businessLogic;
    
    public function __construct(Logic $logic)
    {   
        $this->businessLogic = $logic;
    }
    
    public function parseContent()
    {
        return $this->businessLogic->getContents();
    }
}