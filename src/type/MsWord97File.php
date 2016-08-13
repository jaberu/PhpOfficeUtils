<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PhpOfficeUtils\type;

use PhpOffice\PhpWord\IOFactory;

/**
 * We need a custom error handler since some word documents throw 
 * "uninitialized string offset" notice what we need to know to 
 * handle.
 */
set_error_handler(function ($severity, $message, $filename, $lineno) {
  if (error_reporting() == 0) {
    return;
  }
  if (error_reporting() & $severity) {
    throw new \Exception($message);
  }
});
/**
 * Description of WordFile
 *
 * @author jaberu
 */
class MsWord97File extends AbstractMsWordFile {

    protected function createReader() {
        try {
            return IOFactory::load($this->filename, "MsDoc");
        } catch (ErrorException $error) {
            // check set_error_handler on top
            throw new ParseException($error);
        }
    }
}