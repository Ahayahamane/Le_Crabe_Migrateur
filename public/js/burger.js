document.addEventListener('DOMContentLoaded', () => {
    let toggleBtn = document.getElementById('burger');
    let menu = document.getElementById('menuPrincipal');
    toggleBtn.addEventListener('click', () => {
        menu.classList.toggle('display');
    })
})