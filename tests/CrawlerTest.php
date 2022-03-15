<?php

use PHPUnit\Framework\TestCase;

class CrawlerTest extends TestCase
{
    public function setUp(): void
    {
        $this->crawler = new Crawler();
    }

    public function testGetTheCorrectLink()
    {
        $this->crawler->setLinkAttribute('https://dantri.com.vn/the-gioi/tong-thong-ukraine-keu-goi-binh-si-nga-dau-hang-20220315100412877.htm');

        $this->assertEquals('https://dantri.com.vn/the-gioi/tong-thong-ukraine-keu-goi-binh-si-nga-dau-hang-20220315100412877.htm', $this->crawler->getLinkAttribute());
    }

    public function testFunctionCrawlReturnString()
    {
        $this->crawler->setLinkAttribute('https://dantri.com.vn/the-gioi/tong-thong-ukraine-keu-goi-binh-si-nga-dau-hang-20220315100412877.htm');

        $this->assertIsString(gettype($this->crawler->crawl()));
    }
}