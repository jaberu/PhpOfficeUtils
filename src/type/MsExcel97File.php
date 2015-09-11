<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils\type;
/**
 * Description of MsExcel97File
 *
 * @author jaberu
 */
class MsExcel97File extends AbstractExcelFile {

    protected function createReader() {
        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        $objReader->setReadDataOnly(true);
        return $objReader->load($this->filename);
    }

}
