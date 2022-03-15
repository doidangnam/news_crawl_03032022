<?php   
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function testCanCreateSpecificTextParser()
    {
        $newTextParser = new TextParser();

        $newTextParser->setSite("vnexpress.net");

        $specificTextParser = $newTextParser->specifySiteParser();

        $this->assertInstanceOf(VnexpressTextParser::class, $specificTextParser);
    }

    public function testCanCreateSpecificPictureParser()
    {
        $newTextParser = new PictureParser();

        $newTextParser->setSite("vnexpress.net");

        $specificTextParser = $newTextParser->specifySiteParser();

        $this->assertInstanceOf(VnexpressPictureParser::class, $specificTextParser);
    }
}