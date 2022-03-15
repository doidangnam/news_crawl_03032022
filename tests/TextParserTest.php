<?php

use PHPUnit\Framework\TestCase;

class TextParserTest extends TestCase
{
    public function setUp():void
    {
        $this->parser = new TextParser;
    }

    public function testFunctionGetRegexReturnAnArrayOfRexgex()
    {
        $this->parser->setTextRegex('regex_date_pattern', 'regex_title_pattern', 'regex_description_pattern', 'regex_details_pattern');

        $this->assertEquals([
            'date' => 'regex_date_pattern',
            'title' => 'regex_title_pattern',
            'description' => 'regex_description_pattern',
            'details' => 'regex_details_pattern',
        ], $this->parser->getRegex());
    }
        
    /**
     * @dataProvider invalidSitesProvider
     *
     * @param  string $site
     * @return void
     */
    public function testSetInvalidSite(string $site) 
    {
        $this->expectException(SiteException::class);
        $this->parser->setSite($site);
        
    }

    public function invalidSitesProvider():array 
    {
        return [['helloworld.com/news/help-me-solve-this'], ['123.net/assignment-essay']];
    }

    /**
     * @dataProvider additionProvider
     *
     * @param  string $site
     * @param  mixed $object
     * @return void
     */
    public function testFunctionSpecifyParser(string $site, $object)
    {
        $this->parser->setSite($site);

        $this->assertInstanceOf($object, $this->parser->specifySiteParser());
    }

    public function additionProvider():array
    {
        return [
            ["vnexpress.net", VnexpressTextParser::class],
            ["dantri.com.vn", DantriTextParser::class],
            ["vietnamnet.vn", VietnamnetTextParser::class],
        ];
    }
}