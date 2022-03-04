<?php
class ContentCrawler {
    private $link;

    protected function __construct($link)
    {   
        $this->link = $link;
    }

    public function get()
    {
        return file_get_contents($this->link);
    }
}