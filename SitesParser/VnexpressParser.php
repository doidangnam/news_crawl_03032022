<?php 
class VnexpressParser extends Parser {
    public function parse() 
    {
        // Use regex to get each element
        preg_match(REGEX_VNEXPRESS_DATE, parent::parseContent(), $date);
        preg_match(REGEX_VNEXPRESS_TITLE, parent::parseContent(), $title);
        preg_match(REGEX_VNEXPRESS_DESCRIPTION, parent::parseContent(), $description);
        preg_match_all(REGEX_VNEXPRESS_DETAILS, parent::parseContent(), $details);

        return [
            'date' => $date,
            'title' => $title,
            'description' => $description,
            'details' => $details
        ];
    }
}