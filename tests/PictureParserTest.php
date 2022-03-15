<?php

use PHPUnit\Framework\TestCase;

class PictureParserText extends TestCase
{
    public function setUp():void
    {
        $this->parser = new PictureParser;
    }

    public function testFunctionGetRegexReturnAnArrayOfRexgex()
    {
        $this->parser->setImgContainerRegex('#sampleregex#si');

        $this->assertEquals(['imgContainerRegex' => '#sampleregex#si'], $this->parser->getRegex());
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
            ["vnexpress.net", VnexpressPictureParser::class],
            ["dantri.com.vn", DantriPictureParser::class],
            ["vietnamnet.vn", VietnamnetPictureParser::class],
        ];
    }
}