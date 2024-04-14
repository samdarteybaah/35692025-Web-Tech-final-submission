document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.querySelector('#password');
    const retypePasswordInput = document.querySelector('#retypePassword');
    const passwordRequirements = document.querySelector('.password-requirements');
    const retryPasswordRequirements = document.querySelector('.retry_password_requirements');

    passwordInput.addEventListener('input', () => {
        const passwordRegex = /^(?=.*[A-Z])(?=.*[0-9]).{8,}$/;
        if (!passwordRegex.test(passwordInput.value)) {
            passwordRequirements.style.color = 'red';
        } else {
            passwordRequirements.style.color = 'inherit';
        }
    });

    retypePasswordInput.addEventListener('input', () => {
        if (retypePasswordInput.value !== passwordInput.value) {
            retryPasswordRequirements.style.color = 'red';
        } else {
            retryPasswordRequirements.style.color = 'inherit';
        }
    });
});
