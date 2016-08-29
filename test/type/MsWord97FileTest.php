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
    
    /**
     * Related to a bug already reported here:
     * https://github.com/PHPOffice/PHPWord/issues/853
     * 
     * As the document is also not processed correctly an error is exected.
     * However we cannot override the system error handler to rethrown that
     * issue as an exception since the PhpWord Project also uses the @ operator
     * at some points. If we replace the native error handler even more places
     * would raise an error.     * 
     * 
     * @expectedException PHPUnit_Framework_Error_Notice 
     */
    public function testUninitializedOffset() {
        $uninitOffset = new MsWord97File(__DIR__ . '/../resources/uninitialized_offset.doc');
        $uninitOffset->getWordCount();
    }
}
