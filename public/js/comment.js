let button = document.querySelector(".comment");

button.addEventListener("click", displayForm);

function displayForm() {
    let form = document.querySelector("form");
    let input = document.getElementById("content");
    if (!input) {
        input = document.createElement("input");
        input.type = "text";
        input.id = "content";
        input.name = "content";
        input.placeholder = "Ecrivez votre commentaire ici";

        let button = document.createElement("input");
        button.type = "submit";
        button.name = "submit";
        button.value = "Envoyer";

        //     let divConteneur = document.createElement('div');
        //   divConteneur.className = 'form-group';

        form.appendChild(input);
        form.appendChild(button);
    }
}
