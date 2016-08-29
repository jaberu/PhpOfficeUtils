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
        $callback = new ContentAsTextCallback;
        $this->parseCells($callback);
        return $callback->result;
    }
    
    public function getWordCount() {
        $callback = new WordCountCallback;
        $this->parseCells($callback);
        return $callback->count;
    }
    
    private function parseCells(iCallback $callback) {
        $phpExcel = $this->getPhpExcel();
        $sheetCount = $phpExcel->getSheetCount();
        for ($i = 0; $i < $sheetCount; $i++) {
            $sheet = $phpExcel->getSheet($i);
            foreach ($sheet->getCellCollection() as $coord) {
                $cell = $sheet->getCell($coord);
                $this->parseCell($cell, $callback);
            }
        }        
    }
    
    private function parseCell($cell, $callback) {
        switch ($cell->getDataType()) {
            case \PHPExcel_Cell_DataType::TYPE_STRING :
            case \PHPExcel_Cell_DataType::TYPE_STRING2 : {
                $callback->text($cell->getValue());
                break;
            }
            case \PHPExcel_Cell_DataType::TYPE_FORMULA : {
                $callback->text($cell->getCalculatedValue());
                break;
            }
        }
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
