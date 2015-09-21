<?php

namespace PhpOfficeUtils;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Represents abstract methods for each file type. Implementation ist specific
 * to the type.
 * @author jaberu
 */
interface IFile {
    
    /**
     * @throws ParseException wrapping errors from the underlaying parser
     */
    function getContentAsText();
    
    /**
     * Counts the words in the document.
     * 
     * Numbers are ignored. Strings concatinated with a dot are splitted.
     * 
     * @return integer number of words
     * 
     * @throws ParseException wrapping errors from the underlaying parser
     */
    function getWordCount();
    
}
