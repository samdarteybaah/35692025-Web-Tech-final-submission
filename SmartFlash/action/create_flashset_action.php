<?php
require_once '../settings/connection.php'; // Include the file that establishes database connection

session_start();
$pid = $_SESSION['pid'];
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $questions = $_POST['question'];
    $answers = $_POST['answer'];

    // Insert flashset
    $query = "INSERT INTO FlashcardSet (name, description, userid) VALUES (?, ?, ?)";
    $statement = $dbConnection->prepare($query);
    $statement->bind_param("ssi", $name, $description, $pid);
    $statement->execute();
    $flashcardSetId = $statement->insert_id;

    //Insert flashcards
    for ($i = 0; $i < count($questions); $i++) {
        $query = "INSERT INTO Flashcard (question, answer, flashcardsetid) VALUES (?, ?, ?)";
        $statement = $dbConnection->prepare($query);
        $statement->bind_param("ssi", $questions[$i], $answers[$i], $flashcardSetId);
        $statement->execute();
    }

    // Save flashcardSetId in session variable
    $_SESSION['flashcardSetId'] = $flashcardSetId;


    // Redirect to the dashboard
    header('Location: ../view/dash_view.php');
    exit;
}
?>