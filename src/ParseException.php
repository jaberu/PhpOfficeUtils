<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils;
/**
 * Description of ParseException
 *
 * @author jaberu
 */
class ParseException extends \Exception {
    
    public function __construct(\Exception $cause) {
        parent::__construct("", -1, $cause);
    }
    
}
