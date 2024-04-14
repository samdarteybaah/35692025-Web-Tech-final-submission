document.getElementById('add-flashcard').addEventListener('click', function() {
    const container = document.getElementById('flashcard-container');
    const flashcard = document.createElement('div');
    flashcard.classList.add('flashcard');
    flashcard.innerHTML = `
        <label for="question${container.children.length + 1}">Question:</label>
        <input type="text" id="question${container.children.length + 1}" name="question[]" required><br>
        <label for="answer${container.children.length + 1}">Answer:</label>
        <input type="text" id="answer${container.children.length + 1}" name="answer[]" required><br>
    `;
    container.appendChild(flashcard);
});