<?php

class Photo extends Db_object
{
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $caption;
    public $alternate_text;

    // "C:\MAMP\htdocs\sec3_gallery"
    public $tmp_path;

    public $upload_directory = "images";

    public $custom_errors = array();

    protected static $db_table = "photos";
    protected static $db_table_fields = array('title', 'description', 'filename', 'type', 'size');

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


    // this is passing $_FILES['uploaded_file'] as an argument
    public function set_file($file)
    {

        if (empty($file) || !$file || !is_array($file)) {
            $this->custom_errors[] = "there was no uploaded file here";
            return false;
        } else if ($file['error'] !== 0) {
            $this->custom_errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }

    public function picture_path()
    {
        return $this->upload_directory . DS . $this->filename;
    }

    public function save()
    {
        if ($this->photo_id) {
            $this->update();
        } else {


            if (!empty($this->custom_errors)) {
                return false;
            }

            if (empty($this->filename) || empty($this->tmp_path)) {
                $this->custom_errors[] = "the file was not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

            if (file_exists($target_path)) {
                $this->custom_errors[] = "the file {$this->filename} already exists";
                return false;
            }

            if (move_uploaded_file($this->tmp_path, $target_path)) {
                if ($this->create()) {
                    unset($this->tmp_path);
                    return true;
                }
            } else {
                $this->custom_errors[] = "the file directory probably doesnt have permission ";
                return false;
            }

            $this->create();
        }
    }


    public function delete_pic($id)
    {
        global $database;

        if ($database->get_query("DELETE FROM " . self::$db_table . " WHERE photo_id = $id")) {
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();

            return unlink($target_path) ? true : false;
        } else {
            return false;
        }

      
    }

    public function pic_update($id)
    {
        global $database;

        $properties = $this->properties();

        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(",", $properties_pairs);
        $sql .= " WHERE photo_id = $id";

        $database->get_query($sql);

        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
    }
}//end of photo class
