<?php
session_start();
require_once '../settings/connection.php'; // Include the file that establishes database connection
require_once '../functions/flashcard_functions.php'; 

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Login/login_view.php');
    exit;
}

$flashcardSetId = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

// Retrieve the flashcard set from the database
$query = "SELECT * FROM FlashcardSet WHERE flashcardsetid = ?";
$statement = $dbConnection->prepare($query);
$statement->bind_param("i", $flashcardSetId);
$statement->execute();
$flashcardSet = $statement->get_result()->fetch_assoc();

// Delete the flashcard set
delete_flashcard_set($flashcardSetId);
header('Location: dash_view.php#deletion=successful');
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Flashcard Set</title>
    <link rel="stylesheet" href="../stylesheet/style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <a href="../view/dash_view.php">
            <h1 class="logo">SmartFlash</h1>
        </a>
    </header>

    <main>
        <div class="container">
            <div class="content">
                <h1>Delete Flashcard Set</h1>
                <p>Are you sure you want to delete this flashcard set?</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="flashcard_set_id" value="<?php echo $flashcardSetId; ?>">
                    <button type="submit" name="confirm_delete" value="yes">Yes, delete</button>
                    <button type="submit">Cancel</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

