<div class="content">
    <div class="frame fondCanard">
        <article class="fondVertClair">
            <h1><?= $datas['event']->get('title') ?></h1>
            <p><?= $datas['event']->get('date_') ?></p>
            <img src="<?= 'public/medias' . $datas['media'][0]->get('path') ?>" alt="">
            <p><?= $datas['event']->get('content') ?></p>
        </article>
    </div>
    <div class="frame fondCanard">
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
    </div>
    <?php if (!empty($_SESSION['user']) && ($_SESSION['user']->get('role') > 0)) : ?>
        <form class="" method="POST" action="?path=comment_event&id=<?= $datas['event']->get('id') ?>">
        </form>
        <button class="comment">Commenter</button>
    <?php endif ?>
</div>

<script src="public/js/comment.js"></script>