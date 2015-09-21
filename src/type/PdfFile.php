<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PhpOfficeUtils\type;

use PhpOfficeUtils\ParseException;

/**
 * Description of PDFFile
 *
 * @author jaberu
 */
class PdfFile extends AbstractFile {
    
    /**
     *
     * @var Smalot\PdfParser\Document 
     */
    private $document;
    
    public function __construct($filename) {
        parent::__construct($filename);

    }
    
    public function getContentAsText() {
        $text = $this->getDocument()->getText();
        return $text;        
    }
    
    private function getDocument() {
        if (empty($this->document)) {
            $parser     = new \Smalot\PdfParser\Parser();
            try {
                $this->document = $parser->parseFile($this->filename);
            } catch (\Exception $ex) {
                throw new ParseException($ex);
            }
        }
        return $this->document;
    }
}
