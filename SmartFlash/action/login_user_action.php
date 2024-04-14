<?php
session_start(); // Start the session
include '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Query to fetch user details
    $sql = "SELECT * FROM People WHERE email = ?";
    $stmt = $dbConnection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['passwd'])) {
            // Password is correct, set session variables and redirect to dashboard
            $_SESSION['logged_in'] = true;
            $_SESSION['pid'] = $row['pid'];
            $_SESSION['user_id'] = $row['pid'];
            $_SESSION['email'] = $email;
            header("Location: ../view/dash_view.php");
            exit;
        } else {
            header("Location: ../Login/login_view.php#login=failed");
            echo "Incorrect username or password";
        }
    } else {
        echo "Incorrect username or password";
    }
    
    $stmt->close();
}

$dbConnection->close();
?>