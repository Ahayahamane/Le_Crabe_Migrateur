<div>
    <p>Pseudo:<?= $_SESSION['user']->get("pseudonym") ?></p>
    <a href="?path=logout">Se déconnecter</a>
</div>
<div>
    <form method="POST" action="?path=delete_account">
        <div class="field fondVertClair">
            <label>Entrez votre mot de passe puis confirmez la suppression de votre compte</label>
            <input type="password" name="password" placeholder="mot de passe">
            <label><input type="checkbox" name="sup_comment">Je souhaite supprimer tout mes messages</label>
            <input class=" fondVertClair" type="submit" value="Confirmer">
        </div>
    </form>
</div>