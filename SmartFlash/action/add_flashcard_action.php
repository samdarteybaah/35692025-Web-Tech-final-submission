<?php
session_start();
require_once '../settings/connection.php'; // Include the file that establishes database connection
require_once '../functions/flashcard_functions.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Login/login_view.php');
    exit;
}

$flashcardSetId = isset($_POST['flashcardSetId']) ? $_POST['flashcardSetId'] : '';
$question = isset($_POST['question']) ? $_POST['question'] : '';
$answer = isset($_POST['answer']) ? $_POST['answer'] : '';

if (!empty($flashcardSetId) && !empty($question) && !empty($answer)) {
    $query = "INSERT INTO Flashcard (question, answer, flashcardsetid) VALUES (?, ?, ?)";
    $statement = $dbConnection->prepare($query);
    $statement->bind_param("ssi", $question, $answer, $flashcardSetId);
    $statement->execute();

    // Redirect to the flashcard set view
    header('Location: ../view/view_flashcard_set.php?id=' . $flashcardSetId);
    exit;
} else {
    echo "Error adding flashcard.";
}