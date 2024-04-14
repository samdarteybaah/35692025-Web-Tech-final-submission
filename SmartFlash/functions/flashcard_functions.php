<?php
function get_flashcards_by_set_id($set_id) {
    global $dbConnection;

    $query = "SELECT * FROM Flashcard WHERE flashcardsetid = ?";
    $statement = $dbConnection->prepare($query);
    $statement->bind_param("i", $set_id);
    $statement->execute();
    $result = $statement->get_result();

    $flashcards = [];
    while ($row = $result->fetch_assoc()) {
        $flashcards[] = $row;
    }

    return $flashcards;
}

function get_flashcard_set_by_id($flashcardSetId) {
    global $dbConnection;

    $query = "SELECT * FROM FlashcardSet WHERE flashcardsetid = ?";
    $statement = $dbConnection->prepare($query);

    // Bind the parameter
    $statement->bind_param("i", $flashcardSetId);

    // Execute the statement
    $statement->execute();
    $result = $statement->get_result();

    // Fetch the data from the result set
    if ($row = $result->fetch_assoc()) {
        return $row;
    } else {
        return null;
    }
}


function update_flashcard_set($flashcardSetId, $name, $description) {
    global $dbConnection;

    $query = "UPDATE FlashcardSet SET name = ?, description = ? WHERE flashcardsetid = ?";
    $statement = $dbConnection->prepare($query);

    // Bind the parameters
    $statement->bind_param("ssi", $name, $description, $flashcardSetId);

    // Execute the statement
    return $statement->execute();
}

// Retrieve flashcard set ID based on the name
$flashcardSetName = isset($_GET['name']) ? urldecode($_GET['name']) : '';
$flashcardSetId = get_flashcard_set_id_by_name($flashcardSetName);

// Function to get flashcard set ID by name
function get_flashcard_set_id_by_name($name) {
    global $dbConnection;

    $query = "SELECT flashcardsetid FROM FlashcardSet WHERE name = ?";
    $statement = $dbConnection->prepare($query);
    $statement->bind_param("s", $name);
    $statement->execute();
    $result = $statement->get_result();

    if ($row = $result->fetch_assoc()) {
        return $row['flashcardsetid'];
    } else {
        return null;
    }
}

// Function to delete flashcard set ID 
function delete_flashcard_set($flashcardSetId) {
    global $dbConnection;

    $query = "DELETE FROM FlashcardSet WHERE flashcardsetid = ?";
    $statement = $dbConnection->prepare($query);

    // Bind the parameter
    $statement->bind_param("i", $flashcardSetId);

    // Execute the statement
    return $statement->execute();
}
