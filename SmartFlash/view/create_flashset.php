<?php
session_start();
require_once '../settings/connection.php'; // Include the file that establishes database connection
require_once '../functions/flashcard_functions.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Login/login_view.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Flashset</title>
    <link rel="stylesheet" href="../stylesheet/styleCreateSet.css">
</head>
<body>
    <h1>Create Flashset</h1>
    <form action="../action/create_flashset_action.php" method="post">
        <label for="name">Flashset Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>
        <h2>Add Flashcards</h2>
        <div id="flashcard-container">
            <div class="flashcard">
                <label for="question1">Question:</label>
                <input type="text" id="question1" name="question[]" required><br>
                <label for="answer1">Answer:</label>
                <input type="text" id="answer1" name="answer[]" required><br>
            </div>
        </div>
        <button type="button" id="add-flashcard">Add Flashcard</button>
        <button type="submit">Create Flashset</button>
    </form>
    <script src="../js/create_script.js"></script>
</body>
</html>