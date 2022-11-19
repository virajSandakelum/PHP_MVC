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
    // each database table has a seperate model.
    // here we use generic value(users), but this overwritten by the specific model and actual table name
    protected $table = 'users'; // this is not private, public but inheritable.

    // where($data) => return multiple row, get the specific row
    // first($data) => return one row

    // $id => sql variable
    // :id => PDO variable

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "SELECT * FROM {$this->table} WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        // echo $query;  SELECT * FROM users WHERE id = :id AND name = :name AND

        $query = rtrim($query, " AND ");

        // echo $query; SELECT * FROM users WHERE id = :id AND name = :name

        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
    }

    // return the one row, just like we did with get_row.
    // But there is a big different
    // 01. get_row() => we put the query
    // 02. first() => we won't be typing queries, instead of the we putting values and then queries will be auto generated.
    // same as the insert() => we just put the values that we want to insert and it create the new record for us. 
    // we don't want to write the query.
    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "SELECT * FROM {$this->table} WHERE ";

        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }

        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }

        // echo $query;  SELECT * FROM users WHERE id = :id AND name = :name AND

        $query = rtrim($query, " AND ");

        // echo $query; SELECT * FROM users WHERE id = :id AND name = :name

        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);

        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    // use for the insert the row 
    public function insert($data)
    {
        $keys = array_keys($data);
        $query = "INSERT INTO {$this->table} (" . implode(',', $keys) . ") VALUES (:" . implode(',:', $keys) . ")";

        // echo $query; INSERT INTO users (id,name,age) VALUES (:id,:name,:age)

        $this->query($query, $data);

        return false;
    }

    // use for the update the row
    // $data => the daa that we want to update(this can't be empty)
    // $id_colum => different id column
    public function update($id, $data, $id_colum = 'id')
    {
        $keys = array_keys($data);
        $query = "UPDATE {$this->table} SET ";

        foreach ($keys as $key) {
            $query .= "$key = :$key, ";
        }

        $query = rtrim($query, ", ");

        $query .= " WHERE $id_colum = :id_colum";

        
        $data['$id_colum'] = $id;
        
        // echo $query;
        // echo $query; UPDATE users SET name = :name, age = :age WHERE id = :id_colum

        $this->query($query, $data);

        return false;
    }

    // delete the row based on the id, there may be sometime we don't want to main id
    // then we can put another one called, ID column.
    // default value is id.
    // use for the delete the row
    public function delete($id, $id_colum = 'id')
    {
        $data['id_colum'] = $id;
        $query = "DELETE FROM {$this->table} WHERE $id_colum = :id_colum";

        $this->query($query, $data);

        // echo $query;
        // $result = $model->delete("viraj", 'name');
        // DELETE FROM users WHERE name = :id_colum

        return false;
    }
}
