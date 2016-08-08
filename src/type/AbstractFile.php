<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils\type;

use PhpOfficeUtils\IFile;
use Logger;

/**
 * Description of AbstractFile
 *
 * @author jaberu
 */
abstract class AbstractFile implements IFile {

    protected $filename;
    
    public function __construct($filename) {
        $this->filename = $filename;
    }    
    
    /**
     * Here we are using a regualar expression to count the words in the 
     * text as returned by implementations getContentAsText method.
     * 
     * Note that str_word_count didnt work well since it also counted numbers
     * and some strange special chars, which didnt lead to the result expected.
     * 
     * @return integer number of words
     */
    function getWordCount() {
        $text = $this->getContentAsText();
        return $this->countWords($text);
    }
    
    function countWords($text) {
        $count = preg_match_all('/\pL+/u', $text, $matches);
        $logger = Logger::getLogger("file");
        sort($matches[0]);
        $logger->trace($matches);
        return $count;
    }
    
}
