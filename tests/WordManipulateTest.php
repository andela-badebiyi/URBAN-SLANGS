<?php
/**
 * Tests to ensure the Ranking system Class works accordingly
 */
namespace bd\tests;
use bd\WordManipulate;
use bd\DictionaryCRUD;

class WordManipulateTests extends \PHPUnit_Framework_TestCase
{
    protected $dictionary;

    protected function setUp()
    {

    }

    public function testWordGrouping()
    {
        $this->dictionary = new DictionaryCRUD();
        $this->dictionary->addEntry(
            "sneh",
            "means somethind is badt",
            "bodun is just a badoo sneh, a badoo lee and a badoo, bodun rocks."
        );

        $this->assertInternalType('array', WordManipulate::group($this->dictionary->retrieveSampleSentence("sneh")));
        $this->assertNotEmpty(WordManipulate::group($this->dictionary->retrieveSampleSentence("sneh")));
        $this->assertEquals(
            array("a" => 3, "badoo" => 3, "bodun" => 2, "and" => 1, "rocks" => 1,
            "lee" => 1, "sneh" => 1, "is" => 1, "just" => 1),
            WordManipulate::group($this->dictionary->retrieveSampleSentence("sneh"))
        );
        return "hey";
    }
}
