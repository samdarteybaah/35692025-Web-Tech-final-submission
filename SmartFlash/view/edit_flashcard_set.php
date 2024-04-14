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

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if (empty($name)) {
        $nameError = "Name is required.";
    }

    // Update the flashcard set
    if (empty($nameError)) {
        $updateResult = update_flashcard_set($flashcardSetId, $name, $description);

        if ($updateResult) {
            header('Location: dash_view.php');
            exit;
        } else {
            echo "Error updating flashcard set.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Flashcard Set</title>
    <link rel="stylesheet" href="../stylesheet/styleCreateSet.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <main>
        <div class="container">
            <div class="sidebar">
                <!-- Sidebar content -->
            </div>
            <div class="content">
                <h1>Edit Flashcard Set</h1>
                <form action=" " method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($flashcardSet['name']); ?>" required>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required><?php echo htmlspecialchars($flashcardSet['description']); ?></textarea>

                    <button type="submit">Save Changes</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>