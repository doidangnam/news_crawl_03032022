<?php   
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {
    public function testFunctionGetContentReturnTexts() {
        $client = new Client();
        $mock_text_parser = $this->createMock(Parser::class);
        $mock_text_parser->method('init')->willReturn(
            ['date' => '15/03/2021',    
            'title' => 'sample title',
            'description' => 'sample description',
            'details' => 'sample details']);

        $client->setParser($mock_text_parser);

        $this->assertEquals(
            ['date' => '15/03/2021',    
            'title' => 'sample title',
            'description' => 'sample description',
            'details' => 'sample details'], 
            $client->getContent());
    }

    public function testFunctionGetContentReturnPicture() {
        $client = new Client();
        $mock_picture_parser = $this->createMock(Parser::class);
        $mock_picture_parser->method('init')->willReturn(
            ['image_1' => 'https://icdn.dantri.com.vn/2022/03/14/ukraineafp-1647276523030.jpg']);

        $client->setParser($mock_picture_parser);

        $this->assertEquals(
            ['image_1' => 'https://icdn.dantri.com.vn/2022/03/14/ukraineafp-1647276523030.jpg'], 
            $client->getContent());
    }
}