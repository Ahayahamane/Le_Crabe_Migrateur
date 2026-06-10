<section class="choice">
    <button class="fondVertClair"><a href="?path=get_commentarys">Liste des commentaires</a></button>
    <button class="fondVertClair"><a href="?path=get_all_users">Liste des comptes</a></button>
    <form class="fondVertClair" method="POST" action="?path=search_users">
        <label for="pseudonym"> Rechercher un utilisateur</label>
        <input type="text" name="pseudonym">
        <input type="submit" name="rechercher">
    </form>
</section>
<section class="list fondCanard">
    <?php foreach ($datas["users"] as $user): ?>
        <div class="fondVertClair">
            <header>
                <h2><?= $user->get("pseudonym") ?></h2>
            </header>
            <main>
                <p><?= $user->get("firstname") ?><?= $user->get("name") ?></p>
                <p><?= $user->get("role") ?></p>
                <p><?= $user->get("email") ?></p>
            </main>
            <footer>
                <a class="fondCanard" href='?path=sup_user&id=<?= $user->get("id") ?>'>Supprimer le compte</a>
                <?php if ($user->get("role") == 1): ?>
                    <a class="fondCanard" href='?path=role_organizer&id=<?= $user->get("id") ?>'>promouvoir au role: organisateur</a>
                <?php elseif ($user->get("role") == 2): ?>
                    <a class="fondCanard" href='?path=role_user&id=<?= $user->get("id") ?>'>Rétrograder au role: utilisateur</a>
                <?php endif ?>
            </footer>
        </div>
    <?php endforeach ?>
</section>