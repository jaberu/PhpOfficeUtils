<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PhpOfficeUtils\type;

use PhpOffice\PhpWord\Element\ListItem;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\Element\Title;

/**
 * Description of AbstractMsWordFile
 *
 * @author jaberu
 */
abstract class AbstractMsWordFile extends AbstractFile {

    public function getContentAsText() {
        $result = "";
        $sections = $this->createReader()->getSections();
        foreach ($sections as $section) {
            $result = $this->parseContainer($section) . " ";
        }
        return $result;
    }

    private function parseTable(Table $table) {
        $result = "";
        foreach ($table->getRows() as $row) {
            foreach ($row->getCells() as $cell) {
                $result .= $this->parseContainer($cell) . " ";
            }
        }
        return $result;
    }

    private function parseContainer($container) {
        $result = "";
        foreach ($container->getElements() as $element) {
            if ($element instanceof Text) {
                $result .= $element->getText() . " ";
            } else if ($element instanceof Title) {
                $result .= $element->getText() . " ";                
            } else if ($element instanceof Table) {
                $result .= $this->parseTable($element) . " ";
            } else if ($element instanceof ListItem) {
                $result .= $element->getTextObject()->getText() . " ";
            } else if ($element instanceof TextRun) {
                $result .= $this->parseContainer($element) . " ";
            }
        }
        return $result;
    }

    protected abstract function createReader();
}
