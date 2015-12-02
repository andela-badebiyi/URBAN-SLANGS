<?php
	class DictionaryTests extends PHPUnit_Framework_TestCase{
		public function testDatabaseExistsAndIsEmpty(){
			$this->assertEquals(0, count(Dictionary::$data));
		}
	}
?>