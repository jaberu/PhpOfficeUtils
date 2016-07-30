<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils\type;

use PhpOfficeUtils\ParseException;

/**
 * Description of PDFFileTest
 *
 * @author jaberu
 */
class PdfFileTest extends \PHPUnit_Framework_TestCase {
    
    private $testFile;
    
    public function setUp() {
        $this->testFile = new PdfFile(__DIR__ . '/../resources/example.pdf');
    }
    
    public function testGetContentAsText() {
        $content = $this->testFile->getContentAsText();
        $this->assertFalse(empty($content));
    }
    
    public function testGetWordCount() {
        $cnt = $this->testFile->getWordCount();
        
        $this->assertEquals(36, $cnt);
    }
    
    /**
     * @expectedException PhpOfficeUtils\ParseException
     */
    public function testGetWordCount_Error() {
        $broken = new PdfFile(__DIR__ . '/../resources/broken.pdf');
        $broken->getWordCount();
    }
    
    /**
     * @expectedException PhpOfficeUtils\ParseException
     */
    public function testGetWordCount_MissingCatalog() {
        $broken = new PdfFile(__DIR__ . '/../resources/missing-catalog.pdf');
        $broken->getWordCount();
    }    
}
