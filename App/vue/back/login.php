<div id="login">
    <form class="fondCanard" method="POST" action="?path=login_backoffice">

        <?php
        if (isset($datas['errors']['wrong'])) {
            echo ("<br><span class='error'>" . $datas['errors']['wrong'] . "</span>");
        } ?>
        <div class="fields-box">
            <div class="field fondVertClair">
                <legend>Votre adresse mail</legend>
                <input type="text" name="email" placeholder="e-mail" value=<?= $_POST["email"] ?? '' ?>>
                <?php if (isset($datas['errors']['email'])) {
                    foreach ($datas['errors']['email'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>

            <div class="field fondVertClair">
                <legend>Votre mot de passe</legend>
                <input type="text" name="password" placeholder="mot de passe" value=<?= $_POST["password"] ?? '' ?>>
                <?php if (isset($datas['errors']['password'])) {
                    foreach ($datas['errors']['password'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
        </div><br>

        <input class="button fondVertClair" type="submit" name="connect" value="Connection">
        <p>Pas de compte? : Créez en un <a href="?path=first_register">ici</a></p>
    </form>
</div>