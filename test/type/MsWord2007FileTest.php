<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils\type;
/**
 * Description of MsWord2007FileTest
 *
 * @author jaberu
 */
class MsWord2007FileTest extends \PHPUnit_Framework_TestCase {
    
    private $testFile;
    
    public function setUp() {
        $this->testFile = new MsWord2007File(__DIR__ . '/../resources/example.docx');
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
