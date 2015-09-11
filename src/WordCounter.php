<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils;
/**
 * Description of WordCounter
 *
 * @author jaberu
 */
class WordCounter {

    public function countWords($files) {
        if (!is_array($files)) {
            $files = array($files);
        }
        $factory = new FileFactory();
        $result = 0;
        foreach ($files as $file) {
            $result += $factory->getFile($file)->getWordCount();
        }
        return $result;
    }
    
}
