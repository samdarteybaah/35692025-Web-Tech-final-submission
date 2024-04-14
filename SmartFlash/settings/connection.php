<?php
define ("DB_HOST", '127.0.0.1:4306');
define ("DB_USERNAME", 'root');
define("DB_PASSWORD", '');
define ("DB_NAME", "flashcard_db");

try{
    $dbConnection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);  

    if ($dbConnection->connect_error) {
        die("Database connection failed: " . $dbConnection->connect_error);
    }

    $dbConnection->query("SET GLOBAL general_log = 'ON'");
    $dbConnection->query("SET GLOBAL log_output = 'TABLE'");


} catch (mysqli_sql_exception $e) {
   die("Database connection failed: " . $e->getMessage());
}

?>