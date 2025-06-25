// Mostrar el modal
document.addEventListener("DOMContentLoaded", function () {
    const loginBtn = document.querySelector('.login-button');
    const modal = document.getElementById('loginModal');
    const closeBtn = document.querySelector('.close');

    loginBtn.addEventListener('click', function () {
        modal.style.display = 'block';
    });

    closeBtn.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});