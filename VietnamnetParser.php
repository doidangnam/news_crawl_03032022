<?php 
class VietnamnetParser extends Parser {
    public function parse() 
    {
        preg_match('#<span class="ArticleDate">(.*?)</span>#si', parent::parseContent(), $date);
        preg_match('#<h1 class="title .+?">(.*?)</h1>#si', parent::parseContent(), $title);
        preg_match('#<div class="bold ArticleLead"><p>(.*?)</p></div>#si', parent::parseContent(), $description);
        preg_match_all('#<p class="t-j">(.*?)</p>#si', parent::parseContent(), $details);

        return [
            'date' => $date,
            'title' => $title,
            'description' => $description,
            'details' => $details
        ];
    }
}