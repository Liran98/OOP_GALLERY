<?php

class Comment extends Db_object
{
    // theres attributes has to be the same names coming from the database
    public $id;
    public $photo_id;
    public $author;
    public $body;



    protected static $db_table = "comments";
    protected static $db_table_fields = array('photo_id', 'author', 'body');


    public static function create_comment($pic_id, $auth = "john Doe", $body = "")
    {

        if (!empty($pic_id) && !empty($auth) && !empty($body)) {
            $comment = new Comment();

            $comment->photo_id = (int)$pic_id;
            $comment->author = $auth;
            $comment->body = $body;

            return $comment;
        } else {
            return false;
        }
    }


    public static function find_the_comments($pid = 0)
    {
        global $database;
        $pid_escape = $database->escape_string($pid);
        $sql = "SELECT * FROM " . self::$db_table . " WHERE photo_id = $pid_escape ORDER BY photo_id ASC";

        return self::find_by_query($sql);
    }
} //end of comment class

$comment = new Comment();
