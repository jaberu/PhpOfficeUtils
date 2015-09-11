<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PHPUnitInit
 *
 * @author jaberu
 */

// Include 'Composer' autoloader.
$loader = require __DIR__ . '/../vendor/autoload.php';

$loader->add('PhpOfficeUtils\\', __DIR__ . "/../src/");

?>
