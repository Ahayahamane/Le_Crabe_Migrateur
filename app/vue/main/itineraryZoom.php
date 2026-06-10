<section class="content"><!-- section principale -->
    <section class="frame fondCanard"><!-- sous-section itinéraire -->
        <article class="fondVertClair">
            <header>
                <h2><?= $datas['itinerary']->get('title') ?></h2>
            </header>
            <picture>
                <div id="map"></div>
            </picture>
            <p><?= $datas['itinerary']->get('description') ?></p>
        </article>
    </section>
    <section class="frame fondCanard"><!-- sous-section commentaires existant -->
        <div class="comments fondVertClair">
            <?php foreach ($datas['comments'] as $comment): ?>
                <p>
                    <?= $comment->get('pseudonym') ?><?= $comment->get('date_') ?><br>
                    <?= $comment->get('content') ?>
                </p>
            <?php endforeach ?>
        </div>
    </section>
    <section class="frame fondCanard"><!-- sous-section créer commentaire -->
        <form class="content" method="POST" action="?path=comment_itinerary&id=<?= $datas['itinerary']->get('id'); ?>"></form>
        <button class="comment">Commenter</button>
    </section>
</section>
<script>
    let routeData = <?= $datas['json'] ?>
</script>

<script src="public/js/my_leaflet.js"></script>
<script src="public/js/comment.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>