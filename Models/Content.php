<?php
namespace Models;

class Content {
    private $site;
    private $date;
    private $title;
    private $description;
    private $details;

    public function __construct($site, $date, $title, $description, $details)
    {
        $this->site = $site;
        $this->date = $date;
        $this->title = $title;
        $this->description = $description;
        $this->details = $details;
    }

    public function create() {
        
    }
}