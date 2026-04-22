document.addEventListener('DOMContentLoaded', () => {
    let toggleBtn = document.getElementById('burger');
    console.log('toggleBtn');
    let menu = document.getElementById('menuPrincipal');
    console.log('menu');
    toggleBtn.addEventListener('click', () => {
        console.log('zog');
        menu.classList.toggle('display');
    })
})