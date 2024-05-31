<?php

class Db_object
{
    public $custom_errors = array();

    public static function find_all()
    {

        return static::find_by_query("SELECT * FROM " . static::$db_table . "");
    }
    //! or id or id as a parameter $column , $id comes from the $_GET or hardcoded
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
    public $upload_errors_array = array(

        UPLOAD_ERR_OK => "There is no error",

        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini",

        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",

        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",

        UPLOAD_ERR_NO_FILE => "No file was uploaded.",

        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",

        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",

        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."

    );







    public function set_file($file)
    {

        if (empty($file) || !$file || !is_array($file)) {
            $this->custom_errors[] = "there was no uploaded file here";
            return false;
        } else if ($file['error'] !== 0) {
            $this->custom_errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            // $this->user_image = basename($file['name']);
            // $this->tmp_path = $file['tmp_name'];
            // $this->type = $file['type'];
            // $this->size = $file['size'];

        }
    }


    public static function count_all()
    {
        global $database;

        $sql = "SELECT COUNT(*) FROM " . static::$db_table;

        $result_set =  $database->get_query($sql);

        $row = mysqli_fetch_array($result_set);

        return array_shift($row);
    }
} //end of class
