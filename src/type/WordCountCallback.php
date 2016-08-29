<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils\type;
/**
 * Description of WordCountCallback
 *
 * @author jaberu
 */
class WordCountCallback implements iCallback {
    
    public $count = 0;
    
    public function text($text) {
        $this->count += str_word_count($text);
    }
}
