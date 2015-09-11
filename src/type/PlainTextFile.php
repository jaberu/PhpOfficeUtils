<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PhpOfficeUtils\type;

/**
 * Description of PlainTextFile
 *
 * @author jaberu
 */
class PlainTextFile extends AbstractFile {

    private $content;
    
    function __construct($filename) {
        $this->content = file_get_contents($filename);;
    }
    
    public function getContentAsText() {
        return $this->content;
    }
    
}
