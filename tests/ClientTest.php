<?php   
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {
    public function testFunctionGetContent() {
        $client = new Client();
        $mock_text_parser = $this->createMock(Parser::class);
        $mock_text_parser->method('init')->willReturn(['date' => '15/03/2021',    
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
}