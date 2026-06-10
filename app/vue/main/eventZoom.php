<section class="content"><!-- section principale -->
    <section class="frame fondCanard"><!-- sous-section événement -->
        <article class="fondVertClair">
            <header>
                <h2><?= $datas['event']->get('title') ?></h2>
                <p><?= $datas['event']->get('date_') ?></p>
            </header>
            <figure>
                <picture>
                    <img src="<?= 'public/medias' . $datas['media'][0]->get('path') ?>" alt="">
                </picture>
            </figure>
            <p><?= $datas['event']->get('content') ?></p>
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
        <form method="POST" action="?path=comment_event&id=<?= $datas['event']->get('id') ?>">
        </form>
        <button class="comment">Commenter</button>
    </section>
</section>

<script src="public/js/comment.js"></script>