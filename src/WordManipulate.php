<?php
	/*
	*This class contains a group function that helps perform a 
	*ranking system on a given input
	*/
	include "DictionaryCRUD.php";

	class WordManipulate{

		public static function group($string){
			//strip punctuations out 
			$refinedStr = preg_replace("#[[:punct:]]#", "", $string);
			$listOfWords = explode(" ", $refinedStr);
			$uniqueListOfWords = array_values(array_unique($listOfWords));
			$results = array();

			for($i=0; $i<count($uniqueListOfWords); $i++){
				$results[$uniqueListOfWords[$i]] = 0;
				for($j=0; $j<count($listOfWords); $j++){
					if($uniqueListOfWords[$i] == $listOfWords[$j]){
						$results[$uniqueListOfWords[$i]]++;
					}
				}
			}
			arsort($results);
			return $results;
		}
	}


?>