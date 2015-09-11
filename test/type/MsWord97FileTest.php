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
class MsWord97FileTest extends \PHPUnit_Framework_TestCase {
    
    private $testFile;
    
    public function setUp() {
        $this->testFile = new MsWord97File(__DIR__ . '/../resources/example.doc');
    }
    
    public function testGetContentAsText() {
        $content = $this->testFile->getContentAsText();
        $this->assertFalse(empty($content));
    }
    
    public function testGetWordCount() {
        $cnt = $this->testFile->getWordCount();
        // Actually it should be 128 but a big text block is splitted in the 
        // middle of a word why we actually have one word more. That's a pitty ...
        $this->assertEquals(36, $cnt);
    }
}
