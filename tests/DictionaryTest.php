<?php
/**
 * Dictionary Class Test
 *
 * Perform tests on our dictionary class to ensure it was
 * properly implemented
 *
 * @author Adebiyi Bodunde
 */
namespace bd\tests;
use bd\Dictionary;

class DictionaryTests extends \PHPUnit_Framework_TestCase
{

    /**
     * This method test that the database exists, its empty
     * and that it is of type array
     */
    public function testDatabaseExistsAndIsEmpty()
    {
        $this->assertInternalType('array', Dictionary::$data);
    }
}