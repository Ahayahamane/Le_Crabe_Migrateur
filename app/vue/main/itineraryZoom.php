<div pageName="itineraryZoom" data-json="<?= htmlspecialchars($datas['json'], ENT_QUOTES, 'UTF-8') ?>"><!-- identification de la page pour le chagement des scripts -->
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
            <?php if (!empty($datas['comments'])):
                foreach ($datas['comments'] as $comment): ?>
                    <div class="comments_list fondVertClair">
                        <header class="comhead">
                            <p>
                                Auteur: <?= $comment->get('pseudonym') ?>
                            </p>
                            <p>
                                <?= $comment->get('date_') ?>
                            </p>
                        </header>
                        <p>
                            <?= $comment->get('content') ?>
                        </p>

                    </div>
            <?php endforeach;
            endif ?>
        </section>
        <section class="frame fondCanard"><!-- sous-section créer commentaire -->
            <form method="POST" action="?path=comment_itinerary&id=<?= $datas['itinerary']->get('id'); ?>"></form>
            <button class="comment">Commenter</button>
        </section>
    </section>
</div>



<!-- <script>
        let routeData = <?= $datas['json'] ?>
    </script>

    <script src="public/js/my_leaflet.js"></script>
    <script src="public/js/comment.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script> -->