<?php

use PHPUnit\Framework\TestCase;

class PictureParserText extends TestCase
{
    public function setUp():void
    {
        $this->parser = new PictureParser;
    }

    /**
     * Set the site
     *
     * @param  string $site
     * 
     * @throws SiteException 
     */
    public function setSite($site)
    {   
        if (! in_array($site, $this->availableSites)) {
            throw new SiteException('Fail to set unavailable site ' . $site);
        }

        $this->site = $site;
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
        return [['infonet.vietnamnet.vn'], ['nguoiduatin.vn']];
    }
}