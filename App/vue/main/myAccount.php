<div>
    <p>Psedo:<?= $_SESSION['user']->get("psedonym") ?></p>
    <a href="?path=logout">Se déconnecter</a>
</div>
<div>
    <form method="POST" action="?path=delete_account">
        <div class="field fondVertClair">
            <legend>Votre mot de passe</legend>
            <input type="text" name="password" placeholder="mot de passe">
            <label><input type="checkbox" name="sup_comment">Je souhaite supprimer tout mes messages</label>
            <label><input type="submit">Supprimer mon compte</label>
        </div>
    </form>
</div>