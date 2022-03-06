<?php 
class DantriParser extends Parser {
    public function parse() 
    {
        preg_match('#<time class="author-time" .+?>(.*?)</time>#si', parent::parseContent(), $date);
        preg_match('#<h1 class="title-page detail">(.*?)</h1>#si', parent::parseContent(), $title);
        preg_match('#<h2 class="singular-sapo">(.*?)</h2>#si', parent::parseContent(), $description);
        preg_match_all('#<p>(.*?)</p>#si', parent::parseContent(), $details);

        return [
            'date' => $date,
            'title' => $title,
            'description' => $description,
            'details' => $details
        ];
    }
}