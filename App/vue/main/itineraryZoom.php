<section class="content"><!-- section principale -->
    <section class="frame fondCanard"><!-- sous-section itinéraire -->
        <article class="fondVertClair">
            <header>
                <h2><?= $datas['itinerary']->get('title') ?></h2>
            </header>
            <div class="info-panel">
                <h3 id="route-title">Chargement...</h3>

            </div>
            <div id="map"></div>
            <p><?= $datas['itinerary']->get('description') ?></p>
        </article>
    </section>
    <section class="frame fondCanard"><!-- sous-section commentaires existant -->
        <div class="comments fondVertClair">
            <?php foreach ($datas['comments'] as $comment): ?>
                <p>
                    <?= $comment->get('psedonym') ?><?= $comment->get('date_') ?><br>
                    <?= $comment->get('content') ?>
                </p>
            <?php endforeach ?>
        </div>
    </section>
    <section><!-- sous-section créer commentaire -->
        <form class="" method="POST" action="?path=comment_itinerary&id=<?= $datas['itinerary']->get('id'); ?>"></form>
        <button class="comment">Commenter</button>
    </section>
</section>
<script>
    let routeData = <?= $datas['json'] ?>
</script>

<script src="public/js/my_leaflet.js"></script>
<script src="public/js/comment.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>