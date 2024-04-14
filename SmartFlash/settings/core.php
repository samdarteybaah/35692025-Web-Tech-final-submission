<?php
session_start();

function check_login(){
    if (!isset($_SESSION['user_id'])){
        header('Location: ../Login/login_view.php');
        die();
    }

}


function is_logged_in() {
    return isset($_SESSION['user_id']);
}


function redirect_to($location) {
    header('Location: ' . $location);
    exit;
}

function display_error($message) {
    echo "<p class='error'>" . htmlentities($message) . "</p>";
}

?>