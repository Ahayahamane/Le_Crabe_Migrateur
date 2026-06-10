<section class="itinerary-list fondCanard">
    <h2>Derniers itinéraires</h2>
    <?php foreach ($datas["last_itinerarys"] as $itinerary): ?>
        <article class="itinerary fondVertClair">
            <header>
                <h2><?= $itinerary->get("title") ?></h2>
            </header>
            <main>
                <p><?= $itinerary->get("description") ?></p>
                <p><?= $itinerary->get("advice") ?></p>
            </main>
            <footer>
                <a class="fondCanard" href='?path=itinerary_zoom&id=<?= $itinerary->get("id") ?>'>+ de détails</a>
            </footer>
        </article>
    <?php endforeach ?>
</section>