<?php 
class Logic {
    private $link;

    public function __construct($link)
    {   
        $this->link = $link;
    }
    
    public function getContents()
    {
        return file_get_contents($this->link);
    }
}