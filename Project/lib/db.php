<?php
//for this we'll turn on error output so we can try to see any problems on the screen
//this will be active for any script that includes/requires this one
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function getDB(){
    global $db;
    //this function returns an existing connection or creates a new one if needed
    //and assigns it to the $db variable
    if(!isset($db)) {
        try{
            //__DIR__ helps get the correct path regardless of where the file is being called from
            //it gets the absolute path to this file, then we append the relative url (so up a directory and inside lib)
<<<<<<< HEAD
            require_once(__DIR__. "/config.php");//pull in our credentials
=======
            require_once(__DIR__. "/../lib/config.php");//pull in our credentials
>>>>>>> 1c442e501acd8a1ad10ca5aae5f7346ef884cc26
            //use the variables from config to populate our connection
            $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
            //using the PDO connector create a new connect to the DB
            //if no error occurs we're connected
            $db = new PDO($connection_string, $dbuser, $dbpass);
        }
    catch(Exception $e){
            var_export($e);
            $db = null;
        }
    }
    return $db;
}
?>
<<<<<<< HEAD
=======

>>>>>>> 1c442e501acd8a1ad10ca5aae5f7346ef884cc26
