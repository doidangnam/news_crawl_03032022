<?php 
class DantriParser extends Parser {
    public function parse() 
    {
        preg_match(REGEX_DANTRI_DATE, parent::parseContent(), $date);
        preg_match(REGEX_DANTRI_TITLE, parent::parseContent(), $title);
        preg_match(REGEX_DANTRI_DESCRIPTION, parent::parseContent(), $description);
        preg_match_all(REGEX_DANTRI_DETAILS, parent::parseContent(), $details);

        return [
            'date' => $date,
            'title' => $title,
            'description' => $description,
            'details' => $details
        ];
    }
}