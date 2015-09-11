<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PhpOfficeUtils\type;

use PhpOffice\PhpWord\IOFactory;

/**
 * Description of WordFile
 *
 * @author jaberu
 */
class MsWord97File extends AbstractMsWordFile {

    protected function createReader() {
        return IOFactory::load($this->filename, "MsDoc");
    }
}