<?php
	/*
	*This class inherits from the dictionary class and contains 
	*functions that perform CRUD operations on the static array
	*that holds the enteries
	*/
	include "Dictionary.php";

	class DictionaryCRUD extends Dictionary{
		
		public function addEntry($slang, $desc, $sample){
			if(!$this->entryExists($slang)){
				$input = $this->constructAssocArray($slang, $desc, $sample);
				parent::$data[] = $input;	
			}
			else{
				echo "This entry already exists, please try again";
			}
			
		} 

		public function deleteEntry($entry){
			if($this->entryExists($entry)){
				$entryIndex = $this->getEntryIndex($entry);
				unset(parent::$data[$entryIndex]);
			}
			else{
				echo "Can't delete: This entry doesn't exist";
			}
		}

		public function retrieveDefinition($entry){
			if($this->entryExists($entry)){
				$entryIndex = $this->getEntryIndex($entry);
				return parent::$data[$entryIndex]["description"];
			}
			else{
				return "Entry not found";
			}
		}

		public function updateEntry($slang, $desc=null, $sample=null){
			if($this->entryExists($slang)){
				$entryIndex = $this->getEntryIndex($slang);
				parent::$data[$entryIndex]["slang"] = $slang;
				if($desc !== null){
					parent::$data[$entryIndex]["description"] = $desc;
				}
				if($sample !== null){
					parent::$data[$entryIndex]["sample-sentence"] = $sample;
				}
				
			}
			else{
				return "Record not found";
			}
		}


		public function retrieveSampleSentence($entry){
			if($this->entryExists($entry)){
				$entryIndex = $this->getEntryIndex($entry);
				return parent::$data[$entryIndex]["sample-sentence"];
			}
			else{
				return "Entry not found";
			}
		}

		/***********************************
		/*Private class functions go here
		/*
		***********************************/

		private function constructAssocArray($word, $desc, $sample){
			return array("slang" => $word, 
				"description" => $desc, 
				"sample-sentence" => $sample);
		}

		private function getEntryIndex($entry){
			for($i = 0; $i < count(parent::$data); $i++){
				if(parent::$data[$i]["slang"] == $entry){
					return $i;
				}
			}
			return -1;
		}

		private function entryExists($entry){
			for($i = 0; $i < count(parent::$data); $i++){
				if(parent::$data[$i]["slang"] == $entry){
					return true;
				}
			}
			return false;
		}
	}
?>