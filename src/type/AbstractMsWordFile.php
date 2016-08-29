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
        $callback = new ContentAsTextCallback;
        $sections = $this->createReader()->getSections();
        foreach ($sections as $section) {
            $this->parseContainer($section, $callback);
        }
        return $callback->result;
    }
    
    public function getWordCount() {
        $callback = new WordCountCallback;
        $sections = $this->createReader()->getSections();
        foreach ($sections as $section) {
            $this->parseContainer($section, $callback);
        }
        return $callback->count;
    }

    private function parseTable(Table $table, iCallback $callback) {
        foreach ($table->getRows() as $row) {
            foreach ($row->getCells() as $cell) {
                $this->parseContainer($cell, $callback);
            }
        }
    }

    private function parseContainer($container, iCallback $callback) {
        foreach ($container->getElements() as $element) {
            if ($element instanceof Text) {
                $callback->text($element->getText());
            } else if ($element instanceof Title) {
                $callback->text($element->getText());
            } else if ($element instanceof Table) {
                $this->parseTable($element, $callback);
            } else if ($element instanceof ListItem) {
                $callback->text($element->getTextObject()->getText());
            } else if ($element instanceof TextRun) {
                $callback->text($this->parseContainer($element, $callback));
            }
        }
    }

    protected abstract function createReader();
}





