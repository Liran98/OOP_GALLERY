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

        $res_array = self::find_this_query("SELECT * FROM users WHERE id = $id LIMIT 1");
        // $found_user = mysqli_fetch_array($res_users);
        // return $found_user;

        //?regular way 
        // if (!empty($res_array)) {
        //     $first_item = array_shift($res_array);
        //     return $first_item;
        // }else{
        //     return false;
        // }
        // return $res_array;

        //? ternanry operator       array_pop() last value
        return !empty($res_array) ? array_shift($res_array) : false;
    }

    public static function find_this_query($sql)
    {
        global $database;

        $result = $database->get_query($sql);

        $the_object_array = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $the_object_array[] = self::instant($row);
        }

        return $the_object_array;
    }

    public static function instant($the_record)
    {
        $the_object = new self;    
                              //!$the_attribute //!$value//
        // $the_object->username = $the_record['username'];
        // $the_object->id = $the_record['id'];
        // $the_object->password = $the_record['password'];
        // $the_object->first_name = $the_record['first_name'];
        // $the_object->last_name = $the_record['last_name'];


        //?$the_record coming from the instant function built like this $the_attribute ['username']. $value 
        foreach ($the_record as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) { //true
                $the_object->$the_attribute = $value; // User->$username = 'data given'
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



// So what is going on?
// Here are some of the things our app is doing!


// What each method is doing ....Let's  use the User class for example 

//  User::find_all()  ... Here is the flow once is called 

// 1.   It goes to the find_all method 

// 2. The find_all() returns the find_by_query() results 

// 3. The find_by_query()  does a couple things 

//        1. it makes the query 

//         2. Fetches the the data from database table using  a while loop and it returns it in $row

//         3. Passes the results ($row) to the Instantiation (instantantion - weird name I know) method

//         4. Returns the object in the $the_object_array variable that it gets from the  instantantion method.

//         5. And that will be the result that find_all() returns when we use User::find_all()



//   What the Instantation method is doing

//    1. Gets the calling class name.

//    2. Creates an instance of the class

//    3. It loops through the $the_record variable that has all the records

//    4. It checks to see if the properties exist on that object with the other method has_the_property() 

//    5. If the keys from the record which basically are the columns from db table are found or equal the object properties then it assigns    the values to them.

//   6. Finally it returns the object!



// The purpose of this is to basically create our own API to deal with the database query so that in the future we can plug in other API's. Now there still a couple things I want to improve to make this way better, cleaner and more universal. 