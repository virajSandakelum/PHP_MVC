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

    function tets()
    {
        $query = "SELECT * FROM users";
        $result = $this->query($query);
        shows($result);
    }
}