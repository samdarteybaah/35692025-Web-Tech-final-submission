document.querySelectorAll('.flashcard').forEach((flashcard) => {
    flashcard.addEventListener('click', () => {
        flashcard.classList.toggle('flipped');
    });
});