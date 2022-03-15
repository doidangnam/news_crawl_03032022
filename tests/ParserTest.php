<?php

use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    public function testFunctionSpecifySiteParserReturnString()
    {
        $mock = $this->getMockBuilder(Parser::class)
                    ->getMockForAbstractClass();
        
        $mock->method('specifySiteParser')->willReturn("newsite");

        $this->assertEquals("newsite", $mock->specifySiteParser());
    }
    
}