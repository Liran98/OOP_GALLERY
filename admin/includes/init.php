<?php
                                         //  DIRECTORY_SEPARATOR = /
                                         //DS = /
defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);
     
defined('SITE_ROOT') ? null : define('SITE_ROOT',DS."C:\MAMP\htdocs\sec3_gallery\gallery");

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

require_once("new_config.php");
require_once("database.php");
require_once("functions.php");
require_once("session.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");

?>