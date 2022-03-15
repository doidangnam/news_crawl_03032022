<?php
abstract class Parser {
    protected $availableSites = ["vnexpress.net", "dantri.com.vn", "vietnamnet.vn"];
    
    abstract function specifySiteParser();

    public function init() {
        $newsParser = $this->specifySiteParser();
        return $newsParser->getArrayElements();
    }
}


