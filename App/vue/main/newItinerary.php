<form method="POST" action="?path=new_itinerary" enctype="multipart/form-data">

    <div>
        <legend>Titre de l'itinéraire</legend>
        <input type="text" name="title" placeholder="Le titre" value=<?= $_POST["title"] ?? '' ?>>
        <?php
        if (isset($datas['errors']['title'])) {
            foreach ($datas['errors']['title'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>
    <div>
        <legend>Ville de départ </legend>
        <input type="text" name="start" placeholder="Ville la plus proche" value=<?= $_POST["start"] ?? '' ?>>
        <?php
        if (isset($datas['errors']['start'])) {
            foreach ($datas['errors']['start'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>
    <div>
        <legend>Difficulté </legend>
        <select name="difficulty">
            <option value="">--choisissez une difficultée--</option>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option> 
            <option value="hard">Hard</option>
        </select>
        <?php
        if (isset($datas['errors']['difficulty'])) {
            foreach ($datas['errors']['difficulty'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>

    <div>
        <legend>Longueur(en km)</legend>
        <input type="text" name="length" placeholder="Longeur estimé de l'itinéraire"
            value=<?= $_POST["length"] ?? '' ?>>
        <?php
        if (isset($datas['errors']['length'])) {
            foreach ($datas['errors']['length'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>
    <div>
        <legend>Durée du parcours</legend>
        <input type="text" name="duration" placeholder="Durée estimé de l'itinéraire"
            value=<?= $_POST["duration"] ?? '' ?>>
        <?php
        if (isset($datas['errors']['duration'])) {
            foreach ($datas['errors']['duration'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>
    <div>
        <legend>Déscription de l'itinéraire</legend>
        <input type="text" name="description" placeholder="Une description" value=<?= $_POST["description"] ?? '' ?>>
        <?php
        if (isset($datas['errors']['description'])) {
            foreach ($datas['errors']['description'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>
    <div>
        <legend>Conseil</legend>
        <input type="text" name="advice" placeholder="Buvez de l'eau"
            value=<?= $_POST["advice"] ?? '' ?>>
        <?php
        if (isset($datas['errors']['advice'])) {
            foreach ($datas['errors']['advice'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>
    <div>
        <legend>Itinéraire au format JSON</legend>
        <input type="file" name="json_data" accept=".json">

        <?php
        if (isset($datas['errors']['file'])) {
            foreach ($datas['errors']['file'] as $data) {
                echo ("<br><span class='error'>" . $data . "</span>");
            }
        } ?>
    </div>

    <br>
    <input type="submit" name="connect">
</form>