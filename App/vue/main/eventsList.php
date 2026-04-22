<div class="last-list fondCanard">
    <h1>Derniers événements</h1>
    <?php foreach ($datas["three_last"] as $event): ?>
        <div class="last-event fondVertClair">
            <h2><?= $event->get("title") ?></h2>
            <p><?= $event->get("summary") ?></p>
            <p><?= $event->get("id") ?></p>
            <a href='?path=event_zoom&id=<?= $event->get("id") ?>'>+ de détails</a>
        </div>
    <?php endforeach ?>
</div>

<div class="old-list fondCanard">
    <h2>Précédents événements</h2>
    <?php foreach ($datas["all_others"] as $event): ?>
        <div class="old-event fondVertClair">
            <h2><?= $event->get("title") ?></h2>
            <p><?= $event->get("summary") ?></p>
            <p><?= $event->get("id") ?></p>
            <a href='?path=event_zoom&id=<?= $event->get("id") ?>'>+ de détails</a>
        </div>
    <?php endforeach ?>
</div>