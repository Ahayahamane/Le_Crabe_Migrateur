<section class="content fondCanard"><!-- section principale -->
    <section class="infos fondVertClair"><!-- sous-section -->
        <h2>Informations du compte</h2>
        <p>Pseudo:<?= $_SESSION['user']->get("pseudonym") ?></p>
        <p>Role:<?= $_SESSION['user']->get("role") ?></p>
        <a class="bouton fondBleuCiel" href="?path=logout">Se déconnecter</a>
    </section>
    <section class="supp fondVertClair"><!-- sous-section -->
        <form method="POST" action="?path=delete_account">
            <h2>Suppression du compte</h2>

            <label>Entrez votre mot de passe puis confirmez la suppression de votre compte</label>
            <input class="square" type="password" name="password" placeholder="mot de passe">

            <label><input type="checkbox" name="sup_comment"> Je souhaite supprimer tout mes messages</label>

            <input class="square bouton fondBleuCiel" type="submit" value="Confirmer">
        </form>
    </section>
</section>