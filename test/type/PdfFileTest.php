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
        $this->testFile = new PdfFile(__DIR__ . '/../resources/Angebot_23.08.2016.pdf');
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

    /**
     * Test a secured pdf file.
     * 
     * TODO: currently fails
     * TODO: check http://stackoverflow.com/questions/2950246/is-it-possible-to-remove-a-password-from-a-pdf-file-using-php
     */
    public function testGetWordCount_SecuredPdf() {
        $secured = new PdfFile(__DIR__ . '/../resources/secured.pdf');
        $secured->getWordCount();
    }    
}
