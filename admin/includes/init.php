<?php
                                         //  DIRECTORY_SEPARATOR = /
                                         //DS = /


                                         // if alreay defined then its null else we create a new constant
defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);
     
defined('SITE_ROOT') ? null : define('SITE_ROOT',DS."MAMP\htdocs\sec3_gallery");

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');



require_once("db_object.php");
require_once("new_config.php");
require_once("database.php");
require_once("functions.php");
require_once("session.php");
require_once("user.php");
require_once("photo.php");
require_once("comment.php");


?>