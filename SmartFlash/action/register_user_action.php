<?php

Include '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO People (fname, lname, email, passwd) VALUES (?, ?, ?, ?)";
    $stmt = $dbConnection->prepare($sql);

    $stmt->bind_param('ssss', $firstName, $lastName, $email, $passwordHash);


    try {
        $result = $stmt->execute();

        if ($stmt->errno) {
            die("Query execution failed: " . $stmt->error);
        }

        echo '<script> window.location.href= "../login/login_view.php";</script>';
        exit();

    } catch (mysqli_sql_exception $e) {
        die("Query execution failed: " . $e->getMessage());
    }


}



?>