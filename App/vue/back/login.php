<section id="login">
    <form class="fondCanard" method="POST" action="?path=login_backoffice">

        <?php
        if (!empty($datas['errors']['wrong'])) {
            echo ("<br><span class='error'>" . $datas['errors']['wrong'] . "</span>");
        } ?>
        <div class="fields-box">
            <div class="field fondVertClair">
                <label>Votre adresse mail</label>
                <input type="text" name="email" placeholder="e-mail" <?php if (!empty($_POST["email"])): ?>
                    value=<?= $_POST["email"] ?>
                    <?php endif ?>>
                <?php if (!empty($datas['errors']['email'])) {
                    foreach ($datas['errors']['email'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>

            <div class="field fondVertClair">
                <label>Votre mot de passe</label>
                <input type="password" name="password" placeholder="mot de passe">
                <?php if (!empty($datas['errors']['password'])) {
                    foreach ($datas['errors']['password'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
        </div><br>

        <input class="button fondVertClair" type="submit" name="connect" value="Connection">
    </form>
</section>