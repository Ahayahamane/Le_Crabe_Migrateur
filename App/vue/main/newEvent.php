<form method="POST" action="?path=new_event" enctype="multipart/form-data">

    <div>
        <legend>Titre de l'évenement</legend>
        <input type="text" name="title" placeholder="Le titre"
            <?php if (isset($_POST["title"])): ?>
            value=<?php $_POST["title"] ?>
            <?php endif ?>>
        <?php
        if (isset($datas['errors']['title'])) {
            foreach ($datas['errors']['title'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>
    <div>
        <legend>Date de l'événement </legend>
        <input type="text" name="date_" placeholder="AAAA-MM-JJ"
            <?php if (isset($_POST["date_"])): ?>
            value=<?= $_POST["date_"] ?>
            <?php endif ?>>
        <?php
        if (isset($datas['errors']['date_'])) {
            foreach ($datas['errors']['date_'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>
    <div>
        <!-- a voir plus en détails -->
        <legend>Itinéraire utilisé</legend>
        <select name="itinerary"
            <?php if (isset($_POST["itinerary"])): ?>
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

        if (isset($datas['errors']['itinerary'])) {
            foreach ($datas['errors']['itinerary'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>
    <div>
        <legend>Résumé de l'événement</legend>
        <input type="text" name="summary" placeholder="un résumé de la déscription de votre événement"
            <?php if (isset($_POST["summary"])): ?>
            value=<?= $_POST["summary"] ?>
            <?php endif ?>>
        <?php
        if (isset($datas['errors']['summary'])) {
            foreach ($datas['errors']['summary'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>
    <div>
        <legend>Description de l'événement</legend>
        <input type="text" name="content" placeholder="La déscription complète de votre événement"
            <?php if (isset($_POST["content"])): ?>
            value=<?= $_POST["content"] ?>
            <?php endif ?>>   
        <?php
        if (isset($datas['errors']['content'])) {
            foreach ($datas['errors']['content'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>

    <div>
        <legend>Ilustration/vidéo</legend>
        <input type="file" name="media" accept=".jpg, .jpeg, .svg, .png, .mp4">
    </div>

    <br>
    <input type="submit" name="connect">
</form>