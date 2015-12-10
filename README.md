[![StyleCI](https://styleci.io/repos/47273090/shield)](https://styleci.io/repos/47273090)
[![Circle CI](https://circleci.com/gh/andela-badebiyi/checkpoint_one.svg?style=svg)](https://circleci.com/gh/andela-badebiyi/checkpoint_one)

#Checkpoint One
##Summary
This project is the first checkpoint for my Andela Simulations. It is a dictionary databse for Urban slangs,you are able to perform CRUD operations on the dictionary database.

The `src` directory contains a package of 3 files that lets you create, read, update and delete urban words from a temporary database. It also includes a ranking system that enables you to group words by the frequency of their occurrence and rank them in descending order based on that frequency.

##Usage

```php
//create a dictionary instance to begin
$dictionary = new DictionaryCRUD();

//Create a new entry into the databse
$dictionary->addEntry("wetin dey", "A nigerian slang for 'whats up'", "my padi wetin dey na");

//Update an existing entry into the databse (third argument is optional)
$dictionary->updateEntry("wetin dey", "A nigerian slang for 'hello'", "hey bro wetin dey");

//Retrieve a definition for a slang that exists in our database
$dictionary->retrieveDefinition("wetin dey");

//Delete an existing definition
$dictionary->deleteEntry("wetin dey");

/* Ranking system
*  returns an associative array of words as keys and frequency of occurrence as values
*/
WordManipulate::group($dictionary->retrieveSampleSentence("wetin dey"));
```
##Requirements

* [PHP]("http://php.net/releases/5_4_0.php")
* [PHPUnit]("https://phpunit.de/")

##Testing
Move to the root directory and in your terminal run `phpunit --bootstrap <path to class file> <path to corresponding test file>` e.g `phpunit --bootstrap src/Dictionary.php tests/DictionaryTests.php`
