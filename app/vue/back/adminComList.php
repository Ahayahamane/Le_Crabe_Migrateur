<section class="choice">
    <button class="fondVertClair"><a href="?path=get_commentarys">Liste des commentaires</a></button>
    <button class="fondVertClair"><a href="?path=get_all_users">Liste des comptes</a></button>
</section>
<section class="list fondCanard">
    <?php foreach ($datas["comments"] as $comment): ?>
        <div class="fondVertClair">
            <header>
                <h2><?= $comment->get("pseudonym") ?></h2>
                <p><?= $comment->get("date_") ?></p>
            </header>
            <main>
                <p><?= $comment->get("content") ?></p>
            </main>
            <footer>
                <a class="fondCanard" href='?path=sup_comment&id=<?= $comment->get("id") ?>'>Supprimer ce commentaire</a>
            </footer>
        </div>
    <?php endforeach ?>
</section>