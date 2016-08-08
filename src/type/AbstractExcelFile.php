<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils\type;
/**
 * Description of AbstractExcelReader
 *
 * @author jaberu
 */
abstract class AbstractExcelFile extends AbstractFile {
    
    private $phpExcel;
    
    public function getContentAsText() {
        $phpExcel = $this->getPhpExcel();
        $result = "";
        $sheetCount = $phpExcel->getSheetCount();
        for ($i = 0; $i < $sheetCount; $i++) {
            $sheet = $phpExcel->getSheet($i);
            foreach ($sheet->getCellCollection() as $coord) {
                $cell = $sheet->getCell($coord);
                if ($cell->getDataType() == "s") {
                    $result .= $cell->getValue() . " ";
                }
            }
        }
        return $result;
    }
    
    /**
     * 
     * @return PHPExcel
     */
    function getPhpExcel() {
        if ($this->phpExcel === null) {
            $this->phpExcel = $this->createReader();
        }
        return $this->phpExcel;
    }
    
    protected abstract function createReader();
}
