<?php
session_start();
require_once '../settings/connection.php'; // Include the file that establishes database connection
require_once '../functions/flashcard_functions.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Login/login_view.php');
    exit;
}

$flashcardId = isset($_GET['id']) ? $_GET['id'] : '';

if (empty($flashcardId) || !$flashcard = get_flashcard_by_id($flashcardId)) {
    echo "Flashcard not found.";
    exit;
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input
    $question = trim($_POST['question']);
    $answer = trim($_POST['answer']);

    if (empty($question)) {
        $questionError = "Question is required.";
    }

    if (empty($answer)) {
        $answerError = "Answer is required.";
    }

    // Update the flashcard
    if (empty($questionError) && empty($answerError)) {
        $updateResult = update_flashcard($flashcardId, $question, $answer);

        if ($updateResult) {
            header('Location: view_flashcard_set.php?id=' . $flashcard['flashcardsetid']);
            exit;
        } else {
            echo "Error updating flashcard.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Flashcard</title>
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
                <h1>Edit Flashcard</h1>
                <form action="" method="post">
                    <input type="hidden" name="flashcardid" value="<?php echo htmlspecialchars($flashcard['flashcardid']); ?>">
                    <label for="question">Question:</label>
                    <input type="text" id="question" name="question" value="<?php echo htmlspecialchars($flashcard['question']); ?>" required>

                    <label for="answer">Answer:</label>
                    <input type="text" id="answer" name="answer" value="<?php echo htmlspecialchars($flashcard['answer']); ?>" required>

                    <button type="submit">Save Changes</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>