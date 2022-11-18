<!-- since this is a php file, never put the html tags.
and not close the php tag also (?>)
this is help to avoid the problems. -->

<?php
session_start();

require '../app/core/init.php'; // loaded the all the files in the core folder

$app = new App(); // create the object of the App class
$app->loadController(); // call the public loadController function





