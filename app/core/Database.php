<!-- this file contains the DB class -->

<!-- in the professional or MVC, we use PDO -->

<?php

class Database
{

    // this function is always used in this particular class
    private function DBConnect()
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

        try {
            $DBConnection = new PDO($dsn, DB_USER, DB_PASS); // create new PDO object and return it
            return $DBConnection;
        } catch (PDOException $error) {
            echo 'Connection Failed' . $error->getMessage();
        }
    }

    // this function is use for run the query
    public function query()
    {
        
    }
}
