<section class="last-list fondCanard"><!-- section derniers événements -->
    <h2>Derniers événements</h2>
    <?php foreach ($datas["three_last"] as $event): ?>
        <article class="last-event fondVertClair">
            <header>
                <h2><?= $event["obj"]->get("title") ?></h2>
            </header>
            <figure>
                <picture>
                    <img src="<?= 'public/medias' . $event['media'] ?>" alt="">
                </picture>
            </figure>
            <p><?= $event["obj"]->get("summary") ?></p>
            <footer>
                <a href='?path=event_zoom&id=<?= $event["obj"]->get("id") ?>'>+ de détails</a>
            </footer>
        </article>
    <?php endforeach ?>
</section>

<section class="old-list fondCanard"><!-- section archive -->
    <h2>Précédents événements</h2>
    <?php foreach ($datas["all_others"] as $event): ?>
        <article class="old-event fondVertClair">
            <header>
                <h2><?= $event["obj"]->get("title") ?></h2>
            </header>
            <figure>
                <picture>
                    <img src="<?= 'public/medias' . $event['media'] ?>" alt="">
                </picture>
            </figure>
            <p><?= $event["obj"]->get("summary") ?></p>
            <footer>
                <a href='?path=event_zoom&id=<?= $event["obj"]->get("id") ?>'>+ de détails</a>
            </footer>
        </article>
    <?php endforeach ?>
</section>