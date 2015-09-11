<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PhpOfficeUtils;
/**
 * Description of WordCounter
 *
 * @author jaberu
 */
class WordCounterTest extends \PHPUnit_Framework_TestCase {

    private $wordCounter;
    
    public function setUp() {
        $this->wordCounter = new WordCounter();
    }
    
    public function testWordCount() {
        $result = $this->wordCounter->countWords(__DIR__ . '/resources/china2013.xlsx');
        $this->assertEquals(167, $result);
    }
    
    public function testWordCount_Multiple() {
        $result = $this->wordCounter->countWords(array(
            __DIR__ . '/resources/china2013.xlsx',
            __DIR__ . '/resources/china2013.xlsx'
        ));
        $this->assertEquals(167 * 2, $result);
    }    
    
}
