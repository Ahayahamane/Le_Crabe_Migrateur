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
        <div class="comments fondVertClair">
            <?php if (!empty($datas['comments'])):
                foreach ($datas['comments'] as $comment): ?>
                    <p>
                        <?= $comment->get('psedonym') ?><?= $comment->get('date_') ?><br>
                        <?= $comment->get('content') ?>
                    </p>
            <?php endforeach;
            endif ?>
        </div>
    </section>
    <section><!-- sous-section créer commentaire -->
        <form class="" method="POST" action="?path=comment_event&id=<?= $datas['event']->get('id') ?>">
        </form>
        <button class="comment">Commenter</button>
    </section>
</section>

<script src="public/js/comment.js"></script>