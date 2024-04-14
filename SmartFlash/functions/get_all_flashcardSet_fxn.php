<?php
require_once '../settings/connection.php';

// // create a function that returns result of the SELECT query
// function get_all_flashcardSets($userid) {
//     // write the SELECT all flashcard sets query
//     $sql = "SELECT * FROM FlashcardSet WHERE userid = ?";

//     // execute the query using the connection
//     global $dbConnection;
//     $stmt = $dbConnection->prepare($sql);
//     $stmt->bind_param("i", $userid);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     // check if execution worked
//     if ($result) {
//         // check if any record was returned
//         if ($result->num_rows > 0) {
//             // fetch records if above is successful and assign to variable
//             $flashcardSets = $result->fetch_all(MYSQLI_ASSOC);
//         } else {
//             // return an empty array if no records were found
//             $flashcardSets = [];
//         }
//         return $flashcardSets;
//     } else {
//         // return false if the query execution failed
//         $flashcardSets = false;
//     }
// }


function get_all_flashcardSets($user_id) {
    global $dbConnection;

    $query = "SELECT * FROM FlashcardSet WHERE userid = ?";
    $statement = $dbConnection->prepare($query);
    $statement->bind_param("i", $user_id);
    $statement->execute();
    $result = $statement->get_result();

    $flashcardSets = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $flashcardSets[] = $row;
        }
    }

    return $flashcardSets;
}
?>