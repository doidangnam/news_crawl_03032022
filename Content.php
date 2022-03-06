<?php
class Content {
    private $link;

    public function __construct($link)
    {   
        $this->link = $link;
    }

    
    public function get()
    {
        return file_get_contents($this->link);
    }
}