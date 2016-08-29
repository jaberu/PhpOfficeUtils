<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils\type;
/**
 * Description of ContentAsTextCallback
 *
 * @author jaberu
 */
class ContentAsTextCallback implements iCallback {
    
    public $result = '';
    
    public function text($text) {
        $this->result .= $text;
        $this->result .= ' ';
    }
}
