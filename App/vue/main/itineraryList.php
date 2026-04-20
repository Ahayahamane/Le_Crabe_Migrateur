<div class="itinerary-list fondCanard">
    <h1>Derniers itinéraires</h1>

    <?php foreach ($datas["last_itinerarys"] as $itinerary): ?>
        <div class="itinerary fondVertClair">
            <h2><?= $itinerary->get("title") ?></h2>
            <p><?= $itinerary->get("description") ?></p>
            <p><?= $itinerary->get("advice") ?></p>

            
            
            <a href='?path=itinerary_zoom&id=<?= $itinerary->get("id") ?>'>+ de détails</a>

        </div>
    <?php endforeach ?>

</div>
