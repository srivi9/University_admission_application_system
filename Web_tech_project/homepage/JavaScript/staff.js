document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const applicationsSection = document.getElementById('applications');

    loginForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const username = loginForm.elements.username.value;
        const password = loginForm.elements.password.value;

        // Perform authentication logic here (not implemented in this example)

        // For demonstration purposes, assume successful login
        loginForm.reset();
        loginForm.classList.add('hidden');
        applicationsSection.classList.remove('hidden');
    });
});
