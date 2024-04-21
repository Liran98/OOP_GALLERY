<?php

class User
{

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;



    public static function find_all_users()
    {
        // global $database;
        // $result_set = $database->get_query("SELECT * FROM users");
        // return $result_set;

        return self::find_this_query("SELECT * FROM users");
    }

    public static function find_user_by_id($id)
    {
        // global $database;
        // $res_users = $database->get_query("SELECT * FROM users WHERE id = $id LIMIT 1");
        // $found_user = mysqli_fetch_array($res_users);
        // return $found_user;

        $res_users = self::find_this_query("SELECT * FROM users WHERE id = $id LIMIT 1");
        $found_user = mysqli_fetch_array($res_users);
        return $found_user;
    }

    public static function find_this_query($sql)
    {
        global $database;

        $result = $database->get_query($sql);

        return $result;
    }

    public static function instant($the_record)
    {
        $the_object = new self;
        // $the_object->username = $the_record['username'];
        // $the_object->id = $the_record['id'];
        // $the_object->password = $the_record['password'];
        // $the_object->first_name = $the_record['first_name'];
        // $the_object->last_name = $the_record['last_name'];

        foreach ($the_record as $the_attribute => $value) {

            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            };

            
        }
        return $the_object;
    }


    private function has_the_attribute($the_attribute)
    {
        $object_properties = get_object_vars($this);
        
        return array_key_exists($the_attribute, $object_properties);
    }
}

$user = new User();
