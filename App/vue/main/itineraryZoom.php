<div class="content">
    <div class="frame fondCanard">
        <article class="fondVertClair">
            <h1><?= $datas['itinerary']->get('title') ?></h1>
            <div class="info-panel">
                <h3 id="route-title">Chargement...</h3>
                
            </div>
            <div id="map"></div>
            <p><?= $datas['itinerary']->get('description') ?></p>
        </article>
    </div>
    <div class="frame fondCanard">
        <div class="comments fondVertClair">
            <?php foreach ($datas['comments'] as $comment): ?>

                <p>
                    <?= $comment->get('psedonym') ?><?= $comment->get('date_') ?><br>
                    <?= $comment->get('content') ?>
                </p>
            <?php endforeach ?>
        </div>
    </div>
    <form class="" method="POST" action="?path=comment_itinerary&id=<?= $datas['itinerary']->get('id'); ?>">

    </form>
    <button class="comment">Commenter</button>
</div>

<script >
    let routeData = <?= $datas['json']?>
</script>

<script src="public/js/my_leaflet.js"></script>
<script src="public/js/comment.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>