<?php

class User extends Db_object
{
    // theres attributes has to be the same names coming from the database
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public $user_image;
    public $tmp_path;
    public $type;
    public $size;

    public $upload_directory = "images";
    public $image_placeholder = "https://placehold.co/64x64.png";


    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');


 

    public function upload_photo()
    {
        // if ($this->id) {
        //     $this->update();
        // } else {


            if (!empty($this->custom_errors)) {
                return false;
            }

            if (empty($this->user_image) || empty($this->tmp_path)) {
                $this->custom_errors[] = "the file was not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

            if (file_exists($target_path)) {
                $this->custom_errors[] = "the file {$this->user_image} already exists";
                return false;
            }

            if (move_uploaded_file($this->tmp_path, $target_path)) {
                // if ($this->create()) {
                    unset($this->tmp_path);
                    return true;
                // }
            } else {
                $this->custom_errors[] = "the file directory probably doesnt have permission ";
                return false;
            }

            // $this->create();
        // }
    }

    public function image_path_and_placeholder()
    {
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
    }

    public static function verify_user($user, $pass)
    {
        global $database;


        $user = $database->escape_string($user);
        $pass = $database->escape_string($pass);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '$user' ";
        $sql .= "AND password = '$pass' ";
        $sql .= "LIMIT 1";

        $res_array = self::find_by_query($sql);

        
            return !empty($res_array) ? array_shift($res_array) : false;
    }

    public function delete_photo_user(){
        if($this->delete()){
            $target_path = SITE_ROOT.DS."admin".DS . $this->upload_directory . DS . $this->user_image;
            return unlink($target_path);
        }
    }

 
} //end of user class

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

 //7. testing


// The purpose of this is to basically create our own API to deal with the database query so that in the future we can plug in other API's. Now there still a couple things I want to improve to make this way better, cleaner and more universal. 