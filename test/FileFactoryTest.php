<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils;
/**
 * Description of FileFactoryTest
 *
 * @author jaberu
 */
class FileFactoryTest extends \PHPUnit_Framework_TestCase {

    private $factory;
    
    public function setUp() {
        $this->factory = new FileFactory;
    }
    
    public function testGetFile() {
        $this->assertTrue($this->factory->getFile(__DIR__ . '/resources/example.pdf') instanceof type\PdfFile);
        $this->assertTrue($this->factory->getFile(__DIR__ . '/resources/example.txt') instanceof type\PlainTextFile);
        $this->assertTrue($this->factory->getFile(__DIR__ . '/resources/example.doc') instanceof type\MsWord97File);
        $this->assertTrue($this->factory->getFile(__DIR__ . '/resources/example.docx') instanceof type\MsWord2007File);
        
        $this->assertTrue($this->factory->getFile(__DIR__ . '/resources/china2013.xls') instanceof type\MsExcel97File);
        $this->assertTrue($this->factory->getFile(__DIR__ . '/resources/china2013.xlsx') instanceof type\MsExcel2007File);
    }
}
