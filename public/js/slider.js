// Récupérer les éléments HTML des 2 boutons (left et right)
let boutonDroit = document.querySelector(".right");  //juste la classe suffit
let boutonGauche = document.querySelector(".left");

// Ajouter des écouteurs d'événement à ces 2 boutons
boutonDroit.addEventListener("click", defilerDroite);
boutonGauche.addEventListener("click", defilerGauche);

// Autoplay
setInterval(defilerDroite, 5000);

function calculerIndex() {

    let actualIndex = document.querySelector(".slider .main").dataset.index;
    let nextIndex = 0;
    let nextHidden = 0;
    let previousIndex = 0;
    let previousHidden = 0;
    let sliderImg = document.querySelectorAll(".slider .slide");

    switch (true) {
        case (actualIndex == 0):
            previousHidden = sliderImg.length - 2;
            previousIndex = sliderImg.length - 1;
            nextIndex = parseInt(actualIndex) + 1;
            nextHidden = parseInt(actualIndex) + 2;
            break;

        case (actualIndex == 1):
            previousHidden = sliderImg.length - 1;
            previousIndex = 0;
            nextIndex = parseInt(actualIndex) + 1;
            nextHidden = parseInt(actualIndex) + 2;
            break;

        case (actualIndex == sliderImg.length - 2):
            previousHidden = parseInt(actualIndex) - 2;
            previousIndex = parseInt(actualIndex) - 1;
            nextIndex = parseInt(actualIndex) + 1;
            nextHidden = 0;
            break;

        case (actualIndex == sliderImg.length - 1):
            previousHidden = parseInt(actualIndex) - 2;
            previousIndex = parseInt(actualIndex) - 1;
            nextIndex = 0;
            nextHidden = 1;
            break;

        default:
            previousHidden = parseInt(actualIndex) - 2;
            previousIndex = parseInt(actualIndex) - 1;
            nextIndex = parseInt(actualIndex) + 1;
            nextHidden = parseInt(actualIndex) + 2;
            break;
    }

    return [previousHidden, previousIndex, actualIndex, nextIndex, nextHidden, sliderImg];
}

function defilerDroite() {
    let index = calculerIndex();
    sliderImg = index[5];
    defiler(index[1], index[4], index[2], index[3], index[5]);
    sliderImg[index[3]].classList.remove("last");
    sliderImg[index[4]].classList.add("last");
}

function defilerGauche() {
    let index = calculerIndex();
    sliderImg = index[5];
    defiler(index[3], index[0], index[2], index[1], index[5]);
    sliderImg[index[3]].classList.remove("last");
    sliderImg[index[2]].classList.add("last");
}

function defiler(hide, show, removeMain, addMain, sliderImg) {
    sliderImg[hide].classList.remove("active");
    sliderImg[hide].classList.add("hidden");

    sliderImg[show].classList.remove("hidden");
    sliderImg[show].classList.add("active");

    sliderImg[removeMain].classList.remove("main");
    sliderImg[addMain].classList.add("main");
}