<?php

class Db_object
{


    public static function find_all()
    {

        return static::find_by_query("SELECT * FROM " . static::$db_table . "");
    }

    public static function find_by_id($id)
    {

        $res_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");
        //? ternanry operator       array_pop() last value
        return !empty($res_array) ? array_shift($res_array) : false;
    }

    public static function find_by_query($sql)
    {
        global $database;

        $result = $database->get_query($sql);

        $the_object_array = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $the_object_array[] = static::instant($row);
        }

        return $the_object_array;
    }


    private function has_the_attribute($the_attribute)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    public static function instant($row)
    {
        $calling_class = get_called_class();

        //new static 
        $the_object = new $calling_class;
        foreach ($row as $the_attribute => $value) {
            //if the attribute exists in the object assign the attribute to the value
            if ($the_object->has_the_attribute($the_attribute)) { //true

                $the_object->$the_attribute = $value; // User->$username = 'data given'

            } else {
                echo "(attr doesnt exist)";
            }
        }
        return $the_object;
    }

    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create()
    {
        global $database;

        $properties = $this->properties();

        $sql = "INSERT INTO " . static::$db_table . " (" . implode(",", array_keys($properties)) . ")";
        $sql .= " VALUES ('" . implode("','", array_values($properties)) . "')";

        if ($database->get_query($sql)) {

            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        global $database;

        $properties = $this->properties();

        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(",", $properties_pairs);
        $sql .= " WHERE id = '$this->id'";

        $database->get_query($sql);

        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
    }


    public function delete()
    {
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " WHERE id = $this->id";
        $sql .= " LIMIT 1";
        $database->get_query($sql);

        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
    }
    protected function properties()
    {
        $properties = array();
        // return get_object_vars($this);

        foreach (static::$db_table_fields as $db_field) {

            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }
    //escaping strings 
    protected function clean_properties()
    {
        global $database;

        $clean_props = array();

        foreach ($this->properties() as $key => $value) {
            $clean_props[$key] = $database->escape_string($value);
        }
        return $clean_props;
    }
} //end of class
