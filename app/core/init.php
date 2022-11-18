<!-- this file is use to load all the other file within the core folder  -->
<!-- every files should added to the init, otherwise it's not part of the project -->


<!-- model is extends from the database class
that's why Model is below the Database class -->


<?php

require 'config.php';
require 'functions.php';
require 'Database.php'; // this one is a class, so that should be capatalization
require 'Model.php'; 
require 'Controller.php';
require 'App.php';

