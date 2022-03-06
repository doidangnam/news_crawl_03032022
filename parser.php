<?php 
class Parser {
    public function __construct(Content $content)
    {   
        $this->content = $content;
    }
    
    public function get()
    {
        return file_get_contents($this->link);
    }
}