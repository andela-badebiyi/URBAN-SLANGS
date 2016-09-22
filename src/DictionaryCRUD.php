<?php
/**
 * Performs CRUD Operations on Dictionary database.
 *
 * This class extends the Dictionary class and it allows you to perform Create, Read
 * Update and Delete operations on each entry in our database
 *
 * @author Adebiyi Bodunde
 */
namespace bd;

class DictionaryCRUD extends Dictionary
{
    public function __construct()
    {
        Dictionary::$data = array();
    }

    /**
     * Adds a new urban slang into the dictionary.
     *
     * @param string $slang  The urban slang to be stored
     * @param string $desc   The description of the slang
     * @param string $sample A sample sentence that shows how the slang can be used
     */
    public function addEntry($slang, $desc, $sample)
    {
        if (!$this->entryExists($slang)) {
            $input = $this->constructAssocArray($slang, $desc, $sample);
            parent::$data[] = $input;
        } else {
            throw new \Exception('Entry already exists', 1);
        }
    }

    /**
     * Deletes an urban slang from the dictionary.
     *
     * @param string $entry Urban slang that is to be deleted
     *
     * @throws Exception if entry you are trying to delete doesn't exist in the database
     */
    public function deleteEntry($entry)
    {
        if ($this->entryExists($entry)) {
            $entryIndex = $this->getEntryIndex($entry);
            unset(parent::$data[$entryIndex]);
        } else {
            throw new \Exception('Cannot delete', 2);
        }
    }

    /**
     * Retrieves the definition of an urban slang from the dictionary.
     *
     * @param string $entry Urban slang whose definition is to be retrieved
     *
     * @throws Exception if entry definition you are trying to retrieve doesn't exist in the database
     */
    public function retrieveDefinition($entry)
    {
        if ($this->entryExists($entry)) {
            $entryIndex = $this->getEntryIndex($entry);

            return parent::$data[$entryIndex]['description'];
        } else {
            throw new \Exception("Entry doesn't exist", 3);
        }
    }

    /**
     * Updates an urban slang in the dictionary.
     *
     * @param string $slang  The urban slang to be updated
     * @param string $desc   The description of the slang
     * @param string $sample A sample sentence that shows how the slang can be used
     *
     * @throws Exception if entry you are trying to update doesn't exist in the database
     */
    public function updateEntry($slang, $desc = null, $sample = null)
    {
        if ($this->entryExists($slang)) {
            $entryIndex = $this->getEntryIndex($slang);
            parent::$data[$entryIndex]['slang'] = $slang;

            if ($desc !== null) {
                parent::$data[$entryIndex]['description'] = $desc;
            }

            if ($sample !== null) {
                parent::$data[$entryIndex]['sample-sentence'] = $sample;
            }
        } else {
            throw new \Exception("Entry doesn't exist", 3);
        }
    }

    /**
     * Retrieves a sample sentence for the urban slang.
     *
     * @param string $entry Slang whose definition we want to retrieve
     *
     * @throws Exception if entry sample sentence you are trying to retrive doesn't exist in the database
     *
     * @return string returns the sample sentence of the entry
     */
    public function retrieveSampleSentence($entry)
    {
        if ($this->entryExists($entry)) {
            $entryIndex = $this->getEntryIndex($entry);

            return parent::$data[$entryIndex]['sample-sentence'];
        } else {
            throw new \Exception("Entry doesn't exist", 3);
        }
    }

    /**
     * @param string $slang  The urban slang to be stored
     * @param string $desc   The description of the slang
     * @param string $sample A sample sentence that shows how the slang can be used
     *
     * @return array[] returns an associative array
     */
    private function constructAssocArray($word, $desc, $sample)
    {
        return array(
            'slang' => $word,
            'description' => $desc,
            'sample-sentence' => $sample,
            );
    }

    /**
     * @param string $entry the urban slang whose index we are searching for
     *
     * @return int returns the index of the entry in the array or -1 if not found
     */
    private function getEntryIndex($entry)
    {
        for ($i = 0; $i < count(parent::$data); $i++) {
            if (parent::$data[$i]['slang'] === $entry) {
                return $i;
            }
        }

        return -1;
    }

    /**
     * Checks if an urban slang exists in my database.
     *
     * @param string $entry the urban slang we are searching for
     *
     * @return bool returns either true if entry exists and false if it doesnt
     */
    private function entryExists($entry)
    {
        for ($i = 0; $i < count(parent::$data); $i++) {
            if (parent::$data[$i]['slang'] === $entry) {
                return true;
            }
        }

        return false;
    }
}
