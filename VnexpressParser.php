<?php 
class VnexpressParser extends Parser {
    public function parse() 
    {
        preg_match('#<span class="date">(.*?)</span>#si', parent::parseContent(), $date);
        preg_match('#<h1 class="title-detail">(.*?)</h1>#si', parent::parseContent(), $title);
        preg_match('#<p class="description">(.*?)</p>#si', parent::parseContent(), $description);
        preg_match_all('#<p class="Normal">(.*?)</p>#si', parent::parseContent(), $details);

        return [
            'date' => $date,
            'title' => $title,
            'description' => $description,
            'details' => $details
        ];
    }
}