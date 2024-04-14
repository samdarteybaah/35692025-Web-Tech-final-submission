<?php
session_start();
require_once '../settings/connection.php'; // Include the file that establishes database connection
require_once '../functions/flashcard_functions.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Login/login_view.php');
    exit;
}

$flashcardSetId = isset($_GET['id']) ? $_GET['id'] : '';

if (empty($flashcardSetId) || !$flashcardSet = get_flashcard_set_by_id($flashcardSetId)) {
    echo "Flashcard set not found.";
    exit;
}

$flashcards = get_flashcards_by_set_id($flashcardSetId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Flashcards</title>
    <link rel="stylesheet" href="../stylesheet/view_flashcards.css">
</head>
<body>
    <header>
        <a href="../view/dash_view.php">
            <h1 class="logo">SmartFlash</h1>
        </a>
    </header>

    <div class="flashcard-set-info">
        <h2 class="flashcard-set-title"><?php echo htmlspecialchars($flashcardSet['name']); ?></h2>
        <p class="flashcard-set-description"><?php echo htmlspecialchars($flashcardSet['description']); ?></p>
    </div>
    <div class="links">
        <a href="edit_flashcard_set.php?id=<?php echo $flashcardSetId; ?>" class="edit-button">Edit Flashcard Set</a>
        <a href="delete_flashcard_set.php?id=<?php echo $flashcardSetId; ?>" class="delete-button" onclick="return confirm('Are you sure you want to delete this flashcard set?');">Delete Flashcard Set</a>
        <a href="add_flashcard.php?set_id=<?php echo $flashcardSetId; ?>" class="add-flashcard-button">Add Flashcard</a>
    </div>
    
    <div class="flashcard-container">
        <?php foreach ($flashcards as $flashcard): ?>
            <div class="flashcard">
                <div class="flashcard-question"><?php echo htmlspecialchars($flashcard['question']); ?></div>
                <div class="flashcard-answer"><?php echo htmlspecialchars($flashcard['answer']); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <script src="../js/view_flashcard.js"></script>
</body>
</html>