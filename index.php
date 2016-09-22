<?php

require 'vendor/autoload.php';
use bd\Dictionary;
use bd\DictionaryCRUD;

echo count(Dictionary::$data);
$dic = new DictionaryCRUD();
$dic->addEntry('hey', 'hi', 'heeeeeye');
echo $dic->retrieveSampleSentence('hey');
