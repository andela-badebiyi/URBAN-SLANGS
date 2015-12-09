<?php
/**
 * Ranking System.
 *
 * This class contains a single method which helps to implement a ranking system for words,
 * it takes a sentence and groups each unique word in descending order by the number of times
 * they occur in the sentence.
 *
 * @author Adebiyi Bodunde
 */
namespace bd;

class WordManipulate
{
    /**
    * Groups words in a sentence by the amount of times they occur
    *
    * @param String  $string The sentence you want to group
    * @return array[] returns an associative array of the grouped words
    */

    public static function group($string)
    {
        //remove punctuation marks from string
        $refinedStr = preg_replace("#[[:punct:]]#", "", $string);

        //split sentence into an array of words
        $listOfWords = explode(" ", $refinedStr);

        //create a new array of unique words
        $uniqueListOfWords = array_values(array_unique($listOfWords));

        //instantiate an empty that will hold our results
        $results = array();

        //perform ranking
        for ($i = 0; $i < count($uniqueListOfWords); $i++) {
            $results[$uniqueListOfWords[$i]] = 0;

            for ($j = 0; $j < count($listOfWords); $j++) {
                if ($uniqueListOfWords[$i] == $listOfWords[$j]) {
                    $results[$uniqueListOfWords[$i]]++;
                }
            }
        }

        //sort results by values in descending order
        arsort($results);

        return $results;
    }
}