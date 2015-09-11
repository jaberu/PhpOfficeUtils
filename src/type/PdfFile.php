<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PhpOfficeUtils\type;

/**
 * Description of PDFFile
 *
 * @author jaberu
 */
class PdfFile extends AbstractFile {
    
    /**
     *
     * @var PDF2Text 
     */
    private $file;
    
    public function __construct($filename) {
        parent::__construct($filename);
        $parser     = new \Smalot\PdfParser\Parser();
        $this->file = $parser->parseFile($filename);
    }
    
    public function getContentAsText() {
        $text = $this->file->getText();
        return $text;        
    }
}
