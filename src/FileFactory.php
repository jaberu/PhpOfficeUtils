<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils;
/**
 * Description of FileFactory
 *
 * @author jaberu
 */
class FileFactory {
    
    private $defaultHandler;
    private $handlers = array();
    
    public function __construct() {
        $this->handlers['pdf'] = "\\PhpOfficeUtils\\type\\PdfFile";
        $this->handlers['doc'] = "\\PhpOfficeUtils\\type\\MsWord97File";
        $this->handlers['docx'] = "\\PhpOfficeUtils\\type\\MsWord2007File";
        $this->handlers['xls'] = "\\PhpOfficeUtils\\type\\MsExcel97File";
        $this->handlers['xlsx'] = "\\PhpOfficeUtils\\type\\MsExcel2007File";
        
        $this->defaultHandler = "\\PhpOfficeUtils\\type\\PlainTextFile";
    }
    
    public function getFile($filename) {
        $parts = explode("\.", $filename);
        $ext = $parts[sizeof($parts)-1];
        $handler = $this->defaultHandler;
        if (isset($this->handlers[$ext])) {
            $handler = $this->handlers[$ext];
        }
        return new $handler($filename);
    }
    
}
