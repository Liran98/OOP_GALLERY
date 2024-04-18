<?php

class User
{

    public static function find_all_users()
    {

        global $database;

        $result_set = $database->query("SELECT * FROM users");

        return $result_set;
    }

    public static function find_user_by_id($id)
    {
        global $database;

        $res_users = $database->query("SELECT * FROM users WHERE id = $id LIMIT 1");

        $found_user = mysqli_fetch_array($res_users);

        return $found_user;
    }
}

$user = new User();
