<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils\type;
/**
 * Description of PlainTextFileTest
 *
 * @author jaberu
 */
class PlainTextFileTest extends \PHPUnit_Framework_TestCase {
    
    private $testFile;
    
    public function setUp() {
        $this->testFile = new PlainTextFile(__DIR__ . '/../resources/example.txt');
    }
    
    public function testGetContentAsText() {
        $content = $this->testFile->getContentAsText();
        $this->assertFalse(empty($content));
    }
    
    public function testGetWordCount() {
        $cnt = $this->testFile->getWordCount();
        
        $this->assertEquals(36, $cnt);
    }
}
