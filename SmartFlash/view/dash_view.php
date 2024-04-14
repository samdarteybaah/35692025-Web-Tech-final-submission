<?php
session_start();
require_once '../settings/connection.php'; // Include the file that establishes database connection
require_once '../functions/get_all_flashcardSet_fxn.php';
require_once '../functions/flashcard_functions.php';

// Retrieve the pid from the session
$pid = $_SESSION['pid'];

// Retrieve flashcardSetId from session variable
$flashcardSetId = isset($_SESSION['flashcardSetId']) ? $_SESSION['flashcardSetId'] : '';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Login/login_view.php');
    exit;
}

$query = "SELECT fname FROM people WHERE pid = ?";
$statement = $dbConnection->prepare($query);

// Bind the parameter
$statement->bind_param("i", $pid);

// Execute the statement
$statement->execute();
$result = $statement->get_result();

// Fetch the data from the result set
if ($row = $result->fetch_assoc()) {
    $fname = $row['fname'];
} else {
    // Handle case when no data is found
    $fname = "Unknown";
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Dashboard | SmartFlash</title>

  <link rel="stylesheet" href="../stylesheet/style.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <header>
    <a href = "../view/dash_view.php">
      <h1 class="logo">SmartFlash</h1>
    </a>  
  </header>

  <main>
    <div class="container">
      <div class="sidebar">
        <div class="sidebar-header">
        </div>
        <ul class="sidebar-nav">
          <span class="active"><i class="bx bx-chart"></i><a href="dash_view.php">Current decks</a></span>
        </ul>

        <ul class="lower_list">
          <a href="../action/logout_action.php" class="logout">
            <i class='bx bxs-log-out-circle' ></i>
            <span class="text">Logout</span>
          </a>
        </ul>
        
      </div>
      <div class="content">
        <h1>Welcome, <?php echo htmlspecialchars($fname); ?>! to the SmartFlash app dashboard</h1> 
        <p>This is an app that allows one to create flash cards for better revision, here have a go!</p>
        <br>
        <div class="flash_display">

        <?php

          // Create flashcard set link
          echo '<a href="../view/create_flashset.php" class="create-flashset">';
          echo '<i class=\'bx bxs-plus-circle\'></i>';
          echo '</a>';
          echo "<br>";
        
          $flashcardSets = get_all_flashcardSets($pid);

          if ($flashcardSets) {
            // Display flashcard sets and their flashcards
            foreach ($flashcardSets as $flashcardSet) {
                // Display flashcard set
                echo '<div class="flashcard-set">';
                echo '<h3>' . htmlspecialchars($flashcardSet['name']) . '</h3>';
        
                // Ensure 'id' key exists before using it
                $flashcardSetId = isset($flashcardSet['id']) ? $flashcardSet['id'] : '';
        
                // Display flashcard set actions
                echo '<div class="flashcard-set-actions">';
                echo '<a href="../view/edit_flashcard_set.php?id=' . $flashcardSet['flashcardsetid'] . '" class="edit-flashcard-set"><i class="bx bxs-edit"></i></a>';
                echo '<a href="../view/delete_flashcard_set.php?id=' . $flashcardSet['flashcardsetid'] . '" class="delete-flashcard-set">';
                echo '<i class="bx bxs-trash"></i></a>';
                echo '<script>document.querySelector(".delete-flashcard-set").onclick = function() {';
                echo 'return confirm("Are you sure you want to delete this flashcard set?");};</script>';
                echo '<a href="../view/view_flashcard_set.php?id=' . $flashcardSet['flashcardsetid'] . '" class="view-flashcard-set"><i class="bx bx-show"></i></a>';
                echo '</div>';

                // Display flashcards
                $flashcards = get_flashcards_by_set_id($flashcardSetId);
                if ($flashcards) {
                    foreach ($flashcards as $flashcard) {
                        echo '<div class="flashcard">';
                        echo '<div class="flashcard-front">' . htmlspecialchars($flashcard['front']) . '</div>';
                        echo '<div class="flashcard-back">' . htmlspecialchars($flashcard['back']) . '</div>';
                        echo '</div>';
                    }
                } else {
                    // echo '<p>No flashcards created yet.</p>';
                }
        
                echo '</div>';
            }
        } else {
            echo '<p>No flashcard sets created yet.</p>';
        }
    
        ?>
        
        </div>
      </div>
    </div>

  </main>

</body>
</html>
