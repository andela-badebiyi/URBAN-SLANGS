<?php
	/**
	*Tests the DictionaryCRUD class
	*/
	class DictionaryCRUDTests extends PHPUnit_Framework_TestCase{
		//declare dictionary
		protected $dictionary;

		protected function setUp(){
			//instantiate dictionary
			$this->dictionary = new DictionaryCRUD();
		}
		
		public function testAddRecord(){
			$this->assertEquals(0, count(Dictionary::$data));

			//test enteries
			$entry_one_slang = "kilonshele";
			$entry_one_desc = "A friendly way of asking how you are doing";
			$entry_one_sample_sentence = "Padi mi kilonshele??";

			$entry_two_slang = "wetin dey";
			$entry_two_desc = "A razz and cool way of saying 'whats up'";
			$entry_two_sample_sentence = "Ore wetin dey na, e don tey since i see you";

			//add record and check data count
			$this->dictionary->addEntry($entry_one_slang, $entry_one_desc, $entry_one_sample_sentence);
			$this->assertEquals(1, count(Dictionary::$data));

			//add record and check that data increments accordingly
			$this->dictionary->addEntry($entry_two_slang, $entry_two_desc, $entry_two_sample_sentence);
			$this->assertEquals(2, count(Dictionary::$data));			
		}

		public function testRetrieveDefinition(){
			$this->assertEquals("Entry not found", $this->dictionary->retrieveDefinition("wahala dey"));
			$this->assertEquals("A razz and cool way of saying 'whats up'", $this->dictionary->retrieveDefinition("wetin dey"));
		}

		public function testUpdateRecord(){
			$slang = "kilonshele";
			$desc = "A nasty yoruba comment";

			$this->dictionary->updateEntry($slang, $desc);
			$this->assertEquals("A nasty yoruba comment", $this->dictionary->retrieveDefinition("kilonshele"));
		}

		public function testDeleteRecord(){
			$this->assertEquals("A razz and cool way of saying 'whats up'", $this->dictionary->retrieveDefinition("wetin dey"));
			$this->dictionary->deleteEntry("wetin dey");	
			$this->assertEquals("Entry not found", $this->dictionary->retrieveDefinition("wetin dey"));
		}
	}

?>