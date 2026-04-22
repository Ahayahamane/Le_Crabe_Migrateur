let popup = document.getElementById('notification-popup');
document.addEventListener('DOMContentLoaded', function () {
    if (popup) {
        let popup = document.getElementById('notification-popup');

        // Affichage immédiat
        popup.classList.add('show');

        // Fermeture automatique après 10 secondes
        setInterval(hide, 10000);
    }

});
function hide() {
    popup.remove();
}