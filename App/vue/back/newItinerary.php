<section>
    <form method="POST" action="?path=new_itinerary" enctype="multipart/form-data">
        <div>
            <label>Titre de l'itinéraire</label>
            <input type="text" name="title" placeholder="Le titre" <?php if (!empty($_POST["title"])): ?>
                value=<?= $_POST["title"] ?>
                <?php endif ?>>>
            <?php
            if (!empty($datas['errors']['title'])) {
                foreach ($datas['errors']['title'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>
        <div>
            <label>Ville de départ <  </label>
            <input type="text" name="start" placeholder="Ville la plus proche" <?php if (!empty($_POST["start"])): ?>
                value=<?= $_POST["start"] ?>
                <?php endif ?>>>
            <?php
            if (!empty($datas['errors']['start'])) {
                foreach ($datas['errors']['start'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>
        <div>
            <label>Difficulté </label>
            <select name="difficulty">
                <option value="">--choisissez une difficultée--</option>
                <option value="easy">Easy</option>
                <option value="medium">Medium</option>
                <option value="hard">Hard</option>
            </select>
            <?php
            if (!empty($datas['errors']['difficulty'])) {
                foreach ($datas['errors']['difficulty'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>

        <div>
            <label>Longueur(en km)</label>
            <input type="text" name="length" placeholder="Longeur estimé de l'itinéraire"
                <?php if (!empty($_POST["length"])): ?>
                value=<?= $_POST["length"] ?>
                <?php endif ?>>>
            <?php
            if (!empty($datas['errors']['length'])) {
                foreach ($datas['errors']['length'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>
        <div>
            <label>Durée du parcours</label>
            <input type="text" name="duration" placeholder="Durée estimé de l'itinéraire"
                <?php if (!empty($_POST["duration"])): ?>
                value=<?= $_POST["duration"] ?>
                <?php endif ?>>>
            <?php
            if (!empty($datas['errors']['duration'])) {
                foreach ($datas['errors']['duration'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>
        <div>
            <label>Déscription de l'itinéraire</label>
            <input type="text" name="description" placeholder="Une description" <?php if (!empty($_POST["description"])): ?>
                value=<?= $_POST["description"] ?>
                <?php endif ?>>>
            <?php
            if (!empty($datas['errors']['description'])) {
                foreach ($datas['errors']['description'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>
        <div>
            <label>Conseil</label>
            <input type="text" name="advice" placeholder="Buvez de l'eau"
                <?php if (!empty($_POST["advice"])): ?>
                value=<?= $_POST["advice"] ?>
                <?php endif ?>>>
            <?php
            if (!empty($datas['errors']['advice'])) {
                foreach ($datas['errors']['advice'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>
        <div>
            <label>Itinéraire au format JSON</label>
            <input type="file" name="json_data" accept=".json">

            <?php
            if (!empty($datas['errors']['file'])) {
                foreach ($datas['errors']['file'] as $data) {
                    echo ("<br><span class='error'>" . $data . "</span>");
                }
            } ?>
        </div>

        <br>
        <input type="submit" name="connect">
    </form>
    <aside>
        outil conversion coordonées/lieu dit
    </aside>
</section>