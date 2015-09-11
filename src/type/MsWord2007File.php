<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PhpOfficeUtils\type;

use PhpOffice\PhpWord\IOFactory;

/**
 * Handler for the WsWord 2007 Format.
 * 
 * The implementation is basing on simple xml commands
 *
 * @author jaberu
 */
class MsWord2007File extends AbstractMsWordFile {

    protected function createReader() {
        return IOFactory::load($this->filename, "Word2007");
    }

}
