<!-- this file contains the DB class -->

<!-- in the professional or MVC, we use PDO -->

<?php

Trait Database
{

    // this function is always used in this particular class
    private function DBConnect()
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

        try {
            $DBConnection = new PDO($dsn, DB_USER, DB_PASS); // create new PDO object and return it
            return $DBConnection;
        } catch (PDOException $error) {
            $errror_message =  'Connection Failed' . $error->getMessage();
            echo $errror_message;
            exit();
        }
    }

}

// if we want to create a class, way is right here.
// How to use this class ? use inside the Model.php file
