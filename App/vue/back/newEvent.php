<section class="content">
    <form method="POST" action="?path=new_event" enctype="multipart/form-data" class='fondCanard'>
        <h2>Creation d'un évenement</h2>
        <div class='fondVertClair'>
            <label>Titre de l'évenement</label>
            <input type="text" name="title" placeholder="Le titre"
                <?php if (!empty($_POST["title"])): ?>
                value="<?= $_POST["title"] ?>"
                <?php endif ?>>
            <?php
            if (!empty($datas['errors']['title'])) {
                foreach ($datas['errors']['title'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>
        <div class='fondVertClair'>
            <label>Date de l'événement </label>
            <input type="text" name="date_" placeholder="AAAA-MM-JJ"
                <?php if (!empty($_POST["date_"])): ?>
                value="<?= $_POST["date_"] ?>"
                <?php endif ?>>
            <?php
            if (!empty($datas['errors']['date_'])) {
                foreach ($datas['errors']['date_'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>

        <div class='fondVertClair'>
            <label>Résumé de l'événement</label>
            <textarea class="longtext" name="summary" placeholder="un résumé de la déscription de votre événement"><?php if (!empty($_POST["summary"])) {
                                                                                                                        echo $_POST["summary"];
                                                                                                                    } ?></textarea>
            <?php
            if (!empty($datas['errors']['summary'])) {
                foreach ($datas['errors']['summary'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>
        <div class='fondVertClair'>
            <label>Description de l'événement</label>
            <textarea class="longtext" name="content" placeholder="La déscription complète de votre événement"><?php if (!empty($_POST["content"])) {
                                                                                                                    echo $_POST["content"];
                                                                                                                } ?></textarea>
            <?php
            if (!empty($datas['errors']['content'])) {
                foreach ($datas['errors']['content'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>
        <div class='fondVertClair'>
            <!-- a voir plus en détails -->
            <label>Itinéraire utilisé</label>
            <select name="itinerary"
                <?php if (!empty($_POST["itinerary"])): ?>
                value=<?= $_POST["itinerary"] ?>
                <?php endif ?>>
                <option value="default">--choisissez un itinéraire--</option>
                <?php foreach ($datas['itinerary'] as $data): ?>
                    <option value="<?= $data->get('id') ?>">
                        <?= $data->get('title') ?>
                    </option>
                <?php endforeach ?>
            </select>
            <?php

            if (!empty($datas['errors']['itinerary'])) {
                echo ("<br><span class='error'> Choisisez un itinéraire </span>");
            } ?>
        </div>
        <div class='fondVertClair'>
            <label>Ilustration/vidéo</label>
            <input type="file" name="media" accept=".jpg, .jpeg, .svg, .png, .mp4">
            <?php
            if (isset($datas['errors']['file'])) {
                foreach ($datas['errors']['file'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>
        <input class="button" type="submit" name="connect">
    </form>
</section>