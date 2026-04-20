<div id="new_account">
    <form class="fondCanard" method="POST" action="?path=register">
        <div class="fields-box">
            <div id="mail" class="field fondVertClair">
                <legend>Votre adresse mail</legend>
                <input type="text" name="email" placeholder="Votre e-mail" value=<?= $_POST["email"] ?? '' ?>>
                <?php
                if (isset($datas['email'])) {
                    foreach ($datas['email'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div class="field fondVertClair">
                <legend>Votre psedonyme </legend>
                <input type="text" name="psedonym" placeholder="Votre psedo" value=<?= $_POST["psedonym"] ?? '' ?>>
                <?php
                if (isset($datas['psedonym'])) {
                    foreach ($datas['psedonym'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div class="field fondVertClair">
                <legend>Votre prénom</legend>
                <input type="text" name="firstname" placeholder="Votre prénom" value=<?= $_POST["firstname"] ?? '' ?>>
                <?php

                if (isset($datas['firstname'])) {
                    foreach ($datas['firstname'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div class="field fondVertClair">
                <legend>Votre nom</legend>
                <input type="text" name="name" placeholder="Votre nom" value=<?= $_POST["name"] ?? '' ?>>
                <?php
                if (isset($datas['name'])) {
                    foreach ($datas['name'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div class="field fondVertClair">
                <legend>Votre mot de passe</legend>
                <input type="text" name="password" placeholder="Votre mot de passe" value=<?= $_POST["password"] ?? '' ?>>
                <?php
                if (isset($datas['password'])) {
                    foreach ($datas['password'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
        </div>

        <input class="button fondVertClair" type="submit" name="register" value="S'enregistrer">
    </form>
</div>