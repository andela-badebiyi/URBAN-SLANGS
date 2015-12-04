<h1><strong>CHECKPOINT ONE</strong></h1>
<h2>Summary</h2>
<p>The Src folder contains a package of 3 files that lets you create, read, update and delete urban words from a temporary database. It also includes a ranking system that enables you to group words by the frequency of their occurrence and rank them in descending order based on that frequency </p>

<h2><strong>USAGE</strong></h2>
//create a dictionary instance to begin<br/>
$dictionary = new DictionaryCRUD();<br/>
<em>Create a new entry into the databse</em><br/>
$dictionary->addEntry("wetin dey", "A nigerian slang for 'whats up'", "my padi wetin dey na");<br/><br/>

<em>Update an existing entry into the databse</em><br/>
$dictionary->updateEntry("wetin dey", "A nigerian slang for 'hello'", "hey bro wetin dey");<br/>
<small>The third argument is optional</small></br></br>

<em>Retrieve a definition for a slang that exists in our database</em><br/>
$dictionary->retrieveDefinition("wetin dey");<br/></br>

<em>Delete an existing definition</em><br/>
$dictionary->deleteEntry("wetin dey");<br/><br/>

<em>Ranking system</em><br/>
WordManipulate::group($dictionary->retrieveSampleSentence("wetin dey"));<br/>
returns an associative array of words as keys and frequency of occurrence as values<br/><br/>

<h2>Requirements</h2>
<ul>
<li>A server that has php installed</li>
<li>Php unit installed on your machine</li>
</ul>

<h2>Testing</h2>
<p>Redirect to the root folder and in your terminal run "phpunit --bootstrap &lt path to class file&gt &ltpath to corresponding test file&gt"</p>
e.g "phpunit --bootstrap src/Dictionary.php tests/DictionaryTests.php"
