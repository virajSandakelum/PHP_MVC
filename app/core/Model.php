<!-- Model is inheritance from the Database class -->


<?php
/*

 * Main Model class *

 */

// Due to Model class is inheritance from the Database class, 
// everythings in the Database.php, we can use here
// we can use the" query function" here

class Model
{
    use Database;

    // this function is use for run the query from here
    // this function is take the query and the data(empty array) as parameter
    // doing this way, because we want to use prepared statements
    // prepare statement is safer, because it prevent from SQL injection
    // Normally write the a query we put variable inside the query
    // time : 1:35:24
    // https://www.youtube.com/watch?v=q0JhJBYi4sw

    // this is the query function, this is way the how run the query


    public function query($query, $data = [])
    {
        $DBConnection = $this->DBConnect(); // call the DBConnect function and get the connection
        $stm = $DBConnection->prepare($query); // prepare the statement
        $check =  $stm->execute($data); // execute the statement

        if ($check) {

            $result = $stm->fetchAll(PDO::FETCH_ASSOC); // fetch all the data and return as associative array

            if (is_array($result) && count($result) > 0) {

                return $result;
            }
        } else {
            // some query like insert, update, delete, don't return any data
            // so we don't need to return anything
            // that's why return false
            return false;
        }
    }


    public function get_row($query, $data = [])
    {
        $DBConnection = $this->DBConnect(); // call the DBConnect function and get the connection
        $stm = $DBConnection->prepare($query); // prepare the statement
        $check =  $stm->execute($data); // execute the statement

        if ($check) {

            $result = $stm->fetchAll(PDO::FETCH_ASSOC); // fetch all the data and return as associative array

            if (is_array($result) && count($result) > 0) {

                return $result[0]; // * only different is here, we return the first row
            }
        } else {
            // some query like insert, update, delete, don't return any data
            // so we don't need to return anything
            // that's why return false
            return false;
        }
    }

    // use for the insert the row 
    public function insert()
    {
    }

    // use for the update the row
    public function update()
    {
    }

    // use for the delete the row
    public function delete()
    {
    }
}
