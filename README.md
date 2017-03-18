**HorlarME/uriman**
===============
----------
Github: https://github.com/horlarme/uriman

Description
----------
----------
**uriman** is a PHP library which is meant to manipulate the Uniform Resource Identifier (URI) of a particular web site or page.
**uriman** is developed to work with all PHP versions.

Directory
-------
File folder structure of uriman.

 - uriman (folder)
	 - src (folder)
		 - uriman.php (file) The main class or program.
	 - Vendor (folder) Composer Folder and File
 - index.php (file) A test file to test the program, please delete before final production.

Usage
-------

 To start the library, include the main class using the code below
 

    include_once "uriman/src/uriman.php";
Or you could just add the library directly to your app using [composer](https://packagist.org/packages/horlarme/uriman)

    composer require horlarme/uriman

Example:

    use uriman\uriman; //uriman namespace
    
    $uri = new uriman; //Using the class file

Use the below code to start or instantiate uriman to get what it needs to function
	
	$uri->start(); //Starting uriman

To get the full address of the current page
    
    echo "My Address: " . $uri->address . "<br />\n"; //Get the complete URL address of the current page

To get the value of a url/uri query
    
    echo "The value for name: " . $uri->show("name") . "<br />\n"; //Getting the value of a URI query

To edit a value of a uri query
   
   $uri->edit("name", "Lawal Oladipupo");

The below code output the uri queries as an array
    
    echo "<pre>";
    print_r($uri->uri_array);
    echo "</pre><br />";

The below code output the uri values as JSON format
   
	echo "JSON Format:" . $uri->uri_json;

Note: Please this is the first production file, so there might be some issues and also, the script doesn't produce/provide any error notice, if it doesn't work, you'll have to debug manually.

Contact the developer: lawboi4love@gmail.com
