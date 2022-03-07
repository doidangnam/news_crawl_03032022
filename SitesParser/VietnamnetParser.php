<?php 
class VietnamnetParser extends Parser {
    public function parse() 
    {
        preg_match(REGEX_VIETNAMNET_DATE, parent::parseContent(), $date);
        preg_match(REGEX_VIETNAMNET_TITLE, parent::parseContent(), $title);
        preg_match(REGEX_VIETNAMNET_DESCRIPTION, parent::parseContent(), $description);
        preg_match_all(REGEX_VIETNAMNET_DETAILS, parent::parseContent(), $details);

        return [
            'date' => $date,
            'title' => $title,
            'description' => $description,
            'details' => $details
        ];
    }
}