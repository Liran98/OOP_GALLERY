<?php

class User extends Database
{

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
}

$user = new User();
