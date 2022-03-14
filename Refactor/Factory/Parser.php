<?php   
namespace Refactor\Factory;

abstract class Parser {
    abstract function specifySiteParser();

    public function init() {
        $newsParser = $this->specifySiteParser();
        return $newsParser->getArrayElements();
    }
}


