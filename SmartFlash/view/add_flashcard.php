<?php
session_start();
require_once '../settings/connection.php'; // Include the file that establishes database connection

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Login/login_view.php');
    exit;
}

$flashcardSetId = isset($_GET['set_id']) ? $_GET['set_id'] : '';

if (empty($flashcardSetId)) {
    echo "Invalid flashcard set.";
    exit;
}

// Function to get flashcard set name by ID
function get_flashcard_set_name_by_id($flashcardSetId) {
    global $dbConnection;

    $query = "SELECT name FROM FlashcardSet WHERE flashcardsetid = ?";
    $statement = $dbConnection->prepare($query);

    // Bind the parameter
    $statement->bind_param("i", $flashcardSetId);

    // Execute the statement
    $statement->execute();
    $result = $statement->get_result();

    // Fetch the data from the result set
    if ($row = $result->fetch_assoc()) {
        return $row['name'];
    } else {
        return null;
    }
}

$flashcardSetName = get_flashcard_set_name_by_id($flashcardSetId);

if ($flashcardSetName === null) {
    echo "Error: Flashcard set not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Flashcard</title>
    <link rel="stylesheet" href="../stylesheet/styleCreateSet.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="../js/create_script.js"></script>
</head>
<body>

    <main>
        <div class="container">
            <div class="sidebar">
                <!-- Sidebar content -->
            </div>
            <div class="content">
                <h1>Add Flashcard to Set: <?php echo htmlspecialchars($flashcardSetName); ?></h1>
                <form action="../action/add_flashcard_action.php" method="post">
                    <input type="hidden" name="flashcardSetId" value="<?php echo $flashcardSetId; ?>">
                    <label for="question">Question:</label>
                    <input type="text" id="question" name="question" required><br>
                    <label for="answer">Answer:</label>
                    <input type="text" id="answer" name="answer" required><br>
                    <button type="submit">Add Flashcard</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>